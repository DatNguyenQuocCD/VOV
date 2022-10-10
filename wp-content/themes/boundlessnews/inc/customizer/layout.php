<?php
/**
* Layouts Settings.
*
* @package BoundlessNews
*/

$boundlessnews_default = boundlessnews_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Archive Settings', 'boundlessnews' ),
	'priority'   => 60,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'ed_fullwidth_layout',
    array(
    'default'           => $boundlessnews_default['ed_fullwidth_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'boundlessnews_sanitize_layout_option',
    )
);
$wp_customize->add_control( 'ed_fullwidth_layout',
    array(
    'label'       => esc_html__( 'Enable Wider Width Layout', 'boundlessnews' ),
    'section'     => 'layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'default' => esc_html__( 'Default Layout', 'boundlessnews' ),
        'boxed'  => esc_html__( 'Boxed Layout', 'boundlessnews' ),
        'widerwidth'    => esc_html__( 'Wider Width Layout', 'boundlessnews' ),
        ),
    )
);


$wp_customize->add_setting( 'global_sidebar_layout',
	array(
	'default'           => $boundlessnews_default['global_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boundlessnews_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'global_sidebar_layout',
	array(
	'label'       => esc_html__( 'Global Sidebar Layout', 'boundlessnews' ),
	'section'     => 'layout_setting',
	'type'        => 'select',
	'choices'     => array(
		'right-sidebar' => esc_html__( 'Right Sidebar', 'boundlessnews' ),
		'left-sidebar'  => esc_html__( 'Left Sidebar', 'boundlessnews' ),
		'no-sidebar'    => esc_html__( 'No Sidebar', 'boundlessnews' ),
	    ),
	)
);

// Archive Layout.
$wp_customize->add_setting(
    'boundlessnews_archive_layout',
    array(
        'default' 			=> $boundlessnews_default['boundlessnews_archive_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_archive_layout'
    )
);
$wp_customize->add_control(
    new BoundlessNews_Custom_Radio_Image_Control(
        $wp_customize,
        'boundlessnews_archive_layout',
        array(
            'settings'      => 'boundlessnews_archive_layout',
            'section'       => 'layout_setting',
            'label'         => esc_html__( 'Archive Layout', 'boundlessnews' ),
            'choices'       => array(
            	'default'  => get_template_directory_uri() . '/assets/images/Layout-style-1.png',
                'full'  => get_template_directory_uri() . '/assets/images/Layout-style-2.png',
                'grid'  => get_template_directory_uri() . '/assets/images/Layout-style-3.png',
                'masonry'  => get_template_directory_uri() . '/assets/images/Layout-style-4.png',
            )
        )
    )
);


$wp_customize->add_setting('ed_image_content_inverse',
    array(
        'default' => $boundlessnews_default['ed_image_content_inverse'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_image_content_inverse',
    array(
        'label' => esc_html__('Inverse Image with Content', 'boundlessnews'),
        'section' => 'layout_setting',
        'type' => 'checkbox',
        'active_callback' => 'boundlessnews_header_archive_layout_ac',
    )
);

