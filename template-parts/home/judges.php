<?php
$title_iudges   = rwmb_meta( 'title_judges' );
$content_judges = rwmb_meta( 'content_judges' );
$video          = rwmb_meta( 'video_judges' );
$judges_group   = rwmb_meta( 'judges_group' );
if ( strpos( $video, '=' ) ) {
	$idvideo = substr( $video, strpos( $video, '=' ) + 1, 11 );
} else {
	$idvideo = substr( $video, strpos( $video, 'embed' ) + 6, 11 );
};
?>
<section class="judges-home">
	<div class="container">
		<div class="judges-home__wrap">
			<div class="judges-home__judges">
				<?= wp_kses_post( $content_judges );?>
			</div>
			<div class="judges-home__video">
				<?php if ( ! empty( $video ) ) : ?>
					<iframe width="767" height="426" src="https://www.youtube.com/embed/<?= $idvideo ?>"
						title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen>
					</iframe>
				<?php endif; ?>
			</div>
		</div>
		<div class="judges-home__wrap">
			<h2 class="title"><?= wp_kses_post( $title_iudges );?></h2>
			<div class="judges-home__inner">
				<?php foreach ( $judges_group as $key => $judges ) : ?>
					<div class="judges-home__item">
						<div class="judges-home__image">
							<img src="<?= esc_url( wp_get_attachment_url( $judges['image_judges'] ) );?>" width="341" height="454" alt="<?= esc_attr( $judges['name'] )?>">
						</div>
						<div class="judges-home__content">
							<h3><?= esc_html( $judges['sub_name'] );?></h3>
							<h2><?= esc_html( $judges['name'] );?></h2>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
