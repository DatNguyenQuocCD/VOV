<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BoundlessNews
 */

get_header();
?>
    <div class="singular-main-block">
        <header class="page-header theme-page-header theme-404-header">
            <div class="wrapper">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'boundlessnews'); ?></h1>
                ?>
            </div>
        </header>

        <div class="theme-block error-block error-block-search">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-8 column-sm-12">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-block error-block error-block-top">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <h2><?php esc_html_e('Maybe it’s out there, somewhere...', 'boundlessnews'); ?></h2>
                        <p><?php esc_html_e('You can always find insightful stories on our', 'boundlessnews'); ?>
                        <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Homepage','boundlessnews'); ?></a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-block error-block error-block-middle">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <h2><?php esc_html_e('Still feeling lost? You’re not alone.', 'boundlessnews'); ?></h2>
                        <p><?php esc_html_e('Enjoy these stories about getting lost, losing things, and finding what you never knew you were looking for.', 'boundlessnews'); ?></p>
                    </div>
                </div>
            </div>
        </div>


    </div>

<?php
get_footer();
