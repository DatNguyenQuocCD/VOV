<?php
/**
 * Slider Posts Function.
 *
 * @package BoundlessNews
 */
if (!function_exists('boundlessnews_slider_blocks_style_2')):
    function boundlessnews_slider_blocks_style_2($boundlessnews_home_section, $repeat_times)
    {
        $section_category = esc_html(isset($boundlessnews_home_section->section_category) ? $boundlessnews_home_section->section_category : '');
        $slider_autoplay = esc_html(isset($boundlessnews_home_section->ed_autoplay_carousel) ? $boundlessnews_home_section->ed_autoplay_carousel : '');
        $carousel_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($section_category)));
        if ($slider_autoplay == 'yes') {
            $autoplay = 'true';
        } else {
            $autoplay = 'false';
        }
        if (is_rtl()) {
            $rtl = 'true';
        } else {
            $rtl = 'false';
        }
        if ($carousel_post_query->have_posts()): ?>
            <div id="theme-block-<?php echo esc_attr($repeat_times); ?>" class="theme-block theme-block-slider theme-block-slider-2">
                <div class="theme-banner-vertical" data-slick='{"autoplay": <?php echo esc_attr($autoplay); ?>, "rtl": <?php echo esc_attr($rtl); ?>}'>
                    <?php while ($carousel_post_query->have_posts()) {
                        $carousel_post_query->the_post();
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'boundlessnews-1600-700');
                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                        <div class="theme-slider-item">
                            <article id="theme-post-<?php the_ID(); ?>" <?php post_class('post-thumb post-thumb-slides'); ?>>
                                <div class="data-bg data-bg-xl-large thumb-overlay thumb-overlay-darker img-hover-slide" data-background="<?php echo esc_url($featured_image); ?>">
                                    <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>
                                    <div class="article-content article-content-center article-content-overlay">
                                        <div class="wrapper">
                                            <div class="column-row">
                                                <div class="column column-8 column-xs-12">
                                                    <div class="entry-meta">
                                                        <?php boundlessnews_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                                                    </div>
                                                    <h2 class="entry-title entry-title-large">
                                                        <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark"
                                                           title="<?php the_title_attribute(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h2>
                                                    <div class="entry-content hidden-xs-element">
                                                        <?php
                                                        if (has_excerpt()) {
                                                            the_excerpt();
                                                        } else {
                                                            echo '<p>';
                                                            echo esc_html(wp_trim_words(get_the_content(), 60, '...'));
                                                            echo '</p>';
                                                        } ?>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <?php boundlessnews_posted_by(); ?>
                                                        <?php boundlessnews_post_view_count(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
                <div class="slider-navigator slider-navigator-vertical">
                    <div class="theme-slider-navigator theme-vertical-slicknav theme-carousel-space" data-slick='{"autoplay": <?php echo esc_attr($autoplay); ?>, "dots": false, "rtl": <?php echo esc_attr($rtl); ?>}'>
                        <?php
                        $i = 1;
                        while ($carousel_post_query->have_posts()) {
                            $carousel_post_query->the_post();
                            ?>
                            <div class="theme-slider-item">
                                <div class="content-list">
                                    <article id="theme-post-<?php the_ID(); ?>" <?php post_class('news-article news-article-slidernav post-thumb'); ?>>
                                        <div class="article-content-count">
                                            <span><?php echo $i; ?></span>
                                        </div>
                                        <div class="article-content">
                                            <h3 class="entry-title entry-title-small">
                                                <?php the_title(); ?>
                                            </h3>
                                        </div>
                                    </article>
                                    <div class="theme-slidenav-progress"></div>
                                </div>
                            </div>
                        <?php $i++; } ?>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
    }
endif;