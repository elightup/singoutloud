<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Đăng nhập
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main ">
	<section class="register-page">
		<div class="container">
			<div class="register-page__wrap">
				<div class="register-page__form">
					<h1>Welcome Back</h1>
					<?php the_content(); ?>
					<a class="login_google" href="https://singoutloud.wpengine.com/wp-login.php?loginSocial=google"
						rel="nofollow"
						aria-label="Sing in width <b>Google</b>"
						data-plugin="nsl"
						data-action="connect"
						data-provider="google"
						data-popupwidth="600"
						data-popupheight="600">
						<div class="nsl-button nsl-button-default nsl-button-google" data-skin="light">
							<div class="nsl-button-svg-container">
								<?php SingOutLoud_Icons::render( 'google' ); ?>
							</div>
							<div class="nsl-button-label-container">Sing in width <b>Google</b></div>
						</div>
					</a>
					<a class="login-face"
						href="https://singoutloud.wpengine.com/wp-login.php?loginSocial=facebook"
						rel="nofollow"
						aria-label="Sing in with <b>Facebook</b>"
						data-plugin="nsl"
						data-action="connect"
						data-provider="facebook"
						data-popupwidth="600"
						data-popupheight="679">
							<div class="nsl-button nsl-button-default nsl-button-facebook" data-skin="light">
								<div class="nsl-button-svg-container">
									<?php SingOutLoud_Icons::render( 'faceboook' ); ?>
								</div>
								<div class="nsl-button-label-container">Sing in with <b>Facebook</b></div>
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
