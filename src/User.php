<?php
namespace Sol;

class User {
	public function init() {
		add_action( 'load-users.php', [ $this, 'users_page' ] );
		add_action( 'wp_ajax_active_user', [ $this, 'active_user' ] );
		// add_action( 'pre_user_query', [ $this, 'user_search_by_multiple_parameters' ] );
	}

	/**
	 * Load hooks for users page
	 * @return void
	 */
	public function users_page() {
		// Columns
		add_filter( 'manage_users_columns', [ $this, 'users_columns' ] );
		add_filter( 'manage_users_sortable_columns', [ $this, 'users_sortable_columns' ] );
		add_filter( 'manage_users_custom_column', [ $this, 'show_users_columns' ], 10, 3 );
		// add_action( 'pre_user_query', [ $this, 'order_users' ] );
	}

	/**
	 * Change columns for users
	 *
	 * @param array $columns List of columns in users screen
	 *
	 * @return array
	 */
	public function users_columns( $columns ) {
		$columns['registered']  = 'Thời gian tạo';
		$columns['action']      = 'Tác vụ';
		$columns['user_update'] = 'Người cập nhật';
		$columns['time_update'] = 'Thời gian cập nhật';
		$columns['id_user']     = 'ID User';
		unset( $columns['posts'] );
		return $columns;
	}

	/**
	 * Change sortable columns for users
	 *
	 * @param array $columns List of columns in users screen
	 *
	 * @return array
	 */
	public function users_sortable_columns( $columns ) {
		return [
			'username'   => 'login',
			'registered' => 'registered',
		];
	}

	/**
	 * Show content of user columns in admin
	 *
	 * @param string $output  Custom column output. Default empty.
	 * @param string $column  Column name.
	 * @param int    $user_id ID of the currently-listed user.
	 *
	 * @return string
	 */
	public function show_users_columns( $output, $column, $user_id ) {
		$user       = get_userdata( $user_id );
		$update_log = get_user_meta( $user_id, 'update_log', true );
		switch ( $column ) {
			case 'action':
				$user_active = get_user_meta( $user_id, 'active_user', true );
				if ( ! $user_active ) {
					$url     = wp_nonce_url( admin_url( 'admin-ajax.php?action=active_user&user_id=' . $user_id ), 'account' );
					$output .= '<br><a style="margin-top: 5px;" href="' . $url . '" class="button" title="ERP">Kích hoạt TK</a>';
				} else {
					$output .= '<br><span class="badge badge--success" style="display: inline-block; color: #fff; background: #28a745; padding: 5px; border-radius: 3px; margin-top: 5px;">Đã kích hoạt TK</span>';
				}

				break;
			case 'registered':
				if ( $user->user_registered ) {
					$registered = strtotime( $user->user_registered ) + 7 * 3600; // sửa lại ngày đăng kí theo múi giờ Việt Nam
					$output     = date( 'd.m.Y', $registered ) . '<br>';
					$output    .= date( 'H:i', $registered );
				}
				break;
			case 'user_update':
				if ( ! empty( $update_log['user_update'] ) ) {
					$user_name = get_user_meta( $update_log['user_update'], 'user_name', true );
					$output   .= '<a href="' . get_edit_user_link( $update_log['user_update'] ) . '">' . $user_name . '</a>';
				}
				break;
			case 'time_update':
				if ( ! empty( $update_log['date'] ) ) {
					$date_update = strtotime( $update_log['date'] );
					$output      = date( 'd.m.Y', $date_update ) . '<br>';
					$output     .= date( 'H:i', $date_update );
				}
				break;
			case 'id_user':
				$output .= $user_id;
		}

		return $output;
	}

	public function active_user() {
		$user_id = $_GET['user_id'];
		update_user_meta( $user_id, 'active_user', 1 );

		// Log User update
		$this->logs_user( $user_id );

		// Send email.
		$body_email = '
			<div style="max-width: 700px; margin: 0 auto;">
				<p>SingOutLoud rất vui mừng thông báo tài khoản bạn đăng ký đã trở thành thành viên của SingOutLoud. </p>
				<p>Ngay bây giờ bạn đã có thể truy cập vào website và đăng nhập tài khoản đã đăng ký để xem được những quyền lợi , chính sách dành riêng cho bạn. </p>
				<p>SingOutLoud cam kết chỉ bán hàng chính hãng , hàng mới 100% nói không với hàng thanh lý , trưng bày nếu sai đền 136% giá trị sản phẩm .</p>
				<p style="text-align: center;">Hotline: 0383.951.847 | Email: singoutloud2022@gmail.com <br>
				SingOutLoud : Cuộc thi hát tiếng anh - Dành riêng cho họ sinh THPT</p>
			</div>
		';
		$headers    = array( 'Content-Type: text/html; charset=UTF-8' );
		$user_email = get_userdata( $user_id )->user_email;

		wp_mail( $user_email, 'Thông báo tài khoản', $body_email, $headers );

		wp_safe_redirect( wp_get_referer() ? wp_get_referer() : admin_url( 'users.php' ) );
		die;
	}

	public function logs_user( $user_id ) {
		$current_user = get_current_user_id();

		$data_log = [
			'user_update' => $current_user,
			'date'        => current_time( 'mysql' ),
		];
		update_user_meta( $user_id, 'update_log', $data_log );
	}
}
