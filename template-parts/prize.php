<?php
$title = rwmb_meta('prize-title');
$image = rwmb_meta('prize-image');
$prize_groups = rwmb_meta('prize-group');
?>

<section class="prize">
	<div class="prize__title">
		<?= wpautop($title) ?>
	</div>
	<div class="prize__inner">
		<div class="prize__content">
			<?php
			foreach ($prize_groups as $key => $prize_group) :
			?>
				<div class="prize__item item<?= $key ?>">
					<div class="prize__item-title">
						<?= esc_html($prize_group['prize-name']); ?>
					</div>
					<div class="prize__item-number">
						<?= esc_html($prize_group['prize-number']); ?>
					</div>
					<div class="prize__item-desc">
						<?= wpautop($prize_group['prize-desc']); ?>
					</div>
				</div>
			<?php
			endforeach;
			?>
		</div>
		<div class="prize__image">
			<?php Template_function::sol_get_image_id($image['ID']); ?>
			<div class="prize__image-bg">
				<?php Template_function::sol_get_image_path('bg_vuong.png'); ?>
			</div>
		</div>
	</div>
</section>