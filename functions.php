<?php
define( 'SINGOUTLOUD_VERSION', '1.0.0' );
require __DIR__ . '/src/loader.php';
new Loader();

require __DIR__ . '/inc/template-tags.php';
require __DIR__ . '/inc/template-hook.php';
require __DIR__ . '/inc/customizer.php';
require __DIR__ . '/inc/class-singoutloud-icons.php';

if ( ! function_exists( 'rwmb_meta' ) ) {
	/**
	 * Fallback function metabox.
	 *
	 * @return mixed
	 */
	function rwmb_meta( $key, $args = [], $post_id = null ) {
		return null;
	}
}
