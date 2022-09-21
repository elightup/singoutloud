<?php
namespace Sol;

class Assets {
	public static function css( $name ) {
		wp_enqueue_style( $name, get_template_directory_uri() . "/css/$name.css", [], filemtime( get_stylesheet_directory() . "/css/$name.css" ) );
	}

	public static function js( $name, $deps = [], $data = [] ) {
		wp_enqueue_script( $name, get_template_directory_uri() . "/js/$name.js", $deps, filemtime( get_stylesheet_directory() . "/js/$name.js" ), true );

		if ( $data ) {
			wp_localize_script( $name, $name, $data );
		}
	}

	public static function template_css( $templates, $name ) {
		if ( is_page_template( $templates ) ) {
			self::css( $name );
		}
	}

	public static function template_js( $templates, $name, $deps = [], $data = [] ) {
		if ( is_page_template( $templates ) ) {
			self::js( $name, $deps, $data );
		}
	}
}
