<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Đăng ký
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main ">
	<section class="register-page">
		<div class="container">
			<div class="register-page__wrap">
				<div class="register-page__form">
					<h1>Welcome</h1>
					<?= do_shortcode( '[mb_user_profile_register label_username="Số điện thoại(dùng để đăng nhập)" label_password="Password" label_password2="Confirm Password" label_submit="Sing up" id="dang-ky" confirmation="Tài khoản đăng ký của bạn đang được xem xét chờ duyệt (Thời gian duyệt từ 1-2 ngày )"]' )?>
					<div id="popup-register"></div>
					<a class="login_google" href="<?= esc_url( home_url() ) ?>/wp-login.php?loginSocial=google" rel="nofollow" aria-label="Sign in width <b>Google</b>" data-plugin="nsl" data-action="connect" data-provider="google" data-popupwidth="600" data-popupheight="600">
						<div class="nsl-button nsl-button-default nsl-button-google" data-skin="light">
							<div class="nsl-button-svg-container">
								<?php SingOutLoud_Icons::render( 'google' ); ?>
							</div>
							<div class="nsl-button-label-container">Sign in with Google</div>
						</div>
					</a>
					<a class="login-face" href="<?= esc_url( home_url() ) ?>/wp-login.php?loginSocial=facebook" rel="nofollow" aria-label="Sign in with <b>Facebook</b>" data-plugin="nsl" data-action="connect" data-provider="facebook" data-popupwidth="600" data-popupheight="679">
						<div class="nsl-button nsl-button-default nsl-button-facebook" data-skin="light">
							<div class="nsl-button-svg-container">
								<?php SingOutLoud_Icons::render( 'faceboook' ); ?>
							</div>
							<div class="nsl-button-label-container">Sign in with Facebook</div>
						</div>
					</a>
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
