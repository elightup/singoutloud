<div class="post__votes">
	<div class="container">
		<div class="post__head-title">
			<h1><?php the_title(); ?></h1>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><?php SingOutLoud_Icons::render( 'icon-face' ) ?></a>
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
					<p class="sbd"> SBD: <?= $sbd;?></p>
				<?php endif; ?>
				<?php if ( ! empty( $phone ) ) : ?>
					<p class="phone"> Số điện thoại: <?= $phone;?></p>
				<?php endif; ?>
				<?php if ( ! empty( $email ) ) : ?>
					<p class="email"> Email: <?= $email;?></p>
				<?php endif; ?>
				<p><?= $mo_ta;?></p>
			</div>
			<!-- <div class="comments">
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="15"></div>
			</div> -->
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		</div>
	</div>

</div>
