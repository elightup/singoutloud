
<div class="post__wrap p-container">
	<div class="post__detail">
		<div class="post__social">
			<a href="#">
				<?php Template_function::sol_get_image_path( 'posthome.png' ) ?>
			</a>
			<a href="#">
				<?php Template_function::sol_get_image_path( 'postfb.png' ) ?>
			</a>
		</div>
		<div class="post__head">
			<div class="post__head-title">
				<?php the_title() ?>
			</div>
		</div>
	</div>
	<div class="post__content ">
		<div class="post__desc">
			<?php the_content(); ?>
			<?php
			$sbd   = rwmb_meta( 'sbd' );
			$phone = rwmb_meta( 'phone' );
			$email = rwmb_meta( 'email' );
			$mo_ta = rwmb_meta( 'mo_ta' );
			?>
			<?php if ( ! empty( $sbd ) ) : ?>
				Số báo danh: <?= $sbd;?><br>
			<?php endif; ?>
			<?php if ( ! empty( $phone ) ) : ?>
				Số điện thoại: <?= $phone;?><br>
			<?php endif; ?>
			<?php if ( ! empty( $email ) ) : ?>
				Email: <?= $email;?><br>
			<?php endif; ?>
			<?= $mo_ta;?>
		</div>
	</div>
</div>
