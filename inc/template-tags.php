<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package singoutloud
 */
function singoutloud_post_new() {
	?>
	<div class="new-home__item">
		<div class="new-home__image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
		<div class="new-home__title">
			<p class="date"><?= get_the_date( 'd/m' );?></p>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
	<?php
}
