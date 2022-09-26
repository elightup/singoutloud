<?php
namespace Sol;

class Loader {
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
		add_action( 'widgets_init', [ $this, 'widgets_init' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	public function setup() {
		load_theme_textdomain( 'sol', get_template_directory() . '/languages' );

		register_nav_menus( [
			'header-guest' => esc_html__( 'Primary', 'sol' ),
			'header-user'  => esc_html__( 'Menu id login', 'sol' ),
		] );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'responsive-embeds' );
	}

	public function widgets_init() {
		register_sidebar(
			[
				'name'          => esc_html__( 'Header', 'sol' ),
				'id'            => 'header',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__( 'Footer - Ban tổ chức', 'sol' ),
				'id'            => 'footer',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__( 'Footer - Social Media', 'sol' ),
				'id'            => 'footer-social',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
	}

	public function enqueue_assets() {
		wp_enqueue_style( 'sol', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ) );

		// All pages: for login/logout popup.
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.min.css', [], '1.1.0' );
		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', [ 'jquery' ], '1.1.0', true );

		wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', [], '1.8.1' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', [ 'jquery' ], '1.8.1', true );

		Assets::js( 'script', [ 'jquery' ] );

		Assets::template_css( 'page-templates/contact-page.php', 'contact' );
		Assets::template_css( 'page-templates/about-page.php', 'about-page' );
		Assets::template_css( 'page-templates/home-page.php', 'home' );
		Assets::template_css( 'page-templates/new-page.php', 'news' );
		Assets::template_css( 'page-templates/rules-page.php', 'rules' );
		Assets::template_css( 'page-templates/prize-page.php', 'prize' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
