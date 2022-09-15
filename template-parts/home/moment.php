<?php
$title_moment = rwmb_meta( 'title_moment' );
$galleries    = rwmb_meta( 'image_gallery' );
?>
<section class="moment-home">
	<div class="container">
		<h2 class="title"><?= wp_kses_post( $title_moment );?></h2>
		<div class="moment-home__wrap">
			<ul>
				<?php
				foreach ( $galleries as $gallery ) :
					$images = $gallery['image_moment'];
					echo '<li>';
					foreach ( $images as $k => $image ) :
						echo '<div class="moment-home__item item_' . $k . '">';
						echo '<img src="' . wp_get_attachment_url( $image ) . '" alt="">';
						echo '</div>';
					endforeach;
					echo '</li>';
				endforeach;
				?>
			</ul>
		</div>
	</div>
</section>
