<?php

class Fields
{

	function __construct()
	{
		add_filter('rwmb_meta_boxes', [$this, 'register']);
	}
	function register($meta_boxes)
	{
		$meta_boxes[] = $this->contact();
		$meta_boxes[] = $this->about();
		$meta_boxes[] = $this->rules();
		$meta_boxes[] = $this->prize();
		$meta_boxes[] = $this->news();
		$meta_boxes[] = $this->home_moment();

		return $meta_boxes;
	}

	//Contact
	function contact()
	{
		return [
			'title'      => __('Cài đặt trang', 'singoutloud'),
			'post_types' => ['page'],
			'tab_style'  => 'left',
			'include'    => [
				'relation' => 'OR',
				'template' => ['page-templates/contact-page.php'],
			],
			'tabs' => [
				'image' => [
					'label' => 'Ảnh',
				],
				'social' => [
					'label' => 'Social Media',
				],
				'to_chuc' => [
					'label' => 'Ban Tổ Chức',
				],
			],
			'fields' => [
				[
					'name' => esc_html__('Kích thước', 'singoutloud'),
					'id' => 'image',
					'type' => 'single_image',
					'label_description' => __('1024*570', 'singoutloud'),
					'tab' => 'image',
				],
				//Theo dõi chúng tôi
				[
					'name' => esc_html__('Tiêu đề', 'singoutloud'),
					'id' => 'socialmedia',
					'type' => 'text',
					'tab' => 'social',
				],
				[
					'name' => esc_html__('Link Social', 'singoutloud'),
					'id' => 'social-group',
					'type' => 'group',
					'clone' => true,
					'collapsible' => true,
					'default_state' => 'collapsed',
					'group_title' => '{social-title}',
					'save_state' => true,
					'tab' => 'social',
					'fields' => [
						[
							'id' => 'social-icon',
							'name' => esc_html__('icon', 'singoutloud'),
							'type' => 'single_image',
						],
						[
							'id' => 'social-title',
							'name' => esc_html__('Nội dung', 'singoutloud'),
							'type' => 'text'
						],
						[
							'id' => 'social-link',
							'name' => esc_html__('Link', 'singoutloud'),
							'type' => 'text'
						],
					],
				],

				// Ban tổ chức
				[
					'name' => __('Tiêu đề', 'singoutloud'),
					'id' => 'to-chuc',
					'type' => 'text',
					'tab' => 'to_chuc',
				],
				[
					'name' => __('Thành viên ban tổ chức', 'singoutloud'),
					'id' => 'tochuc-group',
					'type' => 'group',
					'clone' => true,
					'collapsible' => true,
					'default_state' => 'collapsed',
					'group_title' => '{tochuc-ten}',
					'save_state' => true,
					'tab' => 'to_chuc',
					'fields' => [
						[
							'id' => 'tochuc-mien',
							'name' => esc_html__('Miền', 'singoutloud'),
							'type' => 'text',
						],
						[
							'id' => 'tochuc-ten',
							'name' => esc_html__('Họ Tên', 'singoutloud'),
							'type' => 'text'
						],
						[
							'id' => 'tochuc-mail',
							'name' => esc_html__('Email', 'singoutloud'),
							'type' => 'text'
						],
						[
							'id' => 'tochuc-tel',
							'name' => esc_html__('Số điện thoại', 'singoutloud'),
							'type' => 'text',
						],
					],
				],
			],
		];
	}

	//About
	function about()
	{
		return [
			'title'      => __('Cài đặt trang', 'singoutloud'),
			'post_types' => ['page'],
			'tab_style'  => 'left',
			'include'    => [
				'relation' => 'OR',
				'template' => ['page-templates/about-page.php'],
			],
			'tabs' => [
				'left' => [
					'label' => 'Nội dung bên trái',
				],
				'right' => [
					'label' => 'Nội dung bên phải',
				],
			],
			'fields' => [
				//left
				[
					'name' => esc_html__('Ảnh', 'singoutloud'),
					'id' => 'left-image',
					'type' => 'single_image',
					'label_description' => __('170*85', 'singoutloud'),
					'tab' => 'left',
				],
				[
					'name' => esc_html__('Nội dung', 'singoutloud'),
					'id' => 'left-content',
					'type' => 'wysiwyg',
					'tab' => 'left',
				],
				//right
				[
					'name' => esc_html__('Ảnh Background', 'singoutloud'),
					'id' => 'right-image',
					'type' => 'single_image',
					'label_description' => __('1024*1024', 'singoutloud'),
					'tab' => 'right',
				],
				[
					'name' => esc_html__('Nội dung', 'singoutloud'),
					'id' => 'right-content',
					'type' => 'wysiwyg',
					'tab' => 'right',
				],
			],
		];
	}

	//Rule
	function rules()
	{
		return [
			'title'      => __('Cài đặt trang', 'singoutloud'),
			'post_types' => ['page'],
			'include'    => [
				'relation' => 'OR',
				'template' => ['page-templates/rules-page.php'],
			],
			'fields' => [
				[
					'name' => esc_html__('Tiêu Đề', 'singoutloud'),
					'id' => 'rule-title',
					'type' => 'text',
				],
				[
					'name' => esc_html__('Ảnh', 'singoutloud'),
					'id' => 'rule-image',
					'type' => 'single_image',
				],
				[
					'name' => esc_html__('Các Vòng', 'singoutloud'),
					'id' => 'rule-group',
					'type' => 'group',
					'clone' => true,
					'collapsible' => true,
					'default_state' => 'collapsed',
					'group_title' => '{rule-steps}',
					'save_state' => true,
					'fields' => [
						[
							'id' => 'rule-steps',
							'name' => esc_html__('Tên Vòng', 'singoutloud'),
							'type' => 'text',
						],
						[
							'id' => 'rule-time',
							'name' => esc_html__('Thời Gian', 'singoutloud'),
							'type' => 'text'
						],
						[
							'id' => 'rule-content',
							'name' => esc_html__('Nội Dung', 'singoutloud'),
							'type' => 'wysiwyg',
						],
					],
				],
			],
		];
	}

	//Prize
	function prize()
	{
		return [
			'title'      => __('Cài đặt trang', 'singoutloud'),
			'post_types' => ['page'],
			'include'    => [
				'relation' => 'OR',
				'template' => ['page-templates/prize-page.php'],
			],
			'fields' => [
				[
					'name' => esc_html__('Tiêu Đề', 'singoutloud'),
					'id' => 'prize-title',
					'type' => 'textarea',
				],
				[
					'name' => esc_html__('Ảnh', 'singoutloud'),
					'id' => 'prize-image',
					'type' => 'single_image',
					'label_description' => __('735*1025', 'singoutloud'),
				],
				[
					'name' => esc_html__('Giải Thưởng', 'singoutloud'),
					'id' => 'prize-group',
					'type' => 'group',
					'clone' => true,
					'collapsible' => true,
					'default_state' => 'collapsed',
					'group_title' => '{prize-name}',
					'save_state' => true,
					'fields' => [
						[
							'id' => 'prize-name',
							'name' => esc_html__('Tên Giải', 'singoutloud'),
							'type' => 'text',
						],
						[
							'id' => 'prize-number',
							'name' => esc_html__('Phần Thưởng', 'singoutloud'),
							'type' => 'text',
						],
						[
							'id' => 'prize-desc',
							'name' => esc_html__('Chi tiết', 'singoutloud'),
							'type' => 'wysiwyg',
						],
					],
				],
			],
		];
	}

	//News
	function news()
	{
		return [
			'title'      => __('Cài Đặt Trang', 'singoutloud'),
			'post_types' => ['page'],
			'include'    => [
				'relation' => 'OR',
				'template' => ['page-templates/new-page.php'],
			],
			'fields' => [
				[
					'name'              => esc_html__('Tiêu Đề', 'singoutloud'),
					'id'                => 'new-title',
					'sanitize_callback' => 'none',
				],
				[
					'name'       => __('Chọn Chuyên Mục', 'singoutloud'),
					'id'         => 'news_select',
					'type'       => 'taxonomy_advanced',
					'taxonomy'   => ['category'],
					'field_type' => 'select_advanced',
				],

			],
		];
	}


	//Khoảnh khắc
	function home_moment()
	{
		return [
			'title'      => esc_html__('Cài đặt', 'singoutloud'),
			'id'         => 'moment-setting',
			'post_types' => ['page'],
			'include'    => [
				'template' => [
					'page-templates/home-page.php',
				],
			],
			'fields' => [
				[
					'id'          => 'moment_group',
					'name'        => '',
					'type'        => 'group',
					'group_title' => 'Khối {#}',
					'clone'       => true,
					'collapsible' => true,
					'fields'      => [
						[
							'name'             => __('Cột 1', 'singoutloud'),
							'id'               => 'image_col1',
							'type'             => 'image_advanced',
							'max_file_uploads' => 3,
						],
						[
							'name'             => __('Cột 2', 'singoutloud'),
							'id'               => 'image_col2',
							'type'             => 'image_advanced',
							'max_file_uploads' => 3,
						],
						[
							'name'             => __('Cột 3', 'singoutloud'),
							'id'               => 'image_col3',
							'type'             => 'single_image',
						],
					],
				],
			],
		];
	}
}
