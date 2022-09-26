<?php
// include các đối tượng cần thiết
use TechAPI\Api\SendBrandnameOtp;
use TechAPI\Exception as TechException;
use TechAPI\Auth\AccessToken;

/**
 * Code xử lý gửi tin nhắn qua API
 */

// Khởi tạo các tham số của tin nhắn.
$arrMessage = array(
	'Phone'     => '0916647407',
	'BrandName' => 'SwinburneVN',
	'Message'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
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

		// quăng lỗi ra, và ghi log
		throw new TechException( $arrResponse['error_description'], $arrResponse['error'] );
	}

	// echo '<pre>';
	// print_r( $arrResponse );
	// echo '</pre>';
} catch ( \Exception $ex ) {
	echo sprintf( '<p>Có lỗi xảy ra:</p>' );
	echo sprintf( '<p>- Mã lỗi: %s</p>', $ex->getCode() );
	echo sprintf( '<p>- Mô tả lỗi: %s</p>', $ex->getMessage() );
}

