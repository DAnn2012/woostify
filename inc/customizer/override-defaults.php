<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package     Woostify
 */

// Move background color setting alongside background image.
$wp_customize->get_control( 'background_color' )->section  = 'background_image';

// Change background image section title & priority.
$wp_customize->get_section( 'background_image' )->panel    = 'woostify_layout';
$wp_customize->get_section( 'background_image' )->title    = __( 'Site Container', 'woostify' );
$wp_customize->get_section( 'background_image' )->priority = 10;

// Remove description on Site Icon.
$wp_customize->get_control( 'site_icon' )->description     = '';

// Selective refresh.
if ( function_exists( 'add_partial' ) ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'custom_logo',
		array(
			'selector'        => '.site-branding',
			'render_callback' => array( $this, 'woostify_get_site_logo' ),
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title.beta a',
			'render_callback' => array( $this, 'woostify_get_site_name' ),
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => array( $this, 'woostify_get_site_description' ),
		)
	);
}
