<?php
$image = rwmb_meta('image');
$social_title = rwmb_meta('socialmedia');
$social_groups = rwmb_meta('social-group');
$tochuc_title = rwmb_meta('to-chuc');
$tochuc_groups = rwmb_meta('tochuc-group');
?>
<section class="contact">
	<div class="contact__image">
		<?php Template_function::sol_get_image_id($image['ID']); ?>
	</div>
	<div class=" contact__inner">
		<div class="contact__social">
			<h2 class="contact__title">
				<?= $social_title; ?>
			</h2>
			<div class="contact__social-wrap">
				<?php
				foreach ($social_groups as  $social_group) {
					$icon = $social_group['social-icon'];
					$title = $social_group['social-title'];
					$link = $social_group['social-link'];
				?>
					<div class="contact__social-item">
						<?php Template_function::sol_get_image_id($icon) ?>
						<div class="contact__social-item-link">
							<a href=" <?= esc_html($link); ?>"> <?= esc_html($title); ?> </a>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="contact__tochuc">
			<h2 class="contact__title">
				<?= $tochuc_title; ?>
			</h2>
			<div class="contact__tochuc-wrap">
				<?php
				foreach ($tochuc_groups as  $tochuc_group) {
					$mien = isset($tochuc_group['tochuc-mien']) ? $tochuc_group['tochuc-mien'] : null;
					$name = $tochuc_group['tochuc-ten'];
					$mail = $tochuc_group['tochuc-mail'];
					$tel = $tochuc_group['tochuc-tel'];
				?>
					<div class="contact__tochuc-item">
						<h2 class="contact__tochuc-item-location"><?= esc_html($mien) ?></h2>
						<h2 class="contact__tochuc-item-name"><?= esc_html($name) ?></h2>
						<a href="mailto:<?= $mail ?>"><?= esc_html($mail) ?></a>
						<br />
						<a href="tel: <?= $tel ?>"><?= esc_html($tel) ?></a>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="contact__bg">
		<?php Template_function::sol_get_image_path('lhbg.png') ?>
	</div>
</section>