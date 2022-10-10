<?php
/**
 * Pagination Settings
 *
 * @package BoundlessNews
 */

$boundlessnews_default = boundlessnews_get_default_theme_options();

// Pagination Section.
$wp_customize->add_section( 'boundlessnews_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'boundlessnews' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'boundlessnews_pagination_layout',
	array(
	'default'           => $boundlessnews_default['boundlessnews_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'boundlessnews_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'boundlessnews' ),
	'section'     => 'boundlessnews_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','boundlessnews'),
		'numeric' => esc_html__('Numeric Method','boundlessnews'),
		'load-more' => esc_html__('Ajax Load More Button','boundlessnews'),
		'auto-load' => esc_html__('Ajax Auto Load','boundlessnews'),
	),
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'boundlessnews_breadcrumb_section',
	array(
	'title'      => esc_html__( 'Breadcrumb Settings', 'boundlessnews' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);


$wp_customize->add_setting('ed_breadcrumb',
    array(
        'default' => $boundlessnews_default['ed_breadcrumb'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_breadcrumb',
    array(
        'label' => esc_html__('Enable Breadcrumb', 'boundlessnews'),
        'section' => 'boundlessnews_breadcrumb_section',
        'type' => 'checkbox',
    )
);
