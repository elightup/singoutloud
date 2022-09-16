<?php // @codingStandardsIgnoreLine
/**
 * Template Name: New page
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main ">
	<?php
	$title = rwmb_meta('new-title');
	?>

	<div class="new">
		<div class="new__title">
			<?= $title; ?>
		</div>

		<?php
		get_template_part('template-parts/news/featured');
		?>

	</div>

</main>

<?php get_footer(); ?>