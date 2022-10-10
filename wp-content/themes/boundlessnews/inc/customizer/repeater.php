<?php
/**
* Sections Repeater Options.
*
* @package BoundlessNews
*/

$boundlessnews_post_category_list = boundlessnews_post_category_list();
$boundlessnews_defaults = boundlessnews_get_default_theme_options();
$home_sections = array(
        
        'banner-blocks-1' => esc_html__('Slider & Tab Block','boundlessnews'),
        'main-banner' => esc_html__('Slider & Vertical Slider','boundlessnews'),
        'latest-posts-blocks' => esc_html__('Latest Posts Block','boundlessnews'),
        'slider-blocks-1' => esc_html__('Slider Block Style 1','boundlessnews'),
        'slider-blocks-2' => esc_html__('Slider Block Style 2','boundlessnews'),
        'tiles-blocks' => esc_html__('Tiles Block','boundlessnews'),
        'advertise-blocks' => esc_html__('Advertise Block','boundlessnews'),
        'carousel-blocks' => esc_html__('Carousel Block','boundlessnews'),
        'home-widget-area' => esc_html__('Widgets Area Block','boundlessnews'),

    );

$boundlessnews_video_aspect_ratio = boundlessnews_video_aspect_ratio();
$boundlessnews_video_autoplay = boundlessnews_video_autoplay();

// Slider Section.
$wp_customize->add_section( 'home_sections_repeater',
	array(
	'title'      => esc_html__( 'Homepage Sections', 'boundlessnews' ),
	'priority'   => 150,
	'capability' => 'edit_theme_options',
	)
);


// Recommended Posts Enable Disable.
$wp_customize->add_setting( 'twp_boundlessnews_home_sections_1', array(
    'sanitize_callback' => 'boundlessnews_sanitize_repeater',
    'default' => json_encode( $boundlessnews_defaults['twp_boundlessnews_home_sections_1'] ),
    // 'transport'           => 'postMessage',
));

$wp_customize->add_control(  new BoundlessNews_Repeater_Controler( $wp_customize, 'twp_boundlessnews_home_sections_1',
    array(
        'section' => 'home_sections_repeater',
        'settings' => 'twp_boundlessnews_home_sections_1',
        'boundlessnews_box_label' => esc_html__('New Section','boundlessnews'),
        'boundlessnews_box_add_control' => esc_html__('Add New Section','boundlessnews'),
        'boundlessnews_box_add_button' => false,
    ),
        array(
            'section_ed' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Section', 'boundlessnews' ),
                'class'       => 'home-section-ed'
            ),
            'home_section_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Section Type', 'boundlessnews' ),
                'options'     => $home_sections,
                'class'       => 'home-section-type'
            ),
            'home_section_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields tiles-blocks-fields'
            ),
            'section_slide_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Post Category', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs'
            ),
            'section_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields carousel-blocks-fields slider-blocks-1-fields slider-blocks-2-fields'
            ),
             'tiles_post_per_page' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Posts Per Page', 'boundlessnews' ),
                'options'     => array( 
                    '5' => 5,
                    '10' => 10,
                ),
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields'
            ),
             'home_section_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Slider Area Title', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'section_post_slide_cat' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Post Category', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            
            'advertise_image' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Advertise Image', 'boundlessnews' ),
                'description' => esc_html__( 'Recommended Image Size is 970x250 PX.', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs advertise-blocks-fields'
            ),
            'advertise_link' => array(
                'type'        => 'link',
                'label'       => esc_html__( 'Advertise Image Link', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs advertise-blocks-fields'
            ),
            'ed_arrows_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Arrows', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields banner-blocks-1-fields main-banner-fields'
            ),
            'ed_dots_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Dot', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields banner-blocks-1-fields main-banner-fields'
            ),
            'ed_autoplay_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Autoplay', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs carousel-blocks-fields slider-blocks-1-fields slider-blocks-2-fields banner-blocks-1-fields main-banner-fields'
            ),
            'home_section_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Tab Area Title', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'home_section_title_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Vertical Slide Title', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs main-banner-fields'
            ),
            'ed_tab' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Tab', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs ed-tabs-ac banner-blocks-1-fields'
            ),
            'cat_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title One', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category One', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'cat_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title Two', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Two', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'cat_title_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title Three', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Three', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'section_category_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Four', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'section_vertical_slide_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Vertical Slider Post Category', 'boundlessnews' ),
                'options'     => $boundlessnews_post_category_list,
                'class'       => 'home-repeater-fields-hs main-banner-fields'
            ),
            'section_video_ratio' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Video Aspect Ratio', 'boundlessnews' ),
                'options'     => $boundlessnews_video_aspect_ratio,
                'class'       => 'home-repeater-fields-hs latest-posts-blocks-fields'
            ),
            'section_video_autoplay' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Video Autoplay', 'boundlessnews' ),
                'options'     => $boundlessnews_video_autoplay,
                'class'       => 'home-repeater-fields-hs latest-posts-blocks-fields'
            ),
            'ed_flip_column' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Flip Column Right to Left', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'background_color' => array(
                'type'        => 'colorpicker',
                'label'       => esc_html__( 'Background Color', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields slider-blocks-1-fields slider-blocks-2-fields'
            ),
            'text_color' => array(
                'type'        => 'colorpicker',
                'label'       => esc_html__( 'Text Color', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields slider-blocks-1-fields slider-blocks-2-fields'
            ),
            'background_image' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Background Image', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'bg_image_size' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Background Image Size', 'boundlessnews' ),
                'options'     => array( 
                    'auto' => esc_html('Original','boundlessnews'),
                    'contain' => esc_html('Fit to Screen','boundlessnews'),
                    'cover' => esc_html('Fill Screen','boundlessnews'),
                ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'background_image_repeat' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Repeat Background Image', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'background_image_scroll' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Scroll with Page', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'enable_sidebar' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Sidebar', 'boundlessnews' ),
                'description'       => esc_html__( 'Please add widget into "Homepage Sidebar Widget Area" for sidebar content.', 'boundlessnews' ),
                'class'       => 'home-repeater-fields-hs home-widget-area-fields'
            ),
    )
));

// Info.
$wp_customize->add_setting(
    'boundlessnews_notiece_info',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new BoundlessNews_Info_Notiece_Control( 
        $wp_customize,
        'boundlessnews_notiece_info',
        array(
            'settings' => 'boundlessnews_notiece_info',
            'section'       => 'home_sections_repeater',
            'label'         => esc_html__( 'Info', 'boundlessnews' ),
        )
    )
);

$wp_customize->add_setting(
    'boundlessnews_premium_notiece',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new BoundlessNews_Premium_Notiece_Control( 
        $wp_customize,
        'boundlessnews_premium_notiece',
        array(
            'label'      => esc_html__( 'Home Page Blocks', 'boundlessnews' ),
            'settings' => 'boundlessnews_premium_notiece',
            'section'       => 'home_sections_repeater',
        )
    )
);