<?php
$args = [
	'post_type'      => 'post',
	'posts_per_page' => 5,
];
$query      = new WP_Query($args);
?>
<section class="list-post container">
	<div class="list-post_warp">

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
	</div>
	<input type="range" id="vol" name="vol" min="0" max="100" value="0" />
	<script defer>
		((d) => {
			d.addEventListener('DOMContentLoaded', () => {
				const boxView = d.querySelector('.list-post_warp');
				const boxViews = d.querySelector('.list-post');
				const widthBoxView = boxView.offsetWidth *3 ;
				console.log(boxView);
				let rang = d.querySelector('#vol');
				rang.oninput = (e) => {
					boxViews.scrollLeft = (widthBoxView / 100) * e.target.value
				}

			})
		})(document)
	</script>
</section>