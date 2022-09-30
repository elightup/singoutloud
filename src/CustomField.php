<?php
namespace Sol;

class CustomField {

	public function __construct() {
		add_filter( 'rwmb_meta_boxes', [ $this, 'register' ] );
	}
	function register( $meta_boxes ) {
		$meta_boxes[] = $this->home();
		$meta_boxes[] = $this->regis();
		$meta_boxes[] = $this->regis_user();
		$meta_boxes[] = $this->login_user();
		$meta_boxes[] = $this->binh_chon();
		$meta_boxes[] = $this->vote();

		return $meta_boxes;
	}

	public function home() {
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
					'id'                => 'content_judges',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'type'              => 'textarea',
					'tab'               => 'judges',
					'sanitize_callback' => 'none',
				],
				[
					'id'   => 'video_judges',
					'name' => esc_html__( 'Video', 'singoutloud' ),
					'tab'  => 'judges',
				],
				[
					'id'                => 'title_judges',
					'name'              => esc_html__( 'Title', 'singoutloud' ),
					'tab'               => 'judges',
					'sanitize_callback' => 'none',
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
							'id'   => 'sub_name',
							'name' => esc_html__( 'Chức vụ', 'singoutloud' ),
						],
						[
							'id'   => 'name',
							'name' => esc_html__( 'Tên giám khảo', 'singoutloud' ),
						],
						[
							'id'                => 'image_judges',
							'name'              => esc_html__( 'Image', 'singoutloud' ),
							'type'              => 'single_image',
							'label_description' => __( '340*448', 'singoutloud' ),
						],
					],
				],
				// Khoảng khắc
				[
					'id'          => 'moment_group',
					'name'        => '',
					'type'        => 'group',
					'group_title' => 'Khối {#}',
					'clone'       => true,
					'collapsible' => true,
					'tab'         => 'moment',
					'fields'      => [
						[
							'name'             => __( 'Cột 1', 'singoutloud' ),
							'id'               => 'image_col1',
							'type'             => 'image_advanced',
							'max_file_uploads' => 3,
						],
						[
							'name'             => __( 'Cột 2', 'singoutloud' ),
							'id'               => 'image_col2',
							'type'             => 'image_advanced',
							'max_file_uploads' => 3,
						],
						[
							'name' => __( 'Cột 3', 'singoutloud' ),
							'id'   => 'image_col3',
							'type' => 'single_image',
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

	public function regis() {
		return [
			'title'      => esc_html__( 'Setting Resgister', 'singoutloud' ),
			'id'         => 'resgister-setting',
			'post_types' => [ 'page' ],
			'include'    => [
				'template' => [
					'page-templates/register.php',
					'page-templates/page-accuracy.php',
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

	public function regis_user() {
		 return [
			 'title'  => __( 'Đăng ký', 'singoutloud' ),
			 'id'     => 'dang-ky',
			 'type'   => 'user',
			 'fields' => [
				 // [
				 // 'name' => __( 'Phone', 'singoutloud' ),
				 // 'id'   => 'phone_use',
				 // ],
				  [
					  'name' => __( 'Tôi muốn nhận thông tin về chương trình <br>Sing Out Loud qua email', 'singoutloud' ),
					  'id'   => 'check_user',
					  'type' => 'checkbox',
				  ],
			 ],
		 ];
	}

	public function login_user() {
		 return [
			 'title'      => esc_html__( 'Setting Resgister', 'singoutloud' ),
			 'id'         => 'resgister-setting',
			 'post_types' => [ 'page' ],
			 'include'    => [
				 'template' => [
					 'page-templates/login-page.php',
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

	public function binh_chon() {
		return [
			'title'      => esc_html__( 'Setting Bình chọn', 'singoutloud' ),
			'id'         => 'binh-chon-setting',
			'post_types' => [ 'page' ],
			'include'    => [
				'template' => [
					'page-templates/binh-chon.php',
				],
			],
			'fields'     => [
				[
					'id'   => 'binh-chon-title',
					'name' => esc_html__( 'Tiêu đề', 'singoutloud' ),
					'type' => 'text',
				],
				[
					'id'   => 'binh-chon-desc',
					'name' => esc_html__( 'Mô tả', 'singoutloud' ),
					'type' => 'textarea',
				],
				[
					'id'          => 'step_group',
					'name'        => '',
					'type'        => 'group',
					'clone'       => true,
					'collapsible' => true,
					'group_title' => 'Bước {#}',
					// 'tab'         => 'top_ten',
					'fields'      => [
						[
							'id'   => 'image',
							'name' => esc_html__( 'Image', 'singoutloud' ),
							'type' => 'single_image',
						],
						[
							'name'    => __( 'Description', 'singoutloud' ),
							'id'      => 'content',
							'type'    => 'wysiwyg',
							'options' => [
								'textarea_rows' => 5,
								'media_buttons' => false,
							],
						],
					],
				],
			],
		];
	}

	public function vote() {
		return [
			'title'      => __( 'Bình chọn', 'singoutloud' ),
			'id'         => 'binh_chon',
			'post_types' => [ 'votes' ],
			'fields'     => [
				[
					'name' => __( 'Họ và tên', 'singoutloud' ),
					'id'   => 'post_title',
					'type' => 'text',
				],
				[
					'name' => __( 'Số báo danh', 'singoutloud' ),
					'id'   => 'sbd',
					'type' => 'text',
				],
				[
					'name' => __( 'Số điện thoại', 'singoutloud' ),
					'id'   => 'phone',
					'type' => 'text',
				],
				[
					'name' => __( 'Email', 'singoutloud' ),
					'id'   => 'email',
					'type' => 'text',
				],
				[
					'name'              => __( 'Video', 'singoutloud' ),
					'id'                => 'post_content',
					'type'              => 'text',
					'label_description' => __( 'Vui lòng up video lên youtube và gửi link cho chúng tôi', 'singoutloud' ),
				],
				[
					'name'    => __( 'Mô tả', 'singoutloud' ),
					'id'      => 'mo_ta',
					'type'    => 'wysiwyg',
					'options' => [
						'textarea_rows' => 10,
					],
				],
			],
		];
	}
}
