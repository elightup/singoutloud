<?php

class Custom_Field {

	function __construct() {
		add_filter( 'rwmb_meta_boxes', [ $this, 'register' ] );
	}
	function register( $meta_boxes ) {
		$meta_boxes[] = $this->home();
		$meta_boxes[] = $this->regis();
		$meta_boxes[] = $this->regis_user();

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
				'partner' => [
					'label' => 'Đối tác',
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
					'id'          => 'image_gallery',
					'name'        => '',
					'type'        => 'group',
					'clone'       => true,
					'collapsible' => true,
					'group_title' => 'Gallery {#}',
					'tab'         => 'moment',
					'fields'      => [
						[
							'name'             => __( 'Image', 'singoutloud' ),
							'id'               => 'image_moment',
							'type'             => 'image_advanced',
							'max_file_uploads' => 7,
						],
					],
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
				// Đối tác
				[
					'id'                => 'titless_partner',
					'name'              => esc_html__( 'Title Đối tác', 'singoutloud' ),
					'tab'               => 'partner',
					'sanitize_callback' => 'none',
				],
				[
					'id'   => 'image_partner',
					'name' => esc_html__( 'Image', 'singoutloud' ),
					'type' => 'image_advanced',
					'tab'  => 'partner',
				],
				[
					'id'                => 'title_newspapers',
					'name'              => esc_html__( 'Title Báo chí', 'singoutloud' ),
					'tab'               => 'partner',
					'sanitize_callback' => 'none',
				],
				[
					'id'   => 'image_newspapers',
					'name' => esc_html__( 'Image Báo chí', 'singoutloud' ),
					'type' => 'image_advanced',
					'tab'  => 'partner',
				],
			],
		];
	}

	function regis() {
		return [
			'title'      => esc_html__( 'Setting Resgister', 'singoutloud' ),
			'id'         => 'resgister-setting',
			'post_types' => [ 'page' ],
			'include'    => [
				'template' => [
					'page-templates/register.php',
				],
			],
			'fields'     => [
				[
					'id'   => 'image_register',
					'name' => esc_html__( 'Image', 'singoutloud' ),
					'type' => 'image_advanced',
				],
			],
		];
	}

	function regis_user() {
		return [
			'title'  => __( 'Đăng ký', 'singoutloud' ),
			'id'     => 'dang-ky',
			'type'   => 'user',
			'fields' => [
				[
					'name' => __( 'Phone', 'singoutloud' ),
					'id'   => 'phone_use',
				],
				[
					'name' => __( 'Tôi muốn nhận thông tin về chương trình <br>Sing Out Loud qua email', 'singoutloud' ),
					'id'   => 'check_user',
					'type' => 'checkbox',
				],
			],
		];
	}
}
