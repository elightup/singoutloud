<?php
$args = [
	'post_type'      => 'post',
	'posts_per_page' => 5,
];
$query      = new WP_Query($args);
?>
<section class="list-post container">
	<?php
	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
	?>
			<div class="list-post__item">
				<div class="list-post__image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>
				<div class="list-post__title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			</div>
	<?php
		endwhile;
	endif;
	?>
</section>