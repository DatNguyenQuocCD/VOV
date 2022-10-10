<?php
/**
 * Widget FUnctions.
 *
 * @package BoundlessNews
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boundlessnews_widgets_init(){

    $boundlessnews_default = boundlessnews_get_default_theme_options();

    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'boundlessnews'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'boundlessnews'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Advertisement One', 'boundlessnews'),
        'id' => 'boundlessnews-header-1',
        'description' => esc_html__('Add widgets here.', 'boundlessnews'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    $twp_boundlessnews_home_sections_1 = get_theme_mod('twp_boundlessnews_home_sections_1', json_encode($boundlessnews_default['twp_boundlessnews_home_sections_1']));
    $twp_boundlessnews_home_sections_1 = json_decode($twp_boundlessnews_home_sections_1);

    foreach( $twp_boundlessnews_home_sections_1 as $boundlessnews_home_section ){

        $home_section_type = isset( $boundlessnews_home_section->home_section_type ) ? $boundlessnews_home_section->home_section_type : '';

        switch( $home_section_type ){

            case 'home-widget-area':

                $ed_home_widget_area = isset( $boundlessnews_home_section->section_ed ) ? $boundlessnews_home_section->section_ed : '';

                if( $ed_home_widget_area == 'yes' ){

                    register_sidebar(array(
                        'name' => esc_html__('Homepage Main Widget Area', 'boundlessnews'),
                        'id' => 'boundlessnews-home-main-widget-area',
                        'description' => esc_html__('Add widgets here.', 'boundlessnews'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="block-title"><span>',
                        'after_title' => '</span></h2>',
                    ));

                    $enable_sidebar = isset( $boundlessnews_home_section->enable_sidebar ) ? $boundlessnews_home_section->enable_sidebar : '';

                    if( $enable_sidebar == 'yes' ){

                        register_sidebar(array(
                            'name' => esc_html__('Homepage Sidebar Widget Area', 'boundlessnews'),
                            'id' => 'boundlessnews-home-sidebar-widget-area',
                            'description' => esc_html__('Add widgets here.', 'boundlessnews'),
                            'before_widget' => '<div id="%1$s" class="widget %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widget-title"><span>',
                            'after_title' => '</span></h3>',
                        ));

                    }

                }

                break;

            default:

                break;

        }

    }

    $boundlessnews_default = boundlessnews_get_default_theme_options();
    $footer_column_layout = absint(get_theme_mod('footer_column_layout', $boundlessnews_default['footer_column_layout']));

    for( $i = 0; $i < $footer_column_layout; $i++ ){

        if ($i == 0) {
            $count = esc_html__('One', 'boundlessnews');
        }
        if ($i == 1) {
            $count = esc_html__('Two', 'boundlessnews');
        }
        if ($i == 2) {
            $count = esc_html__('Three', 'boundlessnews');
        }

        register_sidebar(array(
            'name' => esc_html__('Footer Widget ', 'boundlessnews') . $count,
            'id' => 'boundlessnews-footer-widget-' . $i,
            'description' => esc_html__('Add widgets here.', 'boundlessnews'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));

    }

}

add_action('widgets_init', 'boundlessnews_widgets_init');
require get_template_directory() . '/inc/widgets/widget-base.php';
require get_template_directory() . '/inc/widgets/author.php';
require get_template_directory() . '/inc/widgets/category.php';
require get_template_directory() . '/inc/widgets/recent-post.php';
require get_template_directory() . '/inc/widgets/social-link.php';
require get_template_directory() . '/inc/widgets/tab-posts.php';
require get_template_directory() . '/inc/widgets/carousel.php';
require get_template_directory() . '/inc/widgets/slider.php';
require get_template_directory() . '/inc/widgets/cat-posts.php';
require get_template_directory() . '/inc/widgets/list-posts.php';
require get_template_directory() . '/inc/widgets/post-grid.php';
require get_template_directory() . '/inc/widgets/tiles.php';
require get_template_directory() . '/inc/widgets/featured-category.php';