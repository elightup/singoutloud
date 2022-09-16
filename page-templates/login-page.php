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
