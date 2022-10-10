<?php
/**
 * Default Values.
 *
 * @package BoundlessNews
 */

if (!function_exists('boundlessnews_get_default_theme_options')) :

    /**
     * Get default theme options
     *
     * @return array Default theme options.
     * @since 1.0.0
     *
     */
    function boundlessnews_get_default_theme_options(){

        $boundlessnews_defaults = array();

        $boundlessnews_defaults['twp_boundlessnews_home_sections_1'] = array(

            array(
                'home_section_type' => 'banner-blocks-1',
                'section_ed' => 'yes',
                'section_category_1' => '',
                'section_category_2' => '',
                'section_category_3' => '',
                'ed_flip_column' => 'no',
                'ed_tab' => 'no',
                'bg_image_size' => 'auto',
                'background_image_repeat' => 'yes',
                'background_image_scroll' => 'yes',
                'ed_arrows_carousel' => 'yes',
                'ed_dots_carousel' => 'no',
                'ed_autoplay_carousel' => 'yes',
                'home_section_title_1' => esc_html__('Block Title One','boundlessnews'),
                'home_section_title_2' => esc_html__('Block Title Tab','boundlessnews'),
                'background_color' => '#f8f8f8',
                'text_color' => '#222'
            ),
            array(
                'home_section_type' => 'tiles-blocks',
                'section_ed' => 'no',
                'section_category' => '',
                'tiles_post_per_page' => 5,
            ),
            array(
                'home_section_type' => 'main-banner',
                'section_ed' => 'no',
                'home_section_title' => '',
                'bg_image_size' => 'auto',
                'background_image_repeat' => 'yes',
                'background_image_scroll' => 'yes',
                'ed_arrows_carousel' => 'yes',
                'ed_dots_carousel' => 'no',
                'ed_autoplay_carousel' => 'yes',
                'background_color' => '#f8f8f8',
                'text_color' => '#222'
            ),
            array(
                'home_section_type' => 'latest-posts-blocks',
                'section_ed' => 'yes',
                'section_video_ratio' => 'default',
                'section_video_autoplay' => 'autoplay-disable',
            ),
            array(
                'home_section_type' => 'slider-blocks-1',
                'section_ed' => 'no',
                'ed_autoplay_carousel' => 'yes',
                'background_color' => '#f8f8f8',
                'text_color' => '#222'
            ),
            array(
                'home_section_type' => 'slider-blocks-2',
                'section_ed' => 'no',
                'ed_autoplay_carousel' => 'yes',
                'background_color' => '#161617',
                'text_color' => '#fff'
            ),
            array(
                'home_section_type' => 'advertise-blocks',
                'section_ed' => 'no',
                'advertise_image' => '',
                'advertise_link' => '',
            ),
            array(
                'home_section_type' => 'carousel-blocks',
                'section_ed' => 'no',
                'ed_arrows_carousel' => 'yes',
                'ed_dots_carousel' => 'no',
                'ed_autoplay_carousel' => 'yes',
                'home_section_title' => esc_html__('Block Title','boundlessnews'),
            ),
            array(
                'home_section_type' => 'home-widget-area',
                'section_ed' => 'yes',
                'sidebar_ed' => 'no',
            ),
        );

        // Options.
        $boundlessnews_defaults['global_sidebar_layout'] = 'right-sidebar';
        $boundlessnews_defaults['boundlessnews_archive_layout'] = 'full';
        $boundlessnews_defaults['boundlessnews_pagination_layout'] = 'numeric';
        $boundlessnews_defaults['ed_breadcrumb'] = 1;
        $boundlessnews_defaults['footer_column_layout'] = 3;
        $boundlessnews_defaults['ed_social_on_footer'] = 1;
        $boundlessnews_defaults['footer_copyright_text'] = esc_html__('All rights reserved.', 'boundlessnews');
        $boundlessnews_defaults['ed_header_search'] = 1;
        $boundlessnews_defaults['ed_ticker_slider_autoplay'] = 0;
        $boundlessnews_defaults['ed_header_trending_news'] = 0;
        $boundlessnews_defaults['ed_header_trending_posts_title'] = esc_html__('Trending News', 'boundlessnews');
        $boundlessnews_defaults['ed_header_ad'] = 0;
        $boundlessnews_defaults['ed_header_ticker_posts'] = 1;
        $boundlessnews_defaults['ed_header_ticker_posts_title'] = esc_html__('Breaking News', 'boundlessnews');
        $boundlessnews_defaults['ed_image_content_inverse'] = 0;
        $boundlessnews_defaults['ed_related_post'] = 1;
        $boundlessnews_defaults['related_post_title'] = esc_html__('More Stories', 'boundlessnews');
        $boundlessnews_defaults['twp_navigation_type'] = 'norma-navigation';
        $boundlessnews_defaults['boundlessnews_single_post_layout'] = 'layout-1';
        $boundlessnews_defaults['ed_post_date'] = 1;
        $boundlessnews_defaults['ed_post_category'] = 1;
        $boundlessnews_defaults['ed_header_tags'] = 1;
        $boundlessnews_defaults['ed_post_tags'] = 1;
        $boundlessnews_defaults['ed_header_tags_title'] = esc_html__('Trending Tags', 'boundlessnews');
        $boundlessnews_defaults['ed_header_tags_count'] = 10;
        $boundlessnews_defaults['ed_header_overlay'] = 0;
        $boundlessnews_defaults['ed_floating_next_previous_nav'] = 1;
        $boundlessnews_defaults['boundlessnews_header_bg_size'] = 1;
        $boundlessnews_defaults['ed_preloader'] = 1;
        $boundlessnews_defaults['ed_header_bg_fixed'] = 0;
        $boundlessnews_defaults['ed_header_bg_overlay'] = 1;
        $boundlessnews_defaults['post_date_format'] = 'default';
        $boundlessnews_defaults['ed_fullwidth_layout'] = 'default';
        $boundlessnews_defaults['ed_post_views'] = 0;
        $boundlessnews_defaults['ed_scroll_top_button'] = 1;

        $boundlessnews_defaults['ed_header_search_recent_posts']             = 1;
        $boundlessnews_defaults['ed_header_search_top_category']             = 1;
        $boundlessnews_defaults['recent_post_title_search']                 = esc_html__('Recent Post','boundlessnews');
        $boundlessnews_defaults['top_category_title_search']                 = esc_html__('Top Category','boundlessnews');

        $boundlessnews_defaults['ed_top_header']             = 1;
        $boundlessnews_defaults['ed_header_affix_bar'] = 1;
        $boundlessnews_defaults['ed_social_on_affixbar'] = 1;

        $boundlessnews_defaults['ed_top_header_date']             = 1;
        $boundlessnews_defaults['ed_social_on_topbar']             = 1;

        $boundlessnews_defaults['ed_autoplay']             = 'autoplay-disable';
        $boundlessnews_defaults['post_video_aspect_ration']             = 'default';

        // Pass through filter.
        $boundlessnews_defaults = apply_filters('boundlessnews_filter_default_theme_options', $boundlessnews_defaults);

        return $boundlessnews_defaults;

    }

endif;
