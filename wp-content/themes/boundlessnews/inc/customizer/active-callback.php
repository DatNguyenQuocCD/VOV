<?php
/**
 * BoundlessNews Customizer Active Callback Functions
 *
 * @package BoundlessNews
 */

function boundlessnews_header_archive_layout_ac( $control ){

    $boundlessnews_archive_layout = $control->manager->get_setting( 'boundlessnews_archive_layout' )->value();
    if( $boundlessnews_archive_layout == 'default' ){

        return true;
        
    }
    
    return false;
}

function boundlessnews_overlay_layout_ac( $control ){

    $boundlessnews_single_post_layout = $control->manager->get_setting( 'boundlessnews_single_post_layout' )->value();
    if( $boundlessnews_single_post_layout == 'layout-2' ){

        return true;
        
    }
    
    return false;
}

function boundlessnews_header_ad_ac( $control ){

    $ed_header_ad = $control->manager->get_setting( 'ed_header_ad' )->value();
    if( $ed_header_ad ){

        return true;
        
    }
    
    return false;
}