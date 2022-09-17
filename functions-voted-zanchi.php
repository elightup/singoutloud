<?php
function register_post_type_voted_zanchi() {
	$labels = [
		'name'          => 'Bình chọn',
		'singular_name' => 'Bình chọn',
	];
	$args   = [
		'labels'      => $labels,
		'supports'    => [ 'title', 'thumbnail', 'editor' ],
		'public'      => true,
		'has_archive' => true,
		'menu_icon'   => 'dashicons-admin-users',
	];
	register_post_type( 'vote_sing_out_loud', $args );

	$labels2 = [
		'name'          => __( 'Cuộc thi', 'elu-shop' ),
		'singular_name' => __( 'Cuộc thi', 'elu-shop' ),
	];
	$args2   = [
		'labels'            => $labels2,
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
	];
	register_taxonomy( 'kind-zanchi', 'vote_sing_out_loud', $args2 );
}
add_action( 'init', 'register_post_type_voted_zanchi' );

// add shortcode
add_filter( 'widget_text', 'do_shortcode' );


