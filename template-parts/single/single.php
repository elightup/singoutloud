<div class="post__banner">
	<?php the_post_thumbnail(); ?>
	<div class="post__inner">
		<div class="post__top p-container">
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
					<div class="post__head-view">
						<div class="post__head-view-eye">
							<?php Template_function::sol_get_image_path( 'view1.png' ) ?>
							<span>1.232</span>
						</div>
						<div class="post__head-view-share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink(); ?>"><?php Template_function::sol_get_image_path( 'share1.png' ) ?></a>
							<span>14</span>
						</div>
					</div>
				</div>
			</div>
			<div class="post__info post__content">
				<div class="post__info-author">
					<?php
					$author_id   = get_post_field( 'post_author', get_the_ID() );
					$author_name = get_the_author_meta( 'display_name', $author_id );
					echo 'Theo ' . $author_name;
					?>
				</div>
				<div class="post__info-time">
					<?= get_the_date( 'd/m/Y H:i' ); ?>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="post__wrap p-container">
	<div class="post__content ">
		<div class="post__desc">
			<?php the_content(); ?>
		</div>
		<div class="post__nav">
			<div class="post__nav-back">
				<a href="javascript: history.go(-1)">Go Back</a>
			</div>
			<div class="post__nav-next">
				<?php next_post_link(); ?>
			</div>
		</div>
	</div>
</div>
