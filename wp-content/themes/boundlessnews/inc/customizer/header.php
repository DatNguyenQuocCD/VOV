<?php
/**
* Header Options.
*
* @package BoundlessNews
*/

$boundlessnews_default = boundlessnews_get_default_theme_options();
$boundlessnews_page_lists = boundlessnews_page_lists();
$boundlessnews_post_category_list = boundlessnews_post_category_list();

// Header Advertise Area Section.
$wp_customize->add_section( 'main_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'boundlessnews' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
	)
);

// Enable Disable Search.
$wp_customize->add_setting('ed_header_search',
    array(
        'default' => $boundlessnews_default['ed_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search',
    array(
        'label' => esc_html__('Enable Search', 'boundlessnews'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_ad',
    array(
        'default' => $boundlessnews_default['ed_header_ad'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_ad',
    array(
        'label' => esc_html__('Enable Top Advertisement Area', 'boundlessnews'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('header_ad_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'header_ad_image',
        array(
            'label'      => esc_html__( 'Top Header AD Image', 'boundlessnews' ),
            'section'    => 'main_header_setting',
            'active_callback' => 'boundlessnews_header_ad_ac',
        )
    )
);

$wp_customize->add_setting('ed_header_link',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('ed_header_link',
    array(
        'label' => esc_html__('AD Image Link', 'boundlessnews'),
        'section' => 'main_header_setting',
        'type' => 'text',
        'active_callback' => 'boundlessnews_header_ad_ac',
    )
);

// Archive Layout.
$wp_customize->add_setting(
    'boundlessnews_header_bg_size',
    array(
        'default'           => $boundlessnews_default['boundlessnews_header_bg_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control('boundlessnews_header_bg_size',
        array(
            'type'       => 'select',
            'section'       => 'header_image',
            'label'         => esc_html__( 'Header BG Size', 'boundlessnews' ),
            'choices'       => array(
                '1'  => esc_html__( 'Small', 'boundlessnews' ),
                '2'  => esc_html__( 'Medium', 'boundlessnews' ),
                '3'  => esc_html__( 'Large', 'boundlessnews' ),
            )
        )
);

$wp_customize->add_setting('ed_header_bg_fixed',
    array(
        'default' => $boundlessnews_default['ed_header_bg_fixed'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_bg_fixed',
    array(
        'label' => esc_html__('Enable Fixed BG', 'boundlessnews'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_bg_overlay',
    array(
        'default' => $boundlessnews_default['ed_header_bg_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_bg_overlay',
    array(
        'label' => esc_html__('Enable BG Overlay', 'boundlessnews'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'boundlessnews_tags_search',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new BoundlessNews_Separator(
        $wp_customize,
        'boundlessnews_tags_search',
        array(
            'settings'      => 'boundlessnews_tags_search',
            'section'       => 'main_header_setting',
            'label'         => esc_html__( 'Popup Search Settings', 'boundlessnews' ),
        )
    )
);

$wp_customize->add_setting('ed_header_search_recent_posts',
    array(
        'default' => $boundlessnews_default['ed_header_search_recent_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search_recent_posts',
    array(
        'label' => esc_html__('Enable Recent Posts on Search Area', 'boundlessnews'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);
$wp_customize->add_setting( 'recent_post_title_search',
    array(
    'default'           => $boundlessnews_default['recent_post_title_search'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'recent_post_title_search',
    array(
    'label'    => esc_html__( 'Related Posts Section Title', 'boundlessnews' ),
    'section'  => 'main_header_setting',
    'type'     => 'text',
    )
);
$wp_customize->add_setting('ed_header_search_top_category',
    array(
        'default' => $boundlessnews_default['ed_header_search_top_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search_top_category',
    array(
        'label' => esc_html__('Enable Top Category on Search Area', 'boundlessnews'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);
$wp_customize->add_setting( 'top_category_title_search',
    array(
    'default'           => $boundlessnews_default['top_category_title_search'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'top_category_title_search',
    array(
    'label'    => esc_html__( 'Top Category Section Title', 'boundlessnews' ),
    'section'  => 'main_header_setting',
    'type'     => 'text',
    )
);

// Ticker Section
$wp_customize->add_section( 'header_ticker_section',
    array(
    'title'      => esc_html__( 'Breaking News Ticker', 'boundlessnews' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('ed_header_ticker_posts',
    array(
        'default' => $boundlessnews_default['ed_header_ticker_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_ticker_posts',
    array(
        'label' => esc_html__('Enable Ticker Posts', 'boundlessnews'),
        'section' => 'header_ticker_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ed_header_ticker_posts_title',
    array(
    'default'           => $boundlessnews_default['ed_header_ticker_posts_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ed_header_ticker_posts_title',
    array(
    'label'       => esc_html__( 'Ticker Section Title', 'boundlessnews' ),
    'section'     => 'header_ticker_section',
    'type'        => 'text',
    )
);


$wp_customize->add_setting( 'boundlessnews_header_ticker_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'boundlessnews_sanitize_select',
    )
);
$wp_customize->add_control( 'boundlessnews_header_ticker_cat',
    array(
    'label'       => esc_html__( 'Ticker Posts Category', 'boundlessnews' ),
    'section'     => 'header_ticker_section',
    'type'        => 'select',
    'choices'     => $boundlessnews_post_category_list,
    )
);

$wp_customize->add_setting('ed_ticker_slider_autoplay',
    array(
        'default' => $boundlessnews_default['ed_ticker_slider_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_ticker_slider_autoplay',
    array(
        'label' => esc_html__('Enable Ticker Posts Autoplay', 'boundlessnews'),
        'section' => 'header_ticker_section',
        'type' => 'checkbox',
    )
);

// Trending Tags Section
$wp_customize->add_section( 'header_tags_section',
    array(
    'title'      => esc_html__( 'Trending Tags Settings', 'boundlessnews' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);
$wp_customize->add_setting('ed_header_tags',
    array(
        'default' => $boundlessnews_default['ed_header_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_tags',
    array(
        'label' => esc_html__('Enable Tags', 'boundlessnews'),
        'section' => 'header_tags_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_tags_title',
    array(
        'default' => $boundlessnews_default['ed_header_tags_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('ed_header_tags_title',
    array(
        'label' => esc_html__('Tags Title', 'boundlessnews'),
        'section' => 'header_tags_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('ed_header_tags_count',
    array(
        'default' => $boundlessnews_default['ed_header_tags_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('ed_header_tags_count',
    array(
        'label' => esc_html__('Tags To Show', 'boundlessnews'),
        'section' => 'header_tags_section',
        'type' => 'number',
    )
);

// Trending News Section
$wp_customize->add_section( 'header_news_section',
    array(
    'title'      => esc_html__( 'Trending News Settings', 'boundlessnews' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('ed_header_trending_news',
    array(
        'default' => $boundlessnews_default['ed_header_trending_news'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'boundlessnews_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_trending_news',
    array(
        'label' => esc_html__('Enable Trending News', 'boundlessnews'),
        'section' => 'header_news_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ed_header_trending_posts_title',
    array(
    'default'           => $boundlessnews_default['ed_header_trending_posts_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ed_header_trending_posts_title',
    array(
    'label'       => esc_html__( 'Trending News Title', 'boundlessnews' ),
    'section'     => 'header_news_section',
    'type'        => 'text',
    )
);


$wp_customize->add_setting( 'boundlessnews_header_trending_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'boundlessnews_sanitize_select',
    )
);
$wp_customize->add_control( 'boundlessnews_header_trending_cat',
    array(
    'label'       => esc_html__( 'Trending News Posts Category', 'boundlessnews' ),
    'section'     => 'header_news_section',
    'type'        => 'select',
    'choices'     => $boundlessnews_post_category_list,
    )
);