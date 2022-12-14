<?php
/**
 * Header file for the BoundlessNews WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage BoundlessNews
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if( function_exists('wp_body_open') ){
    wp_body_open();
} ?>

<?php
$boundlessnews_default = boundlessnews_get_default_theme_options();

$ed_preloader = get_theme_mod('ed_preloader',$boundlessnews_default['ed_preloader'] );
if( $ed_preloader ){ ?>

    <div class="preloader hide-no-js">
        <div class="preloader-wrapper">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

<?php } ?>

<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to the content', 'boundlessnews'); ?></a>

<?php
get_template_part( 'template-parts/header/header', 'content' ); ?>
<?php boundlessnews_header_banner(); ?>

<div id="content" class="site-content">

    <div class="site-content-extras">
        <?php

        if( is_home() || is_front_page() ){
            boundlessnews_top_tages();
            boundlessnews_header_ticker_posts();
        }
        ?>
    </div>