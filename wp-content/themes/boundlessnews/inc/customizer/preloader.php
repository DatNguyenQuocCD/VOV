<?php
/**
* Footer Settings.
*
* @package BoundlessNews
*/

$boundlessnews_default = boundlessnews_get_default_theme_options();


$wp_customize->add_section( 'preloader_section',
	array(
	'title'      => esc_html__( 'Preloader Setting', 'boundlessnews' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	'priority'   => 5,
	)
);

$wp_customize->add_setting('ed_preloader',
    array(
        'default' => $boundlessnews_default['ed_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_preloader',
    array(
        'label' => esc_html__('Enable Preloader', 'boundlessnews'),
        'section' => 'preloader_section',
        'type' => 'checkbox',
    )
);


$wp_customize->add_section( 'affixbar_section',
    array(
    'title'      => esc_html__( 'Affixbar Setting', 'boundlessnews' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    'priority'   => 5,
    )
);

$wp_customize->add_setting('ed_header_affix_bar',
    array(
        'default' => $boundlessnews_default['ed_header_affix_bar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_affix_bar',
    array(
        'label' => esc_html__('Enable Affix Bar', 'boundlessnews'),
        'section' => 'affixbar_section',
        'type' => 'checkbox',
    )
);



$wp_customize->add_setting('twp_affix_bar_logo',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'twp_affix_bar_logo',
        array(
            'label'      => esc_html__( 'Upload Affixbar Logo', 'boundlessnews' ),
            'section'    => 'affixbar_section',
        )
    )
);

$wp_customize->add_setting('ed_social_on_affixbar',
    array(
        'default' => $boundlessnews_default['ed_social_on_affixbar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_social_on_affixbar',
    array(
        'label' => esc_html__('Enable Social Nav in affixbar', 'boundlessnews'),
        'section' => 'affixbar_section',
        'type' => 'checkbox',
    )
);
