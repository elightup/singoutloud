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
				'banner'  => [
					'label' => 'Banner',
				],
				'number'  => [
					'label' => 'Con số',
				],
				'judges'  => [
					'label' => 'Ban giám khảo',
				],
				'moment'  => [
					'label' => 'Khoảnh khắc',
				],
				'top_win' => [
					'label' => 'Top Chiến thắng',
				],
				'top_ten' => [
					'label' => 'Top 10 thí sinh',
				],
				'news'    => [
					'label' => 'Tin tức',
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
				// Number
				[
					'id'          => 'number_group',
					'name'        => '',
					'type'        => 'group',
					'clone'       => true,
					'collapsible' => true,
					'group_title' => '{title}',
					'tab'         => 'number',
					'fields'      => [
						[
							'id'   => 'number',
							'name' => esc_html__( 'Con số', 'singoutloud' ),
						],
						[
							'id'                => 'sub_title',
							'name'              => esc_html__( 'Sub Title', 'singoutloud' ),
							'sanitize_callback' => 'none',
						],
						[
							'id'   => 'title',
							'name' => esc_html__( 'Title', 'singoutloud' ),
						],

					],
				],
				// Ban giám khảo
				[
					'id'                => 'title_judges',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'tab'               => 'judges',
					'sanitize_callback' => 'none',
				],
				[
					'id'   => 'video_judges',
					'name' => esc_html__( 'Video', 'singoutloud' ),
					'tab'  => 'judges',
				],
				[
					'id'          => 'judges_group',
					'name'        => '',
					'type'        => 'group',
					'clone'       => true,
					'collapsible' => true,
					'group_title' => '{name}',
					'tab'         => 'judges',
					'fields'      => [
						[
							'id'   => 'title',
							'name' => esc_html__( 'Title', 'singoutloud' ),
						],
						[
							'id'   => 'sub_name',
							'name' => esc_html__( 'Chức vụ', 'singoutloud' ),
						],
						[
							'id'   => 'name',
							'name' => esc_html__( 'Tên giám khảo', 'singoutloud' ),
						],
						[
							'id'   => 'image_judges',
							'name' => esc_html__( 'Image', 'singoutloud' ),
							'type' => 'single_image',
						],
					],
				],
				// Khoảng khắc
				[
					'id'                => 'title_moment',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'tab'               => 'moment',
					'sanitize_callback' => 'none',
				],
				[
					'id'                => 'title_moment',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'type'              => 'image_advanced',
					'tab'               => 'moment',
					'sanitize_callback' => 'none',
				],
				// Top Chiến thắng
				[
					'id'                => 'title_top_win',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'tab'               => 'top_win',
					'sanitize_callback' => 'none',
				],
				[
					'id'          => 'win_group',
					'name'        => '',
					'type'        => 'group',
					'clone'       => true,
					'collapsible' => true,
					'group_title' => '{name}',
					'tab'         => 'top_win',
					'fields'      => [
						[
							'id'                => 'title',
							'name'              => esc_html__( 'Title', 'singoutloud' ),
							'sanitize_callback' => 'none',
						],
						[
							'id'   => 'sub_name',
							'name' => esc_html__( 'Chức vụ', 'singoutloud' ),
						],
						[
							'id'   => 'name',
							'name' => esc_html__( 'Tên thí sinh', 'singoutloud' ),
						],
						[
							'id'   => 'image',
							'name' => esc_html__( 'Image', 'singoutloud' ),
							'type' => 'single_image',
						],
					],
				],
				// Top 10
				[
					'id'                => 'title_top_ten',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'tab'               => 'top_ten',
					'sanitize_callback' => 'none',
				],
				[
					'id'          => 'top_ten_group',
					'name'        => '',
					'type'        => 'group',
					'clone'       => true,
					'collapsible' => true,
					'group_title' => '{name}',
					'tab'         => 'top_ten',
					'fields'      => [
						[
							'id'   => 'name',
							'name' => esc_html__( 'Tên thí sinh', 'singoutloud' ),
						],
						[
							'id'   => 'video',
							'name' => esc_html__( 'Video thí sinh', 'singoutloud' ),
						],
					],
				],
				// news
				[
					'id'                => 'title_news',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'tab'               => 'news',
					'sanitize_callback' => 'none',
				],
				[
					'name'       => __( 'Tin tức', 'singoutloud' ),
					'id'         => 'news_advanced',
					'type'       => 'taxonomy_advanced',
					'taxonomy'   => [ 'category' ],
					'field_type' => 'select_advanced',
					'tab'        => 'news',
				],
			],
		];
	}
}
