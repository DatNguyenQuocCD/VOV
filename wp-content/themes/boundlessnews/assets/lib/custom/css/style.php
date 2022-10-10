<?php
/**
 * BoundlessNews Dynamic Styles
 *
 * @package BoundlessNews
 */

function boundlessnews_dynamic_css()
{

    $boundlessnews_default = boundlessnews_get_default_theme_options();
    $twp_boundlessnews_home_sections_1 = get_theme_mod('twp_boundlessnews_home_sections_1', json_encode($boundlessnews_default['twp_boundlessnews_home_sections_1']));
    $twp_boundlessnews_home_sections_1 = json_decode($twp_boundlessnews_home_sections_1);


    echo "<style type='text/css' media='all'>"; ?>

    <?php

    $repeat_times = 1;

    foreach ($twp_boundlessnews_home_sections_1 as $boundlessnews_home_section) {

        $section_background_color = esc_url(isset($boundlessnews_home_section->background_color) ? $boundlessnews_home_section->background_color : '');
        $section_text_color = esc_url(isset($boundlessnews_home_section->text_color) ? $boundlessnews_home_section->text_color : '');

        if ($section_background_color) { ?>

            #theme-block-<?php echo $repeat_times; ?> {
            background-color: <?php echo esc_url($section_background_color); ?>;
            padding-bottom: 3rem;
            padding-top: 3rem;
            margin-bottom:0;
            }

            #theme-block-<?php echo $repeat_times; ?> .block-title-wrapper .block-title::after{
            border-left-color: <?php echo esc_url($section_background_color); ?>;
            }

            <?php
        }

        if ($section_text_color) { ?>

            #theme-block-<?php echo $repeat_times; ?>,
            #theme-block-<?php echo $repeat_times; ?> a{
                color: <?php echo esc_url($section_text_color); ?>;
            }

            <?php
        }

        $background_image = esc_url(isset($boundlessnews_home_section->background_image) ? $boundlessnews_home_section->background_image : '');

        if ($background_image) {

            $bg_image_size = isset($boundlessnews_home_section->bg_image_size) ? $boundlessnews_home_section->bg_image_size : 'auto';
            $background_image_repeat = isset($boundlessnews_home_section->background_image_repeat) ? $boundlessnews_home_section->background_image_repeat : 'yes';
            $background_image_scroll = isset($boundlessnews_home_section->background_image_scroll) ? $boundlessnews_home_section->background_image_scroll : 'yes';

            if ($background_image_repeat == 'yes' || $background_image_repeat == '') {
                $background_image_repeat = 'repeat';
            } else {
                $background_image_repeat = 'no-repeat';
            }

            if ($background_image_scroll == 'yes' || $background_image_scroll == '') {
                $background_image_scroll = 'scroll';
            } else {
                $background_image_scroll = 'fixed';
            } ?>

            #theme-block-<?php echo $repeat_times; ?> {
            background-image: url(<?php echo esc_url($background_image); ?> );
            background-size: <?php echo esc_attr($bg_image_size); ?>;
            background-repeat: <?php echo esc_attr($background_image_repeat); ?>;
            background-attachment: <?php echo esc_attr($background_image_scroll); ?>;
            }

            #theme-block-<?php echo $repeat_times; ?> .block-title-wrapper .block-title::after{
            border-left-color: transparent;
            }

            <?php
        }

        $repeat_times++;
    } ?>

    <?php echo "</style>";
}

add_action('wp_head', 'boundlessnews_dynamic_css', 100);