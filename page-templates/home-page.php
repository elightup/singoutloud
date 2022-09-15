<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Home page
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main ">

	<?php
	get_template_part( 'template-parts/home/banner' );
	get_template_part( 'template-parts/home/number' );
	get_template_part( 'template-parts/home/judges' );
	get_template_part( 'template-parts/home/moment' );
	get_template_part( 'template-parts/home/winner' );
	get_template_part( 'template-parts/home/top-ten' );
	get_template_part( 'template-parts/home/news' );
	get_template_part( 'template-parts/home/doi-tac' );
	?>

</main>

<?php get_footer(); ?>
