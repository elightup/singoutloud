<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Bình chọn
 */
?>
<?php get_header(); ?>

<?php
	$title = rwmb_meta('binh-chon-title');
	$desc  = rwmb_meta('binh-chon-desc');
?>

<main id="primary" class="site-main ">
	<section class="vote-page">
		<div class="container">
			<div class="vote-page__wrap">
				<h2 class="vote-page__wrap-title"><?= $title; ?></h2>
				<div class="vote-page__wrap-desc"><?= wp_kses_post(wpautop( $desc ));  ?></div>
				<?php the_content(); ?>
				<div class="vote-page__inner">
					<?php
					$steps = rwmb_meta( 'step_group' );
					foreach ( $steps as $key => $step ) :
						?>
					<div class="vote-page__item">
						<img src="<?= esc_url( wp_get_attachment_url( $step['image'] ) );?>" alt="">
						<h2>0<?= esc_html( $key + 1 );?></h2>
						<p><?= wp_kses_post( wpautop( $step['content'] ) );?></p>
					</div>
					<?php endforeach; ?>
				</div>
				<a href="<?= esc_url( home_url() . '/dang-nhap' );?>" class="signin">Bình chọn ngay</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
