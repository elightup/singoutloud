<?php
$left_image = rwmb_meta('left-image');
$left_content = rwmb_meta('left-content');
$right_imagebg = rwmb_meta('right-image');
$right_content = rwmb_meta('right-content');
?>
<section class="about">
	<div class="about__left">
		<div class="about__left-bg1"></div>
		<div class="about__left-bg2"></div>
		<div class="about__left-bg3"></div>
		<div class="about__left-inner">
			<div class="about__left-image">
				<?php Template_function::sol_get_image_id($left_image['ID']); ?>
			</div>
			<div class="about__left-content">
				<?= wpautop($left_content); ?>
			</div>
		</div>
	</div>
	<div class="about__right" style="background-image: url(<?= $right_imagebg['url'] ?>">
		<div class="about__right-image">
			<div class="about__right-logo">
				<?php the_custom_logo(); ?>
			</div>
			<div class="about__right-image">
				<?php Template_function::sol_get_image_path('bg_vuong.png'); ?>
			</div>
		</div>
		<div class="about__right-content">
			<?= wpautop($right_content); ?>
		</div>
	</div>
</section>