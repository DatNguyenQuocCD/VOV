<?php
/**
* Top Header Options.
*
* @package BoundlessNews
*/

$boundlessnews_default = boundlessnews_get_default_theme_options();

$wp_customize->add_section( 'top_header_setting',
	array(
	'title'      => esc_html__( 'Top Header Settings', 'boundlessnews' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_top_header',
    array(
        'default' => $boundlessnews_default['ed_top_header'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_top_header',
    array(
        'label' => esc_html__('Enable Top Header', 'boundlessnews'),
        'section' => 'top_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_top_header_date',
    array(
        'default' => $boundlessnews_default['ed_top_header_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_top_header_date',
    array(
        'label' => esc_html__('Enable Current Date', 'boundlessnews'),
        'section' => 'top_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_social_on_topbar',
    array(
        'default' => $boundlessnews_default['ed_social_on_topbar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_social_on_topbar',
    array(
        'label' => esc_html__('Enable Social Nav In Topbar', 'boundlessnews'),
        'section' => 'top_header_setting',
        'type' => 'checkbox',
    )
);
