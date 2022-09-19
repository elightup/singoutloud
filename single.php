<?php get_header(); ?>

<section class="post">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/single/single', get_post_type() );

	endwhile; // End of the loop.
	?>

</section>

<?php get_footer(); ?>
