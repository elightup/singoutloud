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

		return $meta_boxes;
	}

	//Contact
	function contact()
	{
		return [
			'title'      => __('Cài đặt trang', 'sol'),
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
					'name' => esc_html__('Kích thước', 'sol'),
					'id' => 'image',
					'type' => 'single_image',
					'label_description' => __('1024*570', 'sol'),
					'tab' => 'image',
				],
				//Theo dõi chúng tôi
				[
					'name' => esc_html__('Tiêu đề', 'sol'),
					'id' => 'socialmedia',
					'type' => 'text',
					'tab' => 'social',
				],
				[
					'name' => esc_html__('', 'sol'),
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
							'name' => esc_html__('icon', 'sol'),
							'type' => 'single_image',
						],
						[
							'id' => 'social-title',
							'name' => esc_html__('Nội dung', 'sol'),
							'type' => 'text'
						],
						[
							'id' => 'social-link',
							'name' => esc_html__('Link', 'sol'),
							'type' => 'text'
						],
					],
				],

				// Ban tổ chức
				[
					'name' => __('Tiêu đề', 'sol'),
					'id' => 'to-chuc',
					'type' => 'text',
					'tab' => 'to_chuc',
				],
				[
					'name' => __('', 'sol'),
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
							'name' => esc_html__('Miền', 'sol'),
							'type' => 'text',
						],
						[
							'id' => 'tochuc-ten',
							'name' => esc_html__('Họ Tên', 'sol'),
							'type' => 'text'
						],
						[
							'id' => 'tochuc-mail',
							'name' => esc_html__('Email', 'sol'),
							'type' => 'text'
						],
						[
							'id' => 'tochuc-tel',
							'name' => esc_html__('Số điện thoại', 'sol'),
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
			'title'      => __('Cài đặt trang', 'sol'),
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
					'name' => esc_html__('Ảnh', 'sol'),
					'id' => 'left-image',
					'type' => 'single_image',
					'label_description' => __('1024*570', 'sol'),
					'tab' => 'left',
				],
				[
					'name' => esc_html__('Nội dung', 'sol'),
					'id' => 'left-content',
					'type' => 'wysiwyg',
					'tab' => 'left',
				],
				//right
				[
					'name' => esc_html__('Ảnh Background', 'sol'),
					'id' => 'right-image',
					'type' => 'single_image',
					'label_description' => __('1024*570', 'sol'),
					'tab' => 'right',
				],
				[
					'name' => esc_html__('Nội dung', 'sol'),
					'id' => 'right-content',
					'type' => 'wysiwyg',
					'tab' => 'right',
				],
			],
		];
	}
}
