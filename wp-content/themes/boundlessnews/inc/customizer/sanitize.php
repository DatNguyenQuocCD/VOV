<?php
/**
* Custom Functions.
*
* @package BoundlessNews
*/

if( !function_exists( 'boundlessnews_sanitize_layout_option' ) ) :

    // Sidebar Option Sanitize.
    function boundlessnews_sanitize_layout_option( $boundlessnews_input ){

        $boundlessnews_metabox_options = array( 'default','boxed','widerwidth' );
        if( in_array( $boundlessnews_input,$boundlessnews_metabox_options ) ){

            return $boundlessnews_input;

        }

        return;

    }

endif;

if( !function_exists( 'boundlessnews_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function boundlessnews_sanitize_sidebar_option( $boundlessnews_input ){

        $boundlessnews_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $boundlessnews_input,$boundlessnews_metabox_options ) ){

            return $boundlessnews_input;

        }

        return;

    }

endif;

if( !function_exists( 'boundlessnews_sanitize_single_pagination_layout' ) ) :

    // Sidebar Option Sanitize.
    function boundlessnews_sanitize_single_pagination_layout( $boundlessnews_input ){

        $boundlessnews_single_pagination = array( 'no-navigation','norma-navigation','ajax-next-post-load' );
        if( in_array( $boundlessnews_input,$boundlessnews_single_pagination ) ){

            return $boundlessnews_input;

        }

        return;

    }

endif;

if( !function_exists( 'boundlessnews_sanitize_archive_layout' ) ) :

    // Sidebar Option Sanitize.
    function boundlessnews_sanitize_archive_layout( $boundlessnews_input ){

        $boundlessnews_archive_option = array( 'default','full','grid','masonry' );
        if( in_array( $boundlessnews_input,$boundlessnews_archive_option ) ){

            return $boundlessnews_input;

        }

        return;

    }

endif;

if( !function_exists( 'boundlessnews_sanitize_single_post_layout' ) ) :

    // Single Layout Option Sanitize.
    function boundlessnews_sanitize_single_post_layout( $boundlessnews_input ){

        $boundlessnews_single_layout = array( 'layout-1','layout-2' );
        if( in_array( $boundlessnews_input,$boundlessnews_single_layout ) ){

            return $boundlessnews_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'boundlessnews_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function boundlessnews_sanitize_checkbox( $boundlessnews_checked ) {

		return ( ( isset( $boundlessnews_checked ) && true === $boundlessnews_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'boundlessnews_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function boundlessnews_sanitize_select( $boundlessnews_input, $boundlessnews_setting ) {

        // Ensure input is a slug.
        $boundlessnews_input = sanitize_text_field( $boundlessnews_input );

        // Get list of choices from the control associated with the setting.
        $choices = $boundlessnews_setting->manager->get_control( $boundlessnews_setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $boundlessnews_input, $choices ) ? $boundlessnews_input : $boundlessnews_setting->default );

    }

endif;

if ( ! function_exists( 'boundlessnews_sanitize_repeater' ) ) :
    
    /**
    * Sanitise Repeater Field
    */
    function boundlessnews_sanitize_repeater($input){
        $input_decoded = json_decode( $input, true );
        
        if(!empty($input_decoded)) {

            foreach ($input_decoded as $boxes => $box ){

                foreach ($box as $key => $value){

                    if( $key == 'section_ed' 
                        || $key == 'ed_tab' 
                        || $key == 'ed_arrows_carousel' 
                        || $key == 'ed_dots_carousel' 
                        || $key == 'ed_autoplay_carousel' 
                        || $key == 'ed_flip_column' 
                        || $key == 'ed_ribbon_bg'
                    ){

                        $input_decoded[$boxes][$key] = boundlessnews_sanitize_repeater_ed( $value );

                    }elseif( $key == 'home_section_type' ){

                        $input_decoded[$boxes][$key] = boundlessnews_sanitize_home_sections( $value );

                    }elseif( $key == 'ribbon_bg_color_schema' ){

                        $input_decoded[$boxes][$key] = boundlessnews_sanitize_ribbon_bg( $value );

                    }elseif( $key == 'category_color' ){

                        $input_decoded[$boxes][$key] = sanitize_hex_color( $value );

                    }elseif( $key == 'bg_image_size' ){

                        $input_decoded[$boxes][$key] =  boundlessnews_sanitize_bg_image_size( $value );

                    }elseif( $key == 'tiles_post_per_page' ){

                        $input_decoded[$boxes][$key] =  absint( $value );

                    }elseif( $key == 'advertise_image' || $key == 'advertise_link' ){

                         $input_decoded[$boxes][$key] = esc_url_raw( $value );

                    }elseif($key == 'section_category' || 
                            $key == 'section_post_slide_cat' || 
                            $key == 'section_category_1' || 
                            $key == 'section_category_2' || 
                            $key == 'section_category_3' || 
                            $key == 'section_category_4' || 
                            $key == 'category'
                        ){

                        $input_decoded[$boxes][$key] =  boundlessnews_sanitize_category( $value );

                    }else{

                        $input_decoded[$boxes][$key] = sanitize_text_field( $value );

                    }
                    
                }

            }
           
            return json_encode($input_decoded);

        }

        return $input;
    }
endif;

/** Sanitize Enable Disable Checkbox **/
function boundlessnews_sanitize_repeater_ed( $input ) {

    $valid_keys = array('yes','no');
    if ( in_array( $input , $valid_keys ) ) {
        return $input;
    }
    return '';

}

function boundlessnews_sanitize_home_sections( $input ) {

    $home_sections = array(

        'banner-blocks-1' => esc_html__('Slider & Tab Block','boundlessnews'),
        'main-banner' => esc_html__('Slider & Vertical Slider','boundlessnews'),
        'latest-posts-blocks' => esc_html__('Latest Posts Block','boundlessnews'),
        'slider-blocks-1' => esc_html__('Slider Block style 1','boundlessnews'),
        'slider-blocks-2' => esc_html__('Slider Block style 2','boundlessnews'),
        'tiles-blocks' => esc_html__('Tiles Block','boundlessnews'),
        'advertise-blocks' => esc_html__('Advertise Block','boundlessnews'),
        'carousel-blocks' => esc_html__('Carousel Block','boundlessnews'),
        'home-widget-area' => esc_html__('Widgets Area Block','boundlessnews'),

    );
    if ( array_key_exists( $input , $home_sections ) ) {
        return $input;
    }
    return '';

}

/** Sanitize Category **/
function boundlessnews_sanitize_category( $input ) {

   $boundlessnews_post_category_list = boundlessnews_post_category_list();
    if ( array_key_exists( $input , $boundlessnews_post_category_list ) ) {
        return $input;
    }
    return '';

}

function boundlessnews_sanitize_bg_image_size( $input ) {

    $bg_image_size = array( 
                    'auto' => esc_html('Original','boundlessnews'),
                    'contain' => esc_html('Fit to Screen','boundlessnews'),
                    'cover' => esc_html('Fill Screen','boundlessnews'),
                );

    if ( array_key_exists( $input , $bg_image_size ) ) {
        return $input;
    }
    return '';

}

function boundlessnews_sanitize_ribbon_bg( $input ) {

    $ribbon_bg = array( 
                    '1' =>  array(
                                    'title' =>  esc_html__( 'Blue', 'boundlessnews' ),
                                    'color' =>  '#3061ff',
                                ),
                    '2' =>  array(
                                    'title' =>  esc_html__( 'Orange', 'boundlessnews' ),
                                    'color' =>  '#fa9000',
                                ),
                    '3' =>  array(
                                    'title' =>  esc_html__( 'Royal Blue', 'boundlessnews' ),
                                    'color' =>  '#00167a',
                                ),
                    '4' =>  array(
                                    'title' =>  esc_html__( 'Pink', 'boundlessnews' ),
                                    'color' =>  '#ff2d55',
                                ),
                );

    if ( array_key_exists( $input , $ribbon_bg ) ) {
        return $input;
    }
    return '';

}