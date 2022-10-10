<?php
/**
 * Carousel Posts Function.
 *
 * @package BoundlessNews
 */
if (!function_exists('boundlessnews_carousel_posts')):
    // Header Carousel Post.
    function boundlessnews_carousel_posts($boundlessnews_home_section, $repeat_times)
    {
        $section_category = esc_html(isset($boundlessnews_home_section->section_category) ? $boundlessnews_home_section->section_category : '');
        $slider_arrows = esc_html(isset($boundlessnews_home_section->ed_arrows_carousel) ? $boundlessnews_home_section->ed_arrows_carousel : '');
        $slider_dots = esc_html(isset($boundlessnews_home_section->ed_dots_carousel) ? $boundlessnews_home_section->ed_dots_carousel : '');
        $slider_autoplay = esc_html(isset($boundlessnews_home_section->ed_autoplay_carousel) ? $boundlessnews_home_section->ed_autoplay_carousel : '');
        $home_section_title = esc_html(isset($boundlessnews_home_section->home_section_title) ? $boundlessnews_home_section->home_section_title : '');

        $carousel_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 12, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($section_category)));
        if ($slider_autoplay == 'yes') {
            $autoplay = 'true';
        } else {
            $autoplay = 'false';
        }
        if ($slider_dots == 'yes') {
            $dots = 'true';
        } else {
            $dots = 'false';
        }
        if (is_rtl()) {
            $rtl = 'true';
        } else {
            $rtl = 'false';
        }

        if( empty( $home_section_title ) && $section_category ){

            $catObj = get_category_by_slug( $section_category );
            if( isset($catObj->name) && $catObj->name ){
                $home_section_title = $catObj->name;
            }

        }
        
        if( $carousel_post_query->have_posts() ): ?>

            <div id="theme-block-<?php echo esc_attr($repeat_times); ?>" class="theme-block theme-block-carousel">
                <div class="wrapper">

                    <?php if( $home_section_title || $slider_arrows != 'no' ){ ?>

                        <div class="column-row">
                            <div class="column column-12">
                                <header class="block-title-wrapper">

                                    <?php if ($home_section_title) { ?>
                                        <h2 class="block-title">
                                            <?php echo esc_html($home_section_title); ?>
                                        </h2>
                                    <?php } ?>

                                    <?php if( $slider_arrows != 'no' ){ ?>

                                        <div class="theme-heading-controls">
                                            <div class="title-controls">
                                                <button type="button" class="slide-btn slide-btn-small slide-prev-1">
                                                    <?php boundlessnews_the_theme_svg('chevron-left'); ?>
                                                </button>
                                                <button type="button" class="slide-btn slide-btn-small slide-next-1">
                                                    <?php boundlessnews_the_theme_svg('chevron-right'); ?>
                                                </button>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </header>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="theme-carousel-slider theme-carousel-space" data-slick='{"autoplay": <?php echo esc_attr($autoplay); ?>, "dots": <?php echo esc_attr($dots); ?>, "rtl": <?php echo esc_attr($rtl); ?>}'>

                        <?php while ($carousel_post_query->have_posts()) {
                            $carousel_post_query->the_post();

                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'boundlessnews-400-500');
                            $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>
                            
                            <div class="theme-carousel-item">
                                <article id="theme-post-<?php the_ID(); ?>" <?php post_class('news-article post-thumb post-thumb-slides'); ?>>
                                    <div class="data-bg data-bg-big thumb-overlay img-hover-slide" data-background="<?php echo esc_url($featured_image); ?>">
                                        <?php
                                        $format = get_post_format(get_the_ID()) ?: 'standard';
                                        $icon = boundlessnews_post_format_icon($format);
                                        if (!empty($icon)) { ?>
                                            <span class="top-right-icon"><?php echo boundlessnews_svg_escape($icon); ?></span>
                                        <?php } ?>

                                        <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>

                                        <div class="article-content article-content-overlay">

                                            <div class="entry-meta">
                                                <?php boundlessnews_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                                            </div>

                                            <h3 class="entry-title entry-title-medium">
                                                <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                            </h3>

                                            <div class="entry-meta">
                                                <?php boundlessnews_posted_by(); ?>
                                                <?php boundlessnews_post_view_count(); ?>
                                            </div>

                                        </div>

                                    </div>
                                </article>
                            </div>

                        <?php } ?>

                    </div>
                    
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
    }
endif;