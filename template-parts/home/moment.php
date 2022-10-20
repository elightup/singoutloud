<?php
$moment_groups = rwmb_meta('moment_group');
?>
<section class="moment-home">
	<div class="moment-slider">
		<?php
		foreach ($moment_groups as $moment_group) :
			$image_col1s = $moment_group['image_col1'];
			$image_col2s = $moment_group['image_col2'];
			$image_col3s = $moment_group['image_col3'];
		?>
			<div class="moment-slider__item">
				<div class="moment-slider__inner">
					<div class="moment-slider__col1">
						<?php
						foreach ($image_col1s as  $image_col1) :
							echo '<div class="item_slider">';
							echo '<img src="' . wp_get_attachment_url($image_col1) . '" width="1080" height="720" alt="">';
							echo '</div>';
						endforeach;
						?>
					</div>
					<div class="moment-slider__col2">
						<?php
						foreach ($image_col2s as $image_col2) :
							echo '<div class="item_slider">';
							echo '<img src="' . wp_get_attachment_url($image_col2) . '" width="1080" height="720" alt="">';
							echo '</div>';
						endforeach;
						?>
					</div>
					<div class="moment-slider__col3">
						<div class="item_slider">
							<?= '<img src="' . wp_get_attachment_url($image_col3s) . '" width="1080" height="720" alt="">'; ?>
						</div>
					</div>
				</div>
			</div>

		<?php
		endforeach;
		?>
	</div>
</section>
<section class="moment-homeMobi">
	<div class="moment-homeMobi_warp">
		<!-- <div class="moment-sliders"> -->
			<?php
			foreach ($moment_groups as $moment_group) :
				$image_col1s = $moment_group['image_col1'];
				$image_col2s = $moment_group['image_col2'];
				$image_col3s = $moment_group['image_col3'];
			?>
				<div class="moment-slider__item">
					<div class="moment-slider__inner">
						<div class="moment-slider__col1">
							<?php
							foreach ($image_col1s as  $image_col1) :
								echo '<div class="item_slider">';
								echo '<img src="' . wp_get_attachment_url($image_col1) . '" width="1080" height="720" alt="">';
								echo '</div>';
							endforeach;
							?>
						</div>
						<div class="moment-slider__col2">
							<?php
							foreach ($image_col2s as $image_col2) :
								echo '<div class="item_slider">';
								echo '<img src="' . wp_get_attachment_url($image_col2) . '" width="1080" height="720" alt="">';
								echo '</div>';
							endforeach;
							?>
						</div>
						<div class="moment-slider__col3">
							<div class="item_slider">
								<?= '<img src="' . wp_get_attachment_url($image_col3s) . '" width="1080" height="720" alt="">'; ?>
							</div>
						</div>
					</div>
				</div>

			<?php
			endforeach;
			?>
		<!-- </div> -->
	</div>
	<input type="range" id="vol" name="vol" min="0" max="100" value="0" />
	<script defer>
		((d) => {
			d.addEventListener('DOMContentLoaded', () => {
				const boxView = d.querySelector('.moment-homeMobi_warp');
				const boxViews = d.querySelector('.moment-homeMobi');
				const widthBoxView = boxView.offsetWidth / 3;
				let rang = d.querySelector('#vol');
				rang.oninput = (e) => {
					boxViews.scrollLeft = (widthBoxView / 100) * e.target.value
				}

			})
		})(document)
	</script>
</section>