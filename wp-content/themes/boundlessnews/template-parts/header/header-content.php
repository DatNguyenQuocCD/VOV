<?php
/**
 * Header Layout 2
 *
 * @package BoundlessNews
 */

use boundlessnews\BoundlessNews_Walkernav;

$boundlessnews_default = boundlessnews_get_default_theme_options();
$boundlessnews_header_bg_size = get_theme_mod('boundlessnews_header_bg_size', $boundlessnews_default['boundlessnews_header_bg_size']);
$ed_header_bg_fixed = get_theme_mod('ed_header_bg_fixed', $boundlessnews_default['ed_header_bg_fixed']);
$ed_header_bg_overlay = get_theme_mod('ed_header_bg_overlay', $boundlessnews_default['ed_header_bg_overlay']); ?>

<header id="site-header" class="theme-header header-affix <?php if ($ed_header_bg_overlay) { echo 'header-overlay-enabled'; } ?> <?php if (has_header_image()) {
        if ($ed_header_bg_fixed) {
            echo 'data-bg-fixed';
        } ?> data-bg header-bg-<?php echo esc_attr($boundlessnews_header_bg_size); ?> <?php } ?>" role="banner" <?php if (has_header_image()) { ?> data-background="<?php echo esc_url(get_header_image()); ?>" <?php } ?>>
        <?php if (has_header_video()) { ?>
            <div class="custom-header-media">
                <?php the_custom_header_markup(); ?> 
            </div>
        <?php } ?>

    <?php boundlessnews_top_nav(); ?>
    <div class="header-site-branding">
        <div class="wrapper">
            <div class="header-wrapper">
                <div class="header-item header-item-left">
                    <div class="header-titles">
                        <?php
                        boundlessnews_site_logo();
                        boundlessnews_site_description();
                        ?>
                    </div>
                </div>
                <div class="header-item header-item-right">
                    <?php boundlessnews_header_ad(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="header-navbar header-affix-follow">
        <div class="wrapper">
            <div class="header-wrapper">
                <div class="header-item header-item-left">
                    <div class="site-navigation">
                        <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'boundlessnews'); ?>" role="navigation">
                            <ul class="primary-menu theme-menu">
                                <?php
                                if (has_nav_menu('boundlessnews-primary-menu')) {

                                    wp_nav_menu(
                                        array(
                                            'container' => '',
                                            'items_wrap' => '%3$s',
                                            'theme_location' => 'boundlessnews-primary-menu',
                                            'walker' => new boundlessnews\BoundlessNews_Walkernav(),
                                        )
                                    );

                                } else {

                                    wp_list_pages(
                                        array(
                                            'match_menu_classes' => true,
                                            'show_sub_menu_icons' => true,
                                            'title_li' => false,
                                            'walker' => new BoundlessNews_Walker_Page(),
                                        )
                                    );

                                } ?>
                            </ul>
                        </nav>
                    </div>

                </div>

                <div class="header-item header-item-right">

                    <?php
                    $ed_header_trending_news = get_theme_mod('ed_header_trending_news', $boundlessnews_default['ed_header_trending_news']);
                    if ($ed_header_trending_news) {
                        $ed_header_trending_posts_title = get_theme_mod('ed_header_trending_posts_title', $boundlessnews_default['ed_header_trending_posts_title']); ?>
                        <div class="topbar-trending">
                            <button type="button" class="navbar-control navbar-control-trending-news">
                                    <span class="navbar-control-trigger" tabindex="-1">
                                        <span class="navbar-controller">
                                            <span class="navbar-control-icon">
                                                <?php boundlessnews_the_theme_svg('blaze'); ?>
                                            </span>
                                            <span class="navbar-control-label">
                                                <?php echo esc_html($ed_header_trending_posts_title); ?>
                                            </span>
                                        </span>
                                    </span>
                            </button>
                        </div>
                    <?php } ?>


                    <?php boundlessnews_search_offcanvas_icon_render(); ?>
                </div>
            </div>
            <?php boundlessnews_content_trending_news_render(); ?>
        </div>
    </div>

    <?php $ed_header_affix_bar = get_theme_mod('ed_header_affix_bar', $boundlessnews_default['ed_header_affix_bar']); ?>
    <?php if ($ed_header_affix_bar) { ?>
        <div class="header-affixbar header-affix-follow">
            <div class="wrapper">
                <div class="header-wrapper">
                    <div class="header-item header-item-left">
                        <div class="site-branding affix-site-branding">
                            <?php
                            $twp_affix_bar_logo = get_theme_mod('twp_affix_bar_logo');
                            if ($twp_affix_bar_logo) {
                                echo '<a href="' . esc_url(home_url('/')) . '" rel="home" ><img src="' . esc_url($twp_affix_bar_logo) . '" alt="' . esc_html(get_bloginfo('name')) . '" title="' . esc_html(get_bloginfo('name')) . '" /></a>';
                            } else { ?>
                                <div class="twp-affix-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                       rel="home"><?php bloginfo('name'); ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="header-item header-item-center">
                        <div class="topbar-items">
                            <div class="topbar-item">
                                <div class="twp-mid-affixbar">
                                    <div id="twp-current-read">

                                        <div id="twp-current-read-bg"></div>
                                        <?php
                                        if (!is_home() && is_singular()) { ?>

                                            <div class="current-news-title twp-delay-animated1">
                                              <?php esc_html_e('Reading Now', 'boundlessnews'); ?>
                                            </div>
                                            <div class="theme-newsflash-headlines">
                                                <?php the_title(); ?>
                                            </div>

                                            <?php
                                        } elseif (is_search()) { ?>

                                            <div class="current-news-title twp-delay-animated1">
                                              <?php esc_html_e('Search Results for:', 'boundlessnews'); ?>
                                            </div>

                                            <?php
                                            /* translators: %s: search query. */
                                            echo '<div class="theme-newsflash-headlines">' . esc_html(get_search_query()) . '</div>';

                                        } elseif (is_archive() && !is_author()) { ?>

                                        <div class="current-news-title twp-delay-animated1">
                                            <?php esc_html_e('Category: ', 'boundlessnews'); ?>
                                        </div>

                                            <?php the_archive_title('<div class="theme-newsflash-headlines">', '</div>');

                                        } elseif (is_author()) { ?>

                                            <div class="current-news-title twp-delay-animated1">
                                              <?php esc_html_e('Author: ', 'boundlessnews'); ?>
                                            </div>
                                            <?php the_archive_title('<div class="theme-newsflash-headlines">', '</div>');

                                        } else {

                                            $boundless_news_ticker_news_args = array(
                                                'post_type' => 'post',
                                                'ignore_sticky_posts' => true,
                                                'posts_per_page' => 5,
                                            );

                                            if( is_rtl() ) {
                                                $rtl = 'true';
                                            }else{
                                                $rtl = 'false';
                                            }

                                            $boundless_news_ticker_news_post_query = new WP_Query($boundless_news_ticker_news_args);
                                            if ($boundless_news_ticker_news_post_query->have_posts()) : ?>

                                                <div class="current-news-title twp-delay-animated1">
                                                  <?php esc_html_e('News Flash: ', 'boundlessnews'); ?>
                                                </div>

                                                <div class="theme-newsflash-headlines">
                                                    <div class="twp-marquee" data-slick='{"rtl": <?php echo esc_attr( $rtl ); ?>}'>
                                                        <?php
                                                        while ($boundless_news_ticker_news_post_query->have_posts()) :
                                                            $boundless_news_ticker_news_post_query->the_post(); ?>
                                                            <div class="newsflash-ticker-item">
                                                                <a href="<?php the_permalink(); ?>">

                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </div>
                                                        <?php endwhile; ?>
                                                    </div>
                                                </div>
                                            <?php
                                            endif;
                                            wp_reset_postdata();
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $ed_social_on_affixbar = get_theme_mod('ed_social_on_affixbar', $boundlessnews_default['ed_social_on_affixbar']); ?>
                    <?php 
                    if ($ed_social_on_affixbar && (has_nav_menu('boundlessnews-social-menu'))) { ?>
                        <div class="header-item header-item-right">
                            <div id="social-nav-affixbar" class="social-navigation affixbar-social-navigation">
                                <?php
                                wp_nav_menu(
                                        array(
                                        'theme_location' => 'boundlessnews-social-menu',
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                        'container' => 'div',
                                        'container_class' => 'boundlessnews-social-menu',
                                        'depth' => 1,
                                    )
                                ); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

</header>
