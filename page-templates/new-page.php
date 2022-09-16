<?php // @codingStandardsIgnoreLine
/**
 * Template Name: New page
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main ">

	<div class="new">
		<?php
		get_template_part('template-parts/news/featured');
		get_template_part('template-parts/news/list-post');
		?>
	</div>

</main>

<?php get_footer(); ?>