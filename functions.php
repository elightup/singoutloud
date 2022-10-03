<?php
define( 'SINGOUTLOUD_VERSION', '1.0.0' );

require __DIR__ . '/vendor/autoload.php';

new Sol\Loader;
// new Sol\TemplateFunction;
new Sol\Fields;
new Sol\CustomField;
if ( is_admin() ) {
	( new Sol\User )->init();
}

require __DIR__ . '/inc/template-tags.php';
require __DIR__ . '/inc/template-hook.php';
require __DIR__ . '/inc/customizer.php';
require __DIR__ . '/inc/class-singoutloud-icons.php';
require __DIR__ . '/functions-voted-zanchi.php';
require __DIR__ . '/src/TemplateFunction.php';

/**
 * Gọi API gửi sms
*/
// require_once __DIR__ . '/TechAPI/bootstrap.php';
// require __DIR__ . '/inc/sms-otp.php';

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
