<?php
$wp_customize->add_section( 'singoutloud_header', [
	'title' => __( 'Header', 'singoutloud' ),
] );

$wp_customize->add_setting( 'singoutloud_logo_white' );
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'singoutloud_update_logo_white',
		[
			'label'    => __( 'Logo White', 'singoutloud' ),
			'section'  => 'singoutloud_header',
			'settings' => 'singoutloud_logo_white',
		]
	)
);

$wp_customize->add_setting( 'singoutloud_logo_black' );
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'singoutloud_update_logo_black',
		[
			'label'    => __( 'Logo Black', 'singoutloud' ),
			'section'  => 'singoutloud_header',
			'settings' => 'singoutloud_logo_black',
		]
	)
);

$wp_customize->add_setting( 'singoutloud_custom_email' );
$wp_customize->add_control(
	'singoutloud_custom_email',
	[
		'label'    => __( 'Email', 'singoutloud' ),
		'section'  => 'singoutloud_header',
		'settings' => 'singoutloud_custom_email',
	]
);

$wp_customize->add_setting( 'singoutloud_custom_phone' );
$wp_customize->add_control(
	'singoutloud_custom_phone',
	[
		'label'    => __( 'Phone', 'singoutloud' ),
		'section'  => 'singoutloud_header',
		'settings' => 'singoutloud_custom_phone',
	]
);
