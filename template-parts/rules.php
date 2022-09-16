<?php
$title = rwmb_meta('rule-title');
$image = rwmb_meta('rule-image');
$steps = rwmb_meta('rule-group');
?>
<section class="rule">
	<div class="rule__title">
		<?= $title; ?>
	</div>
	<div class="rule__inner">
		<div class="rule__image">
			<?php Template_function::sol_get_image_id($image['ID']); ?>
		</div>
		<div class="rule__wrap">
			<?php
			foreach ($steps as $key => $step) :
			?>
				<div class="rule__item">
					<div class="rule__item-number">
						<?php
						$number = $key + 1;
						?>
						<?= '0' . $number ?>
					</div>
					<div class="rule__item-bg">
						<?php Template_function::sol_get_image_path('rl.svg') ?>
					</div>
					<div class="rule__item-content">
						<div class="rule__item-title">
							<?= esc_html($step['rule-steps']); ?>
						</div>
						<div class="rule__item-time">
							<?= esc_html($step['rule-time']); ?>
						</div>
						<div class="rule__item-desc">
							<?= wpautop($step['rule-content']) ?>
						</div>
					</div>
				</div>
			<?php
			endforeach;
			?>
		</div>
	</div>
</section>