<?php
$argr = [
	'post_type'      => ['post'],
	'posts_per_page' => -1,
];
$posts = get_posts($argr);

?>
<section class="featured">
	<?php
	foreach ($posts as $key => $post) :
		$checkbox = rwmb_meta('post-check', '', $post->ID);
		if ($checkbox != '1') {
			continue;
		}
	?>
		<div class="featured__item">
			<div class="featured__item-image">
				<?= get_the_post_thumbnail($post->ID, 'full'); ?>
			</div>
			<div class="featured__item-content">
				<div class="featured__item-time">
					<?= get_the_date('d/m') ?>
				</div>
				<div class="featured__item-title">
					<?php echo get_the_title($post->ID); ?>
				</div>
			</div>
		</div>
	<?php
	endforeach;
	?>
</section>