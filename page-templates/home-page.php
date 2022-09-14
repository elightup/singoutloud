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
	get_template_part( 'template-parts/home/winner' );
	?>

</main>

<?php get_footer(); ?>
