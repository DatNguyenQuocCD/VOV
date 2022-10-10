<?php
/**
 *
 * Front Page
 *
 * @package BoundlessNews
 */

get_header();


    $boundlessnews_default = boundlessnews_get_default_theme_options();
    $twp_boundlessnews_home_sections_1 = get_theme_mod( 'twp_boundlessnews_home_sections_1', json_encode( $boundlessnews_default['twp_boundlessnews_home_sections_1'] ) );
    $paged_active = false;

    if ( !is_paged() ) {
        $paged_active = true;
    }

    $twp_boundlessnews_home_sections_1 = json_decode( $twp_boundlessnews_home_sections_1 );
    $repeat_times = 1;

    foreach ( $twp_boundlessnews_home_sections_1 as $boundlessnews_home_section ) {

        $home_section_type = isset( $boundlessnews_home_section->home_section_type ) ? $boundlessnews_home_section->home_section_type : '';

        switch ($home_section_type) {

            case 'main-banner':

                $ed_slider_blocks = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                    boundlessnews_main_banner( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'slider-blocks-1':

                $ed_slider_blocks = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                    boundlessnews_slider_blocks( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'slider-blocks-2':

                $ed_slider_blocks = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                    boundlessnews_slider_blocks_style_2( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'latest-posts-blocks':

                $ed_latest_posts_blocks = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_latest_posts_blocks == 'yes' ) {
                    boundlessnews_latest_blocks( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'carousel-blocks':

                $ed_carousel_blocks = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_carousel_blocks == 'yes' && $paged_active ) {
                    boundlessnews_carousel_posts( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'tiles-blocks':

                $ed_tiles_block = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_tiles_block == 'yes' && $paged_active ) {
                    boundlessnews_tiles_block_section( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'banner-blocks-1':

                $ed_banner_blocks_1 = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_banner_blocks_1 == 'yes' && $paged_active ) {
                    boundlessnews_banner_block_1_section( $boundlessnews_home_section, $repeat_times );
                }

            break;

            case 'advertise-blocks':

                $ed_advertise_blocks = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_advertise_blocks == 'yes' && $paged_active ) {
                    boundlessnews_advertise_block( $boundlessnews_home_section, $repeat_times );
                }
                
            break;

            case 'home-widget-area':

                $ed_home_widget_area = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
                if ( $ed_home_widget_area == 'yes' && $paged_active ) {
                    boundlessnews_case_home_widget_area_block( $boundlessnews_home_section, $repeat_times );
                }
                
            break;

            default:

            break;

        }

        $repeat_times++;
    }

get_footer();
