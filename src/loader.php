<?php

require __DIR__ . '/fields.php';
require __DIR__ . '/metabox.php';
require __DIR__ . '/template_function.php';
require __DIR__ . '/handle.php';
class Loader
{




	public function __construct()
	{
		add_action('after_setup_theme', [$this, 'setup']);
		add_action('widgets_init', [$this, 'tmt_widgets_init']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);

		$this->init();
	}
	public function setup()
	{
		load_theme_textdomain('sol', get_template_directory() . '/languages');

		register_nav_menu('primary', __('Primary Menu', 'sol'));

		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);

		add_theme_support('post-thumbnails');
		add_theme_support('custom-logo');

		/**
		 * Add support for the block editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
		 */
		add_theme_support('wp-block-styles');
		add_theme_support('align-wide');
		add_theme_support('editor-styles');
		add_theme_support('responsive-embeds');
	}

	function tmt_widgets_init()
	{
		register_sidebar(
			[
				'name'          => esc_html__('Widget-Header', 'sol'),
				'id'            => 'header',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__('Widget-Footer-Ban tổ chức', 'sol'),
				'id'            => 'footer',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__('Widget-Footer-SocialMedia', 'sol'),
				'id'            => 'footer-social',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]
		);
	}

	public function enqueue_assets()
	{
		wp_enqueue_style('sol-theme', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));
		Handle::set_script('script', ['jquery']);
		// Thêm style cho template

		// Handle::set_style_tempalte('page-templates/home-template.php', 'home');
		Handle::set_style_tempalte('page-templates/contact-page.php', 'contact');
		Handle::set_style_tempalte('page-templates/about-page.php', 'about');
		Handle::set_style_tempalte('page-templates/rules-page.php', 'rules');
		Handle::set_style_tempalte('page-templates/prize-page.php', 'prize');

		Handle::set_style_tempalte([
			'page-templates/home-page.php',
			'page-templates/register.php',
			'page-templates/new-page.php',
		], 'slick');

		// Thêm Script cho template
		Handle::set_script_template([
			'page-templates/home-page.php',
			'page-templates/register.php',
			'page-templates/new-page.php',
		], 'slick', ['jquery']);
	}


	function init()
	{
		new Template_function();
		new Fields();
		new Custom_Field();
		new Handle();
	}
}
