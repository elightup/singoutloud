<?php
$title_moment  = rwmb_meta( 'title_moment' );
$moment_groups = rwmb_meta( 'moment_group' );
?>
<section class="moment-home">
	<div class="container">
		<h2 class="title"><?= wp_kses_post( $title_moment );?></h2>
	</div>
	<div class="moment">
	<?php
	foreach ( $moment_groups as $moment_group ) :
		$image_col1s = $moment_group['image_col1'];
		$image_col2s = $moment_group['image_col2'];
		$image_col3s = $moment_group['image_col3'];
		?>
		<ul class="moment__wrap">
			<li class="moment__item">

				<div class="moment__col1">
					<?php
					foreach ( $image_col1s as  $image_col1 ) :
						echo '<img src="' . wp_get_attachment_url( $image_col1 ) . '" alt="">';
					endforeach;
					?>
				</div>
				<div class="moment__col2">
					<?php
					foreach ( $image_col2s as $image_col2 ) :
						echo '<img src="' . wp_get_attachment_url( $image_col2 ) . '" alt="">';
					endforeach;
					?>
				</div>
				<div class="moment__col3">
					<?= '<img src="' . wp_get_attachment_url( $image_col3s ) . '" alt="">'; ?>
				</div>
			</li>

		</ul>

		<?php
	endforeach;
	?>
	</div>
</section>
