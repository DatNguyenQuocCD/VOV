<?php
/**
* Body Classes.
*
* @package BoundlessNews
*/
 
 if (!function_exists('boundlessnews_body_classes')) :

    function boundlessnews_body_classes($classes) {

        $boundlessnews_default = boundlessnews_get_default_theme_options();
        global $post;

        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }
        
        if ( is_active_sidebar( 'sidebar-1' ) ) {

            $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$boundlessnews_default['global_sidebar_layout'] ) );

            if( is_single() || is_page() ){

                $boundlessnews_post_sidebar = esc_html( get_post_meta( $post->ID, 'boundlessnews_post_sidebar_option', true ) );

                if( $boundlessnews_post_sidebar == 'global-sidebar' || empty( $boundlessnews_post_sidebar ) ){

                    if( class_exists('WooCommerce') && ( is_cart() || is_checkout() ) ){
                        
                        $classes[] = 'no-sidebar';

                    }else{

                        $classes[] = esc_attr( $global_sidebar_layout );

                    }

                }else{

                    if( class_exists('WooCommerce') && ( is_cart() || is_checkout() ) ){
                        
                        $classes[] = 'no-sidebar';

                    }else{

                        $classes[] = esc_attr( $boundlessnews_post_sidebar );

                    }
                }
                
            }elseif( is_404() ){

                $classes[] = 'no-sidebar';

            }else{
                
                $classes[] = esc_attr( $global_sidebar_layout );
            }

        }

        if( is_page() ){

            $boundlessnews_header_trending_page = get_theme_mod( 'boundlessnews_header_trending_page' );
            $boundlessnews_header_popular_page = get_theme_mod( 'boundlessnews_header_popular_page' );

            if( $boundlessnews_header_trending_page == $post->ID || $boundlessnews_header_popular_page == $post->ID ){

                $boundlessnews_archive_layout = get_theme_mod( 'boundlessnews_archive_layout',$boundlessnews_default['boundlessnews_archive_layout'] );
                $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$boundlessnews_default['ed_image_content_inverse'] );
                if( $boundlessnews_archive_layout == 'default' && $ed_image_content_inverse ){

                    $classes[] = 'twp-archive-alternative';

                }

                $classes[] = 'twp-archive-'.esc_attr( $boundlessnews_archive_layout );
                
            }

        }

        if( is_singular('post') ){

            $boundlessnews_post_layout = esc_html( get_post_meta( $post->ID, 'boundlessnews_post_layout', true ) );

            if( $boundlessnews_post_layout == '' || $boundlessnews_post_layout == 'global-layout' ){
                
                $boundlessnews_post_layout = get_theme_mod( 'boundlessnews_single_post_layout',$boundlessnews_default['boundlessnews_single_post_layout'] );

            }
            $classes[] = 'twp-single-'.esc_attr( $boundlessnews_post_layout );

            if( $boundlessnews_post_layout == 'layout-2' ){
                
                $boundlessnews_header_overlay = esc_html( get_post_meta( $post->ID, 'boundlessnews_header_overlay', true ) );

                if( $boundlessnews_header_overlay == '' || $boundlessnews_header_overlay == 'global-layout' ){

                    $boundlessnews_post_layout2 = get_theme_mod( 'boundlessnews_single_post_layout',$boundlessnews_default['boundlessnews_single_post_layout'] );

                    if( $boundlessnews_post_layout2 == 'layout-2' ){

                        $ed_header_overlay = esc_html( get_post_meta( $post->ID, 'ed_header_overlay', true ) );
                        if( $ed_header_overlay == '' || $ed_header_overlay == 'global-layout' ){
                            
                            $ed_header_overlay = get_theme_mod( 'ed_header_overlay',$boundlessnews_default['ed_header_overlay'] );
                        }

                    }else{

                        $ed_header_overlay = false;

                    }

                }else{

                    $ed_header_overlay = true;

                }
                if( $ed_header_overlay ){

                    $classes[] = 'twp-single-header-overlay';

                }

            }

        }

        if( is_singular('page') ){

            $boundlessnews_page_layout = get_post_meta( $post->ID, 'boundlessnews_page_layout', true );

            if( $boundlessnews_page_layout == ''  ){
                
                $boundlessnews_page_layout = 'layout-1';

            }

            $classes[] = 'theme-single-'.esc_attr( $boundlessnews_page_layout );

            if( $boundlessnews_page_layout == 'layout-2' ){
                
                $boundlessnews_ed_header_overlay = get_post_meta( $post->ID, 'boundlessnews_ed_header_overlay', true );
                if( $boundlessnews_ed_header_overlay ){
                    $classes[] = 'theme-single-header-overlay';
                }

            }

        }

        if( is_archive() || is_home() || is_search() ){

            $boundlessnews_archive_layout = get_theme_mod( 'boundlessnews_archive_layout',$boundlessnews_default['boundlessnews_archive_layout'] );
            $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$boundlessnews_default['ed_image_content_inverse'] );
            if( $boundlessnews_archive_layout == 'default' && $ed_image_content_inverse ){

                $classes[] = 'twp-archive-alternative';

            }

            $classes[] = 'twp-archive-'.esc_attr( $boundlessnews_archive_layout );
            
        }

        if( is_singular('post') ){

            $boundlessnews_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_reaction', true ) );
            if( $boundlessnews_ed_post_reaction ){
                $classes[] = 'hide-comment-rating';
            }

        }

        $ed_fullwidth_layout = get_theme_mod( 'ed_fullwidth_layout',$boundlessnews_default['ed_fullwidth_layout'] );

        if( $ed_fullwidth_layout != 'default' && !empty( $ed_fullwidth_layout ) ){
            $classes[] = 'theme-'.esc_attr( $ed_fullwidth_layout ).'-layout';
        }

        return $classes;
    }

endif;

add_filter('body_class', 'boundlessnews_body_classes');