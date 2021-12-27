<?php
/**
 * Mobile Menu
 *
 * @package woostify
 */

// Default values.
$defaults = woostify_options();

// Tabs.
$wp_customize->add_setting(
	'woostify_setting[mobile_menu_context_tabs]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Woostify_Tabs_Control(
		$wp_customize,
		'woostify_setting[mobile_menu_context_tabs]',
		array(
			'section'  => 'woostify_mobile_menu',
			'settings' => 'woostify_setting[mobile_menu_context_tabs]',
			'choices'  => array(
				'general' => __( 'General', 'woostify' ),
				'design'  => __( 'Design', 'woostify' ),
			),
		)
	)
);

// Show categories menu on mobile.
$wp_customize->add_setting(
	'woostify_setting[header_show_categories_menu_on_mobile]',
	array(
		'type'              => 'option',
		'default'           => $defaults['header_show_categories_menu_on_mobile'],
		'sanitize_callback' => 'woostify_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Woostify_Switch_Control(
		$wp_customize,
		'woostify_setting[header_show_categories_menu_on_mobile]',
		array(
			'label'    => __( 'Show Categories Menu on Mobile', 'woostify' ),
			'section'  => 'woostify_mobile_menu',
			'settings' => 'woostify_setting[header_show_categories_menu_on_mobile]',
			'tab'      => 'general',
		)
	)
);

// Primary menu tab title.
$wp_customize->add_setting(
	'woostify_setting[mobile_menu_primary_menu_tab_title]',
	array(
		'type'              => 'option',
		'default'           => $defaults['mobile_menu_primary_menu_tab_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	new Woostify_Customize_Control(
		$wp_customize,
		'woostify_setting[mobile_menu_primary_menu_tab_title]',
		array(
			'label'    => __( 'Primary Menu Tab Title', 'woostify' ),
			'section'  => 'woostify_mobile_menu',
			'settings' => 'woostify_setting[mobile_menu_primary_menu_tab_title]',
			'tab'      => 'general',
		)
	)
);

// Categories menu tab title.
$wp_customize->add_setting(
	'woostify_setting[mobile_menu_categories_menu_tab_title]',
	array(
		'type'              => 'option',
		'default'           => $defaults['mobile_menu_categories_menu_tab_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	new Woostify_Customize_Control(
		$wp_customize,
		'woostify_setting[mobile_menu_categories_menu_tab_title]',
		array(
			'label'    => __( 'Categories Menu Tab Title', 'woostify' ),
			'section'  => 'woostify_mobile_menu',
			'settings' => 'woostify_setting[mobile_menu_categories_menu_tab_title]',
			'tab'      => 'general',
		)
	)
);

// Design controls.

// Background.
$wp_customize->add_setting(
	'woostify_setting[mobile_menu_background]',
	array(
		'default'           => $defaults['mobile_menu_background'],
		'sanitize_callback' => 'woostify_sanitize_rgba_color',
		'type'              => 'option',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	new Woostify_Color_Group_Control(
		$wp_customize,
		'woostify_setting[mobile_menu_background]',
		array(
			'label'    => __( 'Background', 'woostify' ),
			'section'  => 'woostify_mobile_menu',
			'settings' => array(
				'woostify_setting[mobile_menu_background]',
			),
			'tab'      => 'design',
		)
	)
);

// Text color.
$wp_customize->add_setting(
	'woostify_setting[mobile_menu_text_color]',
	array(
		'default'           => $defaults['mobile_menu_text_color'],
		'sanitize_callback' => 'woostify_sanitize_rgba_color',
		'type'              => 'option',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_setting(
	'woostify_setting[mobile_menu_text_hover_color]',
	array(
		'default'           => $defaults['mobile_menu_text_hover_color'],
		'sanitize_callback' => 'woostify_sanitize_rgba_color',
		'type'              => 'option',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	new Woostify_Color_Group_Control(
		$wp_customize,
		'woostify_setting[mobile_menu_text_color]',
		array(
			'label'    => __( 'Text', 'woostify' ),
			'section'  => 'woostify_mobile_menu',
			'settings' => array(
				'woostify_setting[mobile_menu_text_color]',
				'woostify_setting[mobile_menu_text_hover_color]',
			),
			'tooltips' => array(
				'Normal',
				'Hover',
			),
			'tab'      => 'design',
		)
	)
);
