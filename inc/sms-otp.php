<?php
use TechAPI\Api\SendBrandnameOtp;
use TechAPI\Exception as TechException;
use TechAPI\Auth\AccessToken;

function sol_send_opt( $random_otp, $phone ) {
	// Khởi tạo các tham số của tin nhắn.
	$arrMessage = array(
		'Phone'     => $phone,
		'BrandName' => 'SwinburneVN',
		'Message'   => 'SingOutLoud: Mã OTP đăng ký của bạn là ' . $random_otp . ', truy cập website để nhập thông tin. Vui lòng sử dụng mã OTP này trong vòng 15 phút.',
	);
	// Khởi tạo đối tượng API với các tham số phía trên.
	$apiSendBrandname = new SendBrandnameOtp( $arrMessage );
	try {
		// Lấy đối tượng Authorization để thực thi API
		$oGrantType = getTechAuthorization();
		// Thực thi API
		$arrResponse = $oGrantType->execute( $apiSendBrandname );
		// kiểm tra kết quả trả về có lỗi hay không
		if ( ! empty( $arrResponse['error'] ) ) {
			// Xóa cache access token khi có lỗi xảy ra từ phía server
			AccessToken::getInstance()->clear();
			// Bắn lỗi ra, và ghi log
			throw new TechException( $arrResponse['error_description'], $arrResponse['error'] );
		}
	} catch ( \Exception $ex ) {
		echo sprintf( '<p>Có lỗi xảy ra:</p>' );
		echo sprintf( '<p>- Mã lỗi: %s</p>', $ex->getCode() );
		echo sprintf( '<p>- Mô tả lỗi: %s</p>', $ex->getMessage() );
	}
	return $arrResponse;
}

/**
 * Update random_otp after register user.
 */
function sol_update_user( $object ) {
	$id_form = $object->config['id'];

	if ( $id_form === 'dang-ky' ) {
		$random_otp = rand_string( 6 );
		update_user_meta( $object->user_id, 'random_otp', $random_otp );
		update_user_meta( $object->user_id, 'random_otp_time', strtotime( current_time( 'mysql' ) ) );
		// Send random_otp to phone user
		$user_data  = get_userdata( $object->user_id );
		$user_phone = $user_data->user_login;
		sol_send_opt( $random_otp, $user_phone );
	}

}
add_action( 'rwmb_profile_after_save_user', 'sol_update_user' );

/**
 * Redirect to otp page when register
 */
function sol_redirect( $config, $user_id ) {
	if ( ( 'dang-ky' === $config['id'] ) && ! empty( $user_id ) ) {
		wp_safe_redirect( home_url() . '/xac-thuc?user_id=' . $user_id );
		exit;
	}
}
add_action( 'rwmb_profile_after_process', 'sol_redirect', 10, 2 );

/**
 * Check mã xác thực before Login
 */
function sol_check_otp( $user ) {
	if ( ! $user instanceof WP_User ) {
		return;
	}
	$otp_code = get_user_meta( $user->ID, 'otp_code' );
	if ( empty( $otp_code ) ) {
		$text = 'Tài khoản của bạn chưa được xác thực! Bấm <a href="' . esc_url( home_url() ) . '/xac-thuc?user_id=' . $user->ID . '"> vào đây </a> rồi ấn gửi lại mã để nhập mã OTP để nhập mã OTP';
		$user = new WP_Error( 'broke', $text );
	}
	return $user;
}
add_filter( 'wp_authenticate_user', 'sol_check_otp' );

/**
 * Check nhập mã OTP
 */
add_action( 'wp_ajax_sol_check_otp', 'sol_check_otp_message' );
add_action( 'wp_ajax_nopriv_sol_check_otp', 'sol_check_otp_message' );
function sol_check_otp_message() {
	$otp             = isset( $_POST['otp'] ) ? $_POST['otp'] : '';
	$user_id         = isset( $_POST['user_id'] ) ? $_POST['user_id'] : '';
	$random_otp_user = get_user_meta( $user_id, 'random_otp', true );

	$random_otp_time = (int) get_user_meta( $user_id, 'random_otp_time', true );
	$current_time    = strtotime( current_time( 'mysql' ) );

	if ( empty( $otp ) ) {
		$message = 'Bạn cần nhập OTP';
		wp_send_json_error( $message );
	}

	if ( $current_time > $random_otp_time + 900 ) {
		$message = 'Mã OTP đã hết hạn';
		wp_send_json_error( $message );
	}

	if ( $otp === $random_otp_user ) {
		update_user_meta( $user_id, 'otp_code', $random_otp_user );
		$message = 'Tài khoản của bạn đã xác thực thành công! <br>
	Website sẽ tự động chuyển hướng về trang chủ sau 5s <br>
	Tài khoản đăng ký cộng tác viên của bạn đang được xem xét chờ duyệt (Thời gian duyệt từ 1-2 ngày ).<br>
	Tài khoản được duyệt sẽ có thông báo qua mail đăng ký';

		// Login after register .
		$meta_user = get_user_meta( $user_id );
		$user      = new WP_User( $user_id );
		wp_set_current_user( $user_id, $meta_user['nickname'] );
		wp_set_auth_cookie( $user_id );
		do_action( 'wp_login', $meta_user['nickname'], $user );

		$success = [
			'message' => $message,
			'url'     => home_url(),
		];
		wp_send_json_success( $success );
	} else {
		$message = 'Mã OTP không đúng!';
		wp_send_json_error( $message );
	}

	die();
}

/**
 * Gửi lại mã OTP
 */
add_action( 'wp_ajax_sol_resend_otp', 'sol_resend_otp_sms' );
add_action( 'wp_ajax_nopriv_sol_resend_otp', 'sol_resend_otp_sms' );
function sol_resend_otp_sms() {
	$random_otp = rand_string( 6 );
	$user_id    = isset( $_POST['user_id'] ) ? $_POST['user_id'] : '';

	if ( empty( $user_id ) ) {
		$message = 'Tài khoản không hợp lệ';
		wp_send_json_error( $message );
	}

	update_user_meta( $user_id, 'random_otp', $random_otp );
	update_user_meta( $user_id, 'random_otp_time', strtotime( current_time( 'mysql' ) ) );
	// Send random_otp to phone user
	$user_data  = get_userdata( $user_id );
	$user_phone = $user_data->user_login;
	sol_send_opt( $random_otp, $user_phone );

	$message = 'Đã gửi lại mã OTP';
	wp_send_json_success( $message );
	die();
}
