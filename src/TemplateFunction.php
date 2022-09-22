<?php

class Template_function {

	public static function sol_get_image_path( $name ) {       ?>
		<img class="img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/<?php echo esc_attr( $name ) ?>" alt="">
		<?php
	}
	public static function sol_icon( $name ) {
		 $icon = file_get_contents( get_template_directory() . "/images/$name.svg" );
		echo $icon;
	}
	public static function sol_get_image_id( $ID ) {
		?>
		<div class="entry-thumbnail">
			<?php echo wp_get_attachment_image( $ID, 'full', false ) ?>
		</div>
		<?php
	}
}
