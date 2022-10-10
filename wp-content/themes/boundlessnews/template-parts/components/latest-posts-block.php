<?php
/**
 * Latest Posts
 *
 * @package BoundlessNews
 */
if( !function_exists('boundlessnews_latest_blocks') ):
    
    function boundlessnews_latest_blocks($boundlessnews_home_section, $repeat_times){

        global $post;
        $boundlessnews_default = boundlessnews_get_default_theme_options();
        $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $boundlessnews_default['global_sidebar_layout'] ) );
        

        if( is_single() || is_page() ){

            $boundlessnews_post_sidebar = esc_attr( get_post_meta( $post->ID, 'boundlessnews_post_sidebar_option', true ) );
            if( $boundlessnews_post_sidebar == 'global-sidebar' || empty( $boundlessnews_post_sidebar ) ){

                $sidebar = $sidebar;
            }else{
                $sidebar = $boundlessnews_post_sidebar;
            }

        }

        $boundlessnews_archive_layout = esc_attr( get_theme_mod( 'boundlessnews_archive_layout', $boundlessnews_default['boundlessnews_archive_layout'] ) ); ?>

        <div id="theme-block-<?php echo esc_attr( $repeat_times ); ?>" class="theme-block theme-block-archive">
            <div class="wrapper">
                <div class="column-row">

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            
                            <?php
                            if( !is_front_page() ) {
                                boundlessnews_breadcrumb_with_title_block();
                            }

                            if( have_posts() ): ?>

                                <div class="article-wraper archive-layout <?php echo 'archive-layout-' . esc_attr( $boundlessnews_archive_layout ); ?>">
                                    <?php while (have_posts()) :
                                        the_post();

                                        if( !is_page() ){

                                            if( get_post_format() == 'video' ){

                                                $video_autoplay = esc_attr( get_post_meta(get_the_ID(), 'twp_video_autoplay', true) );
                                                if( $video_autoplay == '' || $video_autoplay == 'global' ){

                                                    $video_autoplay = isset($boundlessnews_home_section->section_video_autoplay) ? $boundlessnews_home_section->section_video_autoplay : '';
                                                    if( $video_autoplay == '' || $video_autoplay == 'global' ){
                                                        $video_autoplay = get_theme_mod( 'ed_autoplay', $boundlessnews_default['ed_autoplay'] );
                                                    }

                                                }

                                                $ratio_value = get_post_meta( get_the_ID(), 'twp_aspect_ratio', true );
                                                if( $ratio_value == '' || $ratio_value == 'global' ){
                                                    
                                                    $ratio_value = isset( $boundlessnews_home_section->section_video_ratio ) ? $boundlessnews_home_section->section_video_ratio : '';

                                                    if( $ratio_value == '' || $ratio_value == 'global' ){
                                                        $ratio_value = get_theme_mod( 'post_video_aspect_ration', $boundlessnews_default['post_video_aspect_ration'] );
                                                    }

                                                }

                                                boundlessnews_video_content_render( $class1 = 'post', $class2 = 'video-id', $class3 = 'video-main-wraper', $ratio_value, $video_autoplay );
                                                
                                            }else{

                                                get_template_part( 'template-parts/content', get_post_format() );

                                            }
                                            
                                        }else{
                                            get_template_part('template-parts/content', 'single');
                                        }


                                    endwhile; ?>
                                </div>

                                <?php if( !is_page() ): do_action('boundlessnews_archive_pagination'); endif;

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>
                        </main><!-- #main -->
                    </div>

                    <?php if( $sidebar != 'no-sidebar' ){

                        get_sidebar();
                        
                    } ?>

                </div>
            </div>
        </div>

    <?php
    }
    
endif;
