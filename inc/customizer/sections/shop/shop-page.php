<?php
/**
 * Woocommerce shop single customizer
 *
 * @package woostify
 */

// Default values.
$defaults = woostify_options();

// Shop columns.
$wp_customize->add_setting(
	'woostify_setting[shop_columns]',
	array(
		'default'           => $defaults['shop_columns'],
		'sanitize_callback' => 'woostify_sanitize_choices',
		'type'              => 'option',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_columns]',
		array(
			'label'    => __( 'Product Columns', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'type'     => 'select',
			'settings' => 'woostify_setting[shop_columns]',
			'choices'     => apply_filters(
				'woostify_setting_shop_columns',
				array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
				)
			),
		)
	)
);

// Product per page.
$wp_customize->add_setting(
	'woostify_setting[shop_product_per_page]',
	array(
		'default'           => $defaults['shop_product_per_page'],
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'option',
	)
);

$wp_customize->add_control(
	new Woostify_Range_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_product_per_page]',
		array(
			'type'     => 'woostify-range-slider',
			'label'    => __( 'Product Per Page', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'settings' => array(
				'desktop' => 'woostify_setting[shop_product_per_page]',
			),
			'choices' => array(
				'desktop' => array(
					'min'  => apply_filters( 'woostify_shop_product_per_page_min_step', 3 ),
					'max'  => apply_filters( 'woostify_shop_product_per_page_max_step', 60 ),
					'step' => 1,
					'edit' => true,
					'unit' => '',
				),
			),
		)
	)
);

// Product meta title.
$wp_customize->add_setting( 'shop_page_product_meta_title' );
$wp_customize->add_control(
	new Woostify_Divider_Control(
		$wp_customize,
		'shop_page_product_meta_title',
		array(
			'section'  => 'woostify_shop_page',
			'settings' => 'shop_page_product_meta_title',
			'type'     => 'heading',
			'label'    => __( 'Product Meta', 'woostify' ),
		)
	)
);

// Product title.
$wp_customize->add_setting(
	'woostify_setting[shop_page_product_title]',
	array(
		'type'      => 'option',
		'default'   => true,
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_page_product_title]',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Product Title', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'settings' => 'woostify_setting[shop_page_product_title]',
		)
	)
);

// Product category.
$wp_customize->add_setting(
	'woostify_setting[shop_page_product_category]',
	array(
		'type'      => 'option',
		'default'   => false,
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_page_product_category]',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Product Category', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'settings' => 'woostify_setting[shop_page_product_category]',
		)
	)
);

// Product rating.
$wp_customize->add_setting(
	'woostify_setting[shop_page_product_rating]',
	array(
		'type'      => 'option',
		'default'   => true,
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_page_product_rating]',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Product Rating', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'settings' => 'woostify_setting[shop_page_product_rating]',
		)
	)
);

// Product add to cart button.
$wp_customize->add_setting(
	'woostify_setting[shop_page_product_add_to_cart_button]',
	array(
		'type'      => 'option',
		'default'   => true,
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_page_product_add_to_cart_button]',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Product Add To Cart Button', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'settings' => 'woostify_setting[shop_page_product_add_to_cart_button]',
		)
	)
);

// Product price.
$wp_customize->add_setting(
	'woostify_setting[shop_page_product_price]',
	array(
		'type'      => 'option',
		'default'   => true,
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'woostify_setting[shop_page_product_price]',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Product Price', 'woostify' ),
			'section'  => 'woostify_shop_page',
			'settings' => 'woostify_setting[shop_page_product_price]',
		)
	)
);
