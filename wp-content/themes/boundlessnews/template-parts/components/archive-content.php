<?php
/**
 * Archive Content
 *
 * @package BoundlessNews
 */

if( !function_exists('boundlessnews_video_content_render') ):

    function boundlessnews_video_content_render( $class1 = '', $class2 = '', $class3 = '', $ratio_value = 'default', $video_autoplay = 'autoplay-disable' ){

        $boundlessnews_default = boundlessnews_get_default_theme_options();
        $boundlessnews_archive_layout = esc_attr( get_theme_mod( 'boundlessnews_archive_layout',$boundlessnews_default['boundlessnews_archive_layout'] ) );
        $global_sidebar_layout = esc_attr( get_theme_mod( 'global_sidebar_layout',$boundlessnews_default['global_sidebar_layout'] ) );

        if(  $boundlessnews_archive_layout == 'default' ){
            
            $image_size = 'boundlessnews-400-280';
            
        }elseif( $boundlessnews_archive_layout == 'masonry' ){

            $image_size = 'medium_large';

        }elseif( $boundlessnews_archive_layout == 'grid' ){
            
            $image_size = 'boundlessnews-500-300';
            
        }else{

            if( $global_sidebar_layout == 'no-sidebar' ){
                $image_size = 'full';
            }else{
                $image_size = 'large';
            }
            
        } ?>
        <div class="theme-article-area">
            <article id="<?php echo esc_attr( $class1 ); ?>-<?php the_ID(); ?>" <?php post_class('news-article'); ?>>

                <?php
                if( $video_autoplay == 'autoplay-enable' ){
                    $autoplay_class = 'pause';
                    $play_pause_text = esc_html__('Pause','boundlessnews');
                }else{
                    $autoplay_class = 'play';
                    $play_pause_text = esc_html__('Play','boundlessnews');
                }

                add_filter('booster_extension_filter_like_ed', function ( ) {
                    return false;
                });

                $content = apply_filters( 'the_content', get_the_content() );
                $video = false;

                // Only get video from the content if a playlist isn't present.
                if ( false === strpos( $content, 'wp-playlist-script' ) ) {

                    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

                }

                if ( ! empty( $video ) ) { ?>

                    <div class="entry-content-media">
                        <div class="twp-content-video">

                            <?php
                            foreach ( $video as $video_html ) { ?>

                                <div class="entry-video theme-ratio-<?php echo esc_attr( $ratio_value ); ?>">
                                    <div class="twp-video-control-buttons hide-no-js">

                                        <button attr-id="<?php echo esc_attr( $class2 ); ?>-<?php echo absint( get_the_ID() ); ?>" class="theme-video-control theme-action-control twp-pause-play <?php echo esc_attr( $autoplay_class ); ?>">
                                            <span class="action-control-trigger">
                                                <span class="twp-video-control-action">
                                                    <?php boundlessnews_the_theme_svg( $autoplay_class ); ?>
                                                </span>

                                                <span class="screen-reader-text">
                                                    <?php echo $play_pause_text; ?>
                                                </span>
                                            </span>
                                        </button>

                                        <button attr-id="<?php echo esc_attr( $class2 ); ?>-<?php echo absint( get_the_ID() ); ?>" class="theme-video-control theme-action-control twp-mute-unmute unmute">
                                            <span class="action-control-trigger">
                                                <span class="twp-video-control-action">
                                                    <?php boundlessnews_the_theme_svg('mute'); ?>
                                                </span>

                                                <span class="screen-reader-text">
                                                    <?php esc_html_e('Unmute','boundlessnews'); ?>
                                                </span>
                                            </span>
                                        </button>

                                    </div>

                                    <div class="theme-video-panel <?php echo esc_attr( $class3 ); ?>" data-autoplay="<?php echo esc_attr( $video_autoplay ); ?>" data-id="<?php echo esc_attr( $class2 ); ?>-<?php echo absint( get_the_ID() ); ?>">
                                        <?php echo boundlessnews_iframe_escape( $video_html ); ?>
                                    </div>

                                </div>

                                <?php
                                break;

                            } ?>

                        </div>
                    </div>

                <?php
                }else{

                    if( has_post_thumbnail() ){ ?>
                        
                        <div class="post-thumbnail">

                            <?php
                            $format = get_post_format(get_the_ID()) ?: 'standard';
                            $icon = boundlessnews_post_format_icon($format);

                            if (!empty($icon)) { ?>
                                <span class="top-right-icon"><?php echo boundlessnews_svg_escape( $icon ); ?></span>
                            <?php }

                            boundlessnews_post_thumbnail( $image_size ); ?>

                        </div>

                    <?php }

                } ?>

                <div class="post-content">

                    <header class="entry-header">

                        <?php
                        if( 'post' === get_post_type() ){ ?>

                            <div class="entry-meta">

                                <?php boundlessnews_entry_footer( $cats = true, $tags = false, $edits = false, $text = false, $icon = false ); ?>

                            </div>

                        <?php } ?>

                        <h2 class="entry-title">

                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

                        </h2>

                    </header>

                    <div class="entry-content">

                        <?php
                        if( has_excerpt() ){

                            the_excerpt();

                        }else{

                            echo '<p>';
                            echo esc_html( wp_trim_words( get_the_content(),25,'...' ) );
                            echo '</p>';

                        } ?>

                    </div>

                    <div class="entry-footer">
                        <div class="entry-meta">
                            <?php boundlessnews_posted_by(); ?>
                        </div>
                        <?php boundlessnews_post_permalink(); ?>
                    </div>

                </div>

            </article>
        </div>
    
    <?php
    }

endif;