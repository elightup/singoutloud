<?php
$title_winner = rwmb_meta( 'title_top_win' );
$win_group    = rwmb_meta( 'win_group' );
?>
<section class="winner-home">
	<div class="container">
		<div class="winner-home__wrap">
			<h2 class="title"><?= wp_kses_post( $title_winner );?></h2>
			<div class="winner-home__inner">
				<?php foreach ( $win_group as $key => $value ) : ?>
					<div class="winner-home__item">
						<div class="winner-home__title">
							<span class="icon"></span>
							<div class="entry-title">
								<span class="number">#<?= esc_html( $key + 1 )?></span>
								<span class="title"><?= wp_kses_post( $value['title'] );?></span>
							</div>
						</div>
						<div class="winner-home__image">
							<img src="<?= esc_url( wp_get_attachment_url( $value['image'] ) );?>" width="346" height="454" alt="<?= esc_attr( $value['name'] )?>">
						</div>
						<div class="winner-home__content">
							<h2><?= esc_html( $value['name'] );?></h2>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
