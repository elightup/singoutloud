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
	?>

</main>

<?php get_footer(); ?>
