<?php
$title_news = rwmb_meta('new-title');
$news       = rwmb_meta('news_select');
$id_new     = $news->term_id;
$args       = [
	'post_type'      => 'post',
	'posts_per_page' => 10,
	'cat'            => $id_new,
];
$query      = new WP_Query($args);
?>
<section class="new-home">
	<div class="container">
		<h2 class="new__title"><?= esc_html($title_news); ?></h2>
		<div class="new-home__wrap">
			<div class="new-home__inner">
				<?php
				if ($query->have_posts()) :
					while ($query->have_posts()) :
						$query->the_post();
						singoutloud_post_new();
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</section>