<?php
$moment_groups = rwmb_meta('moment_group');
?>
<section class="moment">
	<?php
	foreach ($moment_gruops as $moment_group) :
		$image_col2s = $moment_group('image_col2');
		$image_col3s = $moment_group('image_col3');
	?>
		<div class="moment_col1">
			<?php
			foreach ($variable as $key => $value) :
				$image_col1s = $moment_group('image_col1');
				var_dump($image_col1s);
			?>

			<?php
			endforeach;
			?>
			<?php Template_function::sol_get_image_id($image_col1s['ID']); ?>
		</div>
		<div class="moment_col2">
			<?php Template_function::sol_get_image_id($image_col2s['ID']); ?>
		</div>
		<div class="moment_col3">
			<?php Template_function::sol_get_image_id($image_col3s['ID']); ?>
		</div>
	<?php
	endforeach;
	?>
	<div class="moment__col1">

	</div>
</section>