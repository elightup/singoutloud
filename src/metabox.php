<?php

class Custom_Field {

	function __construct() {
		add_filter( 'rwmb_meta_boxes', [ $this, 'register' ] );
	}
	function register( $meta_boxes ) {
		$meta_boxes[] = $this->home();

		return $meta_boxes;
	}
	function home() {
		return [
			'title'      => esc_html__( 'Setting Home', 'singoutloud' ),
			'id'         => 'home-setting',
			'post_types' => [ 'page' ],
			'include'    => [
				'template' => [
					'page-templates/home-page.php',
				],
			],
			'tabs'       => [
				'banner' => [
					'label' => 'Banner',
				],
			],
			'fields'     => [
				// Banner
				[
					'id'   => 'banner_image',
					'name' => esc_html__( 'Image', 'singoutloud' ),
					'type' => 'single_image',
					'tab'  => 'banner',
				],
				[
					'id'                => 'title_banner',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'sanitize_callback' => 'none',
					'tab'               => 'banner',
				],
				[
					'id'                => 'content_banner',
					'name'              => esc_html__( 'Content', 'singoutloud' ),
					'type'              => 'textarea',
					'sanitize_callback' => 'none',
					'tab'               => 'banner',
				],
			],
		];
	}
}
