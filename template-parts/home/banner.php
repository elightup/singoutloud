<?php
$image   = rwmb_meta( 'banner_image' );
$title   = rwmb_meta( 'title_banner' );
$content = rwmb_meta( 'content_banner' );
?>
<section class="home-banner" style="background-image: url(<?= esc_attr( $image['full_url'] );?>); background-size: cover">
	<div class="container">
		<div class="home-banner__wrap">
			<div class="home-banner__content">
				<h1><?= wp_kses_post( $title );?></h1>
				<div class="entry-content">
					<?= wp_kses_post( wpautop( $content ) );?>
				</div>
			</div>
		</div>
	</div>
</section>
