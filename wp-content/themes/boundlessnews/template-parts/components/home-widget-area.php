<?php
/**
 * Homepage Main Widget Area
 *
 * @package BoundlessNews
 */

if( !function_exists('boundlessnews_case_home_widget_area_block') ):

    function boundlessnews_case_home_widget_area_block($boundlessnews_home_section, $repeat_times){

        if ( ! is_active_sidebar( 'boundlessnews-home-main-widget-area' ) && ! is_active_sidebar( 'boundlessnews-home-sidebar-widget-area' ) ) {
            return;
        }
        $ed_home_widget_area = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';
        $enable_sidebar = isset( $boundlessnews_home_section->enable_sidebar ) ? $boundlessnews_home_section->enable_sidebar : '';

        $class = 'homewidget-sidebar-disable';
        if( $enable_sidebar == 'yes' && is_active_sidebar( 'boundlessnews-home-main-widget-area' ) ){
            $class = 'homewidget-sidebar-enable';
        } ?>

        <div id="theme-block-<?php echo esc_attr( $repeat_times ); ?>" class="theme-block theme-block-widgetarea <?php echo $class; ?>">
            <div class="wrapper">
                <div class="column-row">

                    <?php
                    if( is_active_sidebar( 'boundlessnews-home-main-widget-area' ) ){ ?>

                        <div id="widget-primary" class="widget-content-area">

                            <?php dynamic_sidebar( 'boundlessnews-home-main-widget-area' ); ?>

                        </div>

                    <?php }
                    
                    if( $enable_sidebar == 'yes' && is_active_sidebar( 'boundlessnews-home-main-widget-area' ) ){ ?>

                        <div class="custom-widget-area">

                            <?php dynamic_sidebar( 'boundlessnews-home-sidebar-widget-area' ); ?>

                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>

    <?php
    }

endif;