<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Xác thực
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main ">
	<section class="register-page">
		<div class="container">
			<div class="register-page__wrap">
				<div class="register-page__form">
					<h1>Nhập mã xác thực</h1>
					<div class="form-otp">
						<input style="width: 100%; padding: 20px 12px; font-size: 16px" type="text" placeholder="Nhập mã OTP và ấn ENTER để kiểm tra">
						<a style="display: flex; justify-content: center" href="#" class="btn">Xác nhận</a>
						<span style="display: block; font-size: 14px; margin-top: 10px;width: 100%" class="form-otp__message"></span>
						<div class="form-otp-resend">Chưa nhận được mã OTP? <a href="#">Gửi lại</a></div>
					</div>
				</div>
				<div class="register-page__image">
					<?php
					$images = rwmb_meta( 'image_register' );
					foreach ( $images as $image ) :
						echo '<div class="image_item">';
						echo '<img src="' . $image['full_url'] . '" alt="">';
						echo '</div>';
					endforeach;
					?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
