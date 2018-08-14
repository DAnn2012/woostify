<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Woostify
 * @author      Woostify
 * @copyright   Copyright (c) 2018, Woostify
 * @since       Astra 1.0.0
 */


/**
 * Footer section
 */
$wp_customize->add_section(
    'woostify_footer', array(
        'title'                 => __( 'Footer', 'woostify' ),
        'priority'              => 28,
        'description'           => __( 'Customize the look & feel of your website footer.', 'woostify' ),
    )
);

/**
 * Blog section
 */
$wp_customize->add_section(
    'woostify_blog', array(
        'title'                 => __( 'Blog', 'woostify' ),
        'priority'              => 30,
        'description'           => __( 'Customize the look & feel of your blog page', 'woostify' ),
    )
);

/**
 * Shop section
 */
$wp_customize->add_section(
    'woostify_shop', array(
        'title'                 => __( 'Shop', 'woostify' ),
        'priority'              => 35,
        'description'           => __( 'Customize the look & feel of your shop page', 'woostify' ),
    )
);
        
/**
 * Add the typography section
 */
$wp_customize->add_section(
    'woostify_color', array(
        'title'                 => __( 'Color', 'woostify' ),
        'priority'              => 40,
    )
);

/**
 * Buttons section
 */
$wp_customize->add_section(
    'woostify_buttons', array(
        'title'                 => __( 'Buttons', 'woostify' ),
        'priority'              => 45,
        'description'           => __( 'Customize the look & feel of your website buttons.', 'woostify' ),
    )
);