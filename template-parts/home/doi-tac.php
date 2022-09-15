<?php
$title_partner    = rwmb_meta( 'titless_partner' );
$images_parter    = rwmb_meta( 'image_partner' );
$title_newspapers = rwmb_meta( 'title_newspapers' );
$images_newspaper = rwmb_meta( 'image_newspapers' );
if ( ! $title_partner && ! $images_parter || ! $title_newspapers && ! $images_newspaper ) {
	return;
}
if ( empty( $images_parter ) || ! is_array( $images_parter ) ) {
	$images_parter = [];
}
if ( empty( $images_newspaper ) || ! is_array( $images_newspaper ) ) {
	$images_newspaper = [];
}
?>
<section class="partner-home">
	<div class="container">
		<div class="partner-home__wrap">
			<h2 class="title"><?= wp_kses_post( $title_partner );?></h2>
			<div class="partner-home__image">
				<?php foreach ( $images_parter as $image ) : ?>
					<img src="<?= esc_url( $image['full_url'] )?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="partner-home__wrap">
			<h2 class="title"><?= wp_kses_post( $title_newspapers );?></h2>
			<div class="partner-home__image">
				<?php foreach ( $images_newspaper as $image ) : ?>
					<img src="<?= esc_url( $image['full_url'] )?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="partner-home__login">
			<div class="partner-home__content">
				<h3>Bình chọn ngay cho</h3>
				<h2>Top 50</h2>
				<ul>
					<li><a href="#">Đăng nhập</a></li>
					<li><a href="#">Đăng ký</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
