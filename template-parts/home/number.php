<?php
$numbers = rwmb_meta( 'number_group' );
?>
<section class="number-home">
	<?php foreach ( $numbers as $number ) : ?>
		<div class="number-home__item">
			<div class="number-home__title">
				<span class="unit"><?= wp_kses_post( $number['sub_title'] ); ?></span>
				<h2><span class="count"><?= esc_html( $number['number'] ) ?></span>+</h2>
			</div>
			<p><?= esc_html( $number['title'] );?></p>
		</div>
	<?php endforeach; ?>
</section>
