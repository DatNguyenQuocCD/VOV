<?php
/**
* Posts Settings.
*
* @package BoundlessNews
*/

$boundlessnews_default = boundlessnews_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Article Meta Settings', 'boundlessnews' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_post_date',
    array(
        'default' => $boundlessnews_default['ed_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_category',
    array(
        'default' => $boundlessnews_default['ed_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_tags',
    array(
        'default' => $boundlessnews_default['ed_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_views',
    array(
        'default' => $boundlessnews_default['ed_post_views'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_views',
    array(
        'label' => esc_html__('Enable Posts Views', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);


// Enable Disable Post.
$wp_customize->add_setting('post_date_format',
    array(
        'default' => $boundlessnews_default['post_date_format'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_select',
    )
);
$wp_customize->add_control('post_date_format',
    array(
        'label' => esc_html__('Posted Date Format', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'select',
        'choices'               => array(
            'default' => esc_html__( 'Apply Default Format', 'boundlessnews' ),
            'time-ago' => esc_html__( 'Apply Time Age Format', 'boundlessnews' ),
            ),
        )
);

// Enable Disable Post.
$wp_customize->add_setting('post_video_aspect_ration',
    array(
        'default' => $boundlessnews_default['post_video_aspect_ration'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_select',
    )
);
$wp_customize->add_control('post_video_aspect_ration',
    array(
        'label' => esc_html__('Global Video Aspect Ratio', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'select',
        'choices'               => array(
            'default' => esc_html__( 'Default', 'boundlessnews' ),
            'square' => esc_html__( 'Square', 'boundlessnews' ),
            'portrait' => esc_html__( 'Portrait', 'boundlessnews' ),
            'landscape' => esc_html__( 'Landscape', 'boundlessnews' ),
            ),
        )
);


$wp_customize->add_setting('ed_autoplay',
    array(
        'default' => $boundlessnews_default['ed_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_select',
    )
);
$wp_customize->add_control('ed_autoplay',
    array(
        'label' => esc_html__('Global Video Autoplay', 'boundlessnews'),
        'section' => 'posts_settings',
        'type' => 'select',
        'choices'               => array(
            'autoplay-enable' => esc_html__( 'Autoplay Enable', 'boundlessnews' ),
            'autoplay-disable' => esc_html__( 'Autoplay Disable', 'boundlessnews' ),
            ),
        )
);