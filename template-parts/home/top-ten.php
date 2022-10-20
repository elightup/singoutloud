<?php
$title_ten = rwmb_meta( 'title_top_ten' );
$group_ten = rwmb_meta( 'top_ten_group' );
?>
<section class="top-ten">
	<div class="container">
		<div class="top-ten__wrap">
			<h2 class="title"><?= wp_kses_post( $title_ten );?></h2>
			<div class="top-ten__inner">
				<?php
				foreach ( $group_ten as $key => $value ) :
					$video = $value['video'];
					if ( strpos( $video, '=' ) ) {
						$idvideo = substr( $video, strpos( $video, '=' ) + 1, 11 );
					} else {
						$idvideo = substr( $video, strpos( $video, 'embed' ) + 6, 11 );
					};
					if ( $key === 1 ) {
						$open = 'open';
					} else {
						$open = '';
					}
					?>
					<details <?= esc_html( $open )?>>
						<summary>
							<span class="top-ten_lable">Thí sinh</span>
							<?= esc_html( $value['name'] ); ?>
						</summary>
						<div class="panel">
							<?php if ( ! empty( $video ) ) : ?>
								<iframe width="767" height="426" src="https://www.youtube.com/embed/<?= $idvideo ?>"
									title="YouTube video player" frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen>
								</iframe>
							<?php endif; ?>
						</div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
