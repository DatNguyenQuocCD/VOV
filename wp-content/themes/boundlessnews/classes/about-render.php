<?php
/**
 * About Rencer Content.
 *
 * @package BoundlessNews
 */
$base_url = home_url();
$boundlessnews_panels_sections = array(
    'theme_general_settings' => array(
        'title' => esc_html__('General Settings', 'boundlessnews'),
        'sections' => array(
            array(
                'title' => esc_html__('Logo & Site Identity', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bcontrol%5D=custom_logo'),
                'icon' => 'dashicons-format-image',
            ),
            array(
                'title' => esc_html__('Header Media', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=header_image'),
                'icon' => 'dashicons-desktop',
            ),
            array(
                'title' => esc_html__('Background Image', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=background_image'),
                'icon' => 'dashicons-desktop',
            ),
            array(
                'title' => esc_html__('Menu Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bpanel%5D=nav_menus'),
                'icon' => 'dashicons-menu',
            ),
        ),
    ),
    'theme_colors_panel' => array(
        'title' => esc_html__('Color Settings', 'boundlessnews'),
        'sections' => array(
            array(
                'title' => esc_html__('Color Options', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=colors'),
                'icon' => 'dashicons-admin-customizer',
            ),
            array(
                'title' => esc_html__('Color Scheme', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=color_schema'),
                'icon' => 'dashicons-art',
            ),
        ),
    ),
    'home_sections_repeater' => array(
        'title' => esc_html__('Homepage Content Section', 'boundlessnews'),
        'sections' => array(
            array(
                'title' => esc_html__('Homepage Content Section', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=home_sections_repeater'),
                'icon' => 'dashicons-admin-generic',
            ),
        ),
    ),
    'theme_option_panel' => array(
        'title' => esc_html__('Theme Options', 'boundlessnews'),
        'sections' => array(
            array(
                'title' => esc_html__('Header Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=main_header_setting'),
                'icon' => 'dashicons-align-center',
            ),
            array(
                'title' => esc_html__('Top Header Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=top_header_setting'),
                'icon' => 'dashicons-ellipsis',
            ),
            array(
                'title' => esc_html__('Pagination Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=boundlessnews_pagination_section'),
                'icon' => 'dashicons-ellipsis',
            ),
            array(
                'title' => esc_html__('Article Meta Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=posts_settings'),
                'icon' => 'dashicons-admin-settings',
            ),
            array(
                'title' => esc_html__('Single Post Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=single_post_setting'),
                'icon' => 'dashicons-welcome-write-blog',
            ),
            array(
                'title' => esc_html__('Layout Settings', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=layout_setting'),
                'icon' => 'dashicons-layout',
            ),
            array(
                'title' => esc_html__('Footer Setting', 'boundlessnews'),
                'url' => esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=footer_settings'),
                'icon' => 'dashicons-admin-generic',
            ),
        ),
    ),
);
$boundlessnews_panel_compare = array(
    array(
        'title' => __('Supports One Click Demo Import', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Logo and Site Title Option', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Header Image', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Fixed Header Image', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Background Image', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Basic Color Option', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Advance Color Option', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Typography Style Option', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Custom Widgets', 'boundlessnews'),
        'free' => __('less', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Homepage Main Widget Area', 'boundlessnews'),
        'free' => __('Less', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Carousel Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Category Call to action Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Layout Grid', 'boundlessnews'),
        'free' => __('3 Layout', 'boundlessnews'),
        'pro' => __('5 Layout', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Layout List', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Layout Multiple Panel', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Layout Tiles', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Sidebar Author Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Sidebar Category Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Sidebar Recent Post Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Sidebar Social Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Sidebar Tab Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('BoundlessNews: Slider Widget', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Footer Widgets Area', 'boundlessnews'),
        'free' => __('3', 'boundlessnews'),
        'pro' => __('4', 'boundlessnews'),
    ),
    array(
        'title' => __('Header Advertisement Area', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Table of Contents', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Coming Soon - Maintenance mode', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Onsite Popup Messages', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Social Nav Options', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Breaking News Option', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Pagination Options', 'boundlessnews'),
        'free' => __('4', 'boundlessnews'),
        'pro' => __('4', 'boundlessnews'),
    ),
    array(
        'title' => __('Archive Options', 'boundlessnews'),
        'free' => __('Limited', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Multiple Post Layouts', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Article Meta Options', 'boundlessnews'),
        'free' => __('Limited', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Single Post Options', 'boundlessnews'),
        'free' => __('Limited', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Multiple single Post Layouts', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Copyright Text Edit Option', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Pre-loader Animations', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Instagram Feed Integration', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Twitter Feed Integration', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Facebook Fanpage widget', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Homepage Section Repeater', 'boundlessnews'),
        'free' => __('no', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Homepage Section Reorder', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Multiple single Post Layouts', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Theme Support', 'boundlessnews'),
        'free' => __('Normal', 'boundlessnews'),
        'pro' => __('High Priority', 'boundlessnews'),
    ),
    array(
        'title' => __('Responsive Layout', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('Translations Ready', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
    array(
        'title' => __('SEO Optimized', 'boundlessnews'),
        'free' => __('yes', 'boundlessnews'),
        'pro' => __('yes', 'boundlessnews'),
    ),
);
include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
$rec_plugins = BoundlessNews_Getting_started::boundlessnews_recommended_plugins();
$theme_version = wp_get_theme()->get('Version');
$theme_info = wp_get_theme();
$theme_name = $theme_info->__get('Name');
$pro_theme_name = $theme_name . ' Pro';
$free_theme_url = 'https://www.themeinwp.com/theme/boundlessnews';
$pro_theme_url = 'https://www.themeinwp.com/theme/boundlessnews-pro';
?>
<div class="twp-about-main">
    <div class="about-page-header">
        <div class="about-wrapper">
            <div class="about-wrapper-inner">
                <div class="about-header-left">
                    <h1 class="about-theme-title">
                        <a href="<?php echo esc_url($free_theme_url); ?>">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/boundlessnews-logo.png'); ?>" class="about-theme-logo">
                            <span class="theme-version"><?php echo esc_html($theme_version); ?></span>
                        </a>
                    </h1>
                </div>
                <div class="about-header-right">
                    <div class="about-header-navigation">
                        <a target="_blank" class="about-header-links header-links-home" href="<?php echo esc_url($free_theme_url); ?>">
                            <?php esc_html_e('Theme Details', 'boundlessnews'); ?>
                        </a>
                        <a target="_blank" class="about-header-links header-links-preview" href="<?php echo esc_url('https://preview.themeinwp.com/boundlessnews/'); ?>">
                            <?php esc_html_e('View Demo', 'boundlessnews'); ?>
                        </a>
                        <a target="_blank" class="about-header-links header-links-review" href="<?php echo esc_url('https://wordpress.org/support/theme/boundlessnews/reviews/?filter=5'); ?>">
                            <?php esc_html_e('Rate This Theme', 'boundlessnews'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-tab-navbar">
        <div class="about-wrapper">
            <ul class="tab-navbar-list">
                <li><a href="#about-panel-1"><?php esc_html_e('Getting started', 'boundlessnews'); ?></a></li>
                <li><a class="active" href="#about-panel-2"><?php esc_html_e('Free vs Pro', 'boundlessnews'); ?></a></li>
                <li><a href="#about-panel-3"><?php esc_html_e('Changelog', 'boundlessnews'); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="about-page-content">
        <div class="about-wrapper">
            <div class="about-wrapper-inner">
                <div class="about-content-left">
                    <div class="about-tab-content">
                        <div id="about-panel-1" class="about-panel-item about-panel-general">
                            <?php
                            foreach ($boundlessnews_panels_sections as $panels) { ?>
                                <div class="about-content-panel">
                                    <?php if (isset($panels['title']) && $panels['title']) { ?>
                                        <h2 class="about-panel-title"><?php echo esc_html($panels['title']); ?></h2>
                                    <?php } ?>
                                    <div class="about-panel-items about-panel-2-columns">
                                        <?php
                                        if (isset($panels['sections']) && $panels['sections']) {
                                            foreach ($panels['sections'] as $section) { ?>
                                                <div class="about-items-wrap">
                                                    <?php if (isset($section['icon']) && $section['icon']) { ?>
                                                        <span class="about-items-icon dashicons <?php echo esc_attr($section['icon']); ?>"></span>
                                                    <?php } ?>
                                                    <?php if (isset($section['title']) && $section['title'] && isset($section['url']) && $section['url']) { ?>
                                                        <span class="about-items-title">
                                                <a href="<?php echo esc_url($section['url']); ?>"><?php echo esc_html($section['title']); ?></a>
                                            </span>
                                                    <?php } ?>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="about-content-panel">
                                <h2 class="about-panel-title"><?php esc_html_e('Recommended Plugins', 'boundlessnews'); ?></h2>
                                <div class="about-panel-items about-panel-1-columns">
                                    <?php foreach ($rec_plugins as $key => $plugin) {
                                        $plugin_info = plugins_api(
                                            'plugin_information',
                                            array(
                                                'slug' => sanitize_key(wp_unslash($key)),
                                                'fields' => array(
                                                    'sections' => false,
                                                ),
                                            )
                                        );
                                        $plugin_status = BoundlessNews_Getting_started::boundlessnews_plugin_status($plugin['class'], $key, $plugin['PluginFile']); ?>
                                        <div id="<?php echo 'boundlessnews-' . esc_attr($key); ?>"
                                             class="about-items-wrap">
                                            <div class="theme-recommended-plugin <?php if ($plugin_status['status'] == 'active') {
                                                echo 'recommended-plugin-active';
                                            } ?>">
                                                <?php if (isset($plugin_info->name)) { ?>
                                                    <a href="javascript:void(0)"><?php echo esc_html($plugin_info->name); ?></a>
                                                <?php } ?>
                                                <?php if (isset($plugin_status['status']) && isset($plugin_status['string'])) { ?>
                                                    <a class="recommended-plugin-status <?php echo 'twp-plugin-' . esc_attr($plugin_status['status']); ?>"
                                                       plugin-status="<?php echo esc_attr($plugin_status['status']); ?>"
                                                       plugin-file="<?php echo esc_attr($plugin['PluginFile']); ?>"
                                                       plugin-folder="<?php echo esc_attr($key); ?>"
                                                       plugin-slug="<?php echo esc_attr($key); ?>"
                                                       plugin-class="<?php echo esc_attr($plugin['class']); ?>"
                                                       href="javascript:void(0)"><?php echo esc_html($plugin_status['string']); ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div id="about-panel-2" class="about-panel-item about-panel-compare about-panel-item-active">
                            <?php
                            $free_pro = $boundlessnews_panel_compare;
                            if (!empty($free_pro)) {
                                $defaults = array(
                                    'title' => '',
                                    'desc' => '',
                                    'free' => '',
                                    'pro' => '',
                                );
                                if (!empty($free_pro) && is_array($free_pro)) {
                                    echo '<div id="free_pro" class="theme-info-tab-pane theme-info-fre-pro">';
                                    echo '<table class="free-pro-table">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th></th>';
                                    echo '<th>' . $theme_name . '</th>';
                                    echo '<th>' . $pro_theme_name . '</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    foreach ($free_pro as $feature) {
                                        $instance = wp_parse_args((array)$feature, $defaults);
                                        /*allowed 7 value in array */
                                        $title = $instance['title'];
                                        $desc = $instance['desc'];
                                        $free = $instance['free'];
                                        $pro = $instance['pro'];
                                        echo '<tr>';
                                        if (!empty($title) || !empty($desc)) {
                                            echo '<td>';
                                            if (!empty($title)) {
                                                echo '<h3 class="compare-tabel-title">' . wp_kses_post($title) . '</h3>';
                                            }
                                            if (!empty($desc)) {
                                                echo '<p>' . wp_kses_post($desc) . '</p>';
                                            }
                                            echo '</td>';
                                        }
                                        if (!empty($free)) {
                                            if ('yes' === $free) {
                                                echo '<td class="theme-feature-check"><span class="dashicons-before dashicons-yes"></span></td>';
                                            } elseif ('no' === $free) {
                                                echo '<td class="theme-feature-cross"><span class="dashicons-before dashicons-no-alt"></span></td>';
                                            } else {
                                                echo '<td class="theme-feature-check">' . esc_html($free) . '</td>';
                                            }
                                        }
                                        if (!empty($pro)) {
                                            if ('yes' === $pro) {
                                                echo '<td class="theme-feature-check"><span class="dashicons-before dashicons-yes"></span></td>';
                                            } elseif ('no' === $pro) {
                                                echo '<td class="theme-feature-cross"><span class="dashicons-before dashicons-no-alt"></span></td>';
                                            } else {
                                                echo '<td class="theme-feature-check">' . esc_html($pro) . '</td>';
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div>';
                                }
                            } ?>
                        </div>
                        <div id="about-panel-3" class="about-panel-item about-panel-changelog">
                            <?php
                            WP_Filesystem();
                            global $wp_filesystem;
                            if (is_child_theme()) {
                                $changelog = $wp_filesystem->get_contents(get_stylesheet_directory() . '/classes/changelog.txt');
                            } else {
                                $changelog = $wp_filesystem->get_contents(get_template_directory() . '/classes/changelog.txt');
                            }
                            if (is_wp_error($changelog)) {
                                $changelog = '';
                            }
                            if (!empty($changelog)) {
                                echo '<div class="featured-section changelog">';
                                echo "<pre class='changelog'>";
                                echo $changelog;
                                echo "</pre>";
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="about-content-right">
                    <div class="about-content-panel">
                        <h2 class="about-panel-title"><span
                                    class="dashicons dashicons-sos"></span> <?php esc_html_e('Looking for help?', 'boundlessnews'); ?>
                        </h2>
                        <div class="about-content-info">
                            <p><?php esc_html_e('We have some resources available to help you in the right direction.', 'boundlessnews'); ?></p>
                            <ul>
                                <li>
                                    <a href="<?php echo esc_url('https://www.themeinwp.com/support/'); ?>"
                                       target="_blank"
                                       rel="noopener"><?php esc_html_e('Create a Ticket', 'boundlessnews'); ?>
                                        &#187;</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url('https://www.themeinwp.com/knowledgebase/'); ?>"
                                       target="_blank"
                                       rel="noopener"><?php esc_html_e('Knowledge Base', 'boundlessnews'); ?> &#187;</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url('https://docs.themeinwp.com/docs/boundlessnews'); ?>"
                                       target="_blank"
                                       rel="noopener"><?php esc_html_e('Theme Documentation', 'boundlessnews'); ?>
                                        &#187;</a>
                                </li>
                            </ul>
                            <p><?php esc_html_e('Behind every single customer support question stands a real person ready to fix the problem in real-time and guide you through.', 'boundlessnews'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-wrapper">
            <div class="about-wrapper-inner">
                <div class="about-content-full">
                    <div class="about-wrapper-footer">
                        <h2 class="about-panel-title"><?php printf(__('Purchase %1$s Pro and get instant access to all premium extensions, features and future updates.', 'boundlessnews'), esc_html($theme_name)); ?></h2>
                        <div class="about-footer-leftside">
                            <ul>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('Color Options', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('800+ Font Families', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('More Custom Widgets', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('More Customizer controls', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('More page/post meta options', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('Webmaster Tools', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('Remove Footer Attribution (copyright)', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-yes"></span><?php esc_html_e('VIP priority Support', 'boundlessnews'); ?>
                                </li>
                                <li>
                                    <span class="dashicons dashicons-plus"></span><?php esc_html_e('much more stuff...', 'boundlessnews'); ?>
                                </li>
                            </ul>
                        </div>
                        <div class="about-footer-rightside">
                            <div class="about-footer-upgrade">
                                <h3 class="footer-upgrade-title">
                                    <?php esc_html_e('Upgrade to Pro', 'boundlessnews'); ?>
                                </h3>
                                <div class="footer-upgrade-price">
                                    <sup><?php esc_html_e('$', 'boundlessnews'); ?></sup>
                                    <span><?php esc_html_e('59', 'boundlessnews'); ?></span>
                                </div>
                                <div class="footer-upgrade-link">
                                    <a target="_blank" class="button button-primary button-primary-upgrade" href="<?php echo esc_url($pro_theme_url); ?>"><?php esc_html_e('Upgrade to Pro', 'boundlessnews'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>