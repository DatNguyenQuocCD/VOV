<?php

/**
 * BoundlessNews About Page
 * @package BoundlessNews
 *
*/

if( !class_exists('BoundlessNews_About_page') ):

	class BoundlessNews_About_page{

		function __construct(){

			add_action('admin_menu', array($this, 'boundlessnews_backend_menu'),999);

		}

		// Add Backend Menu
        function boundlessnews_backend_menu(){

            add_theme_page(esc_html__( 'BoundlessNews Options','boundlessnews' ), esc_html__( 'BoundlessNews Options','boundlessnews' ), 'activate_plugins', 'boundlessnews-about', array($this, 'boundlessnews_main_page'),1);

        }

        // Settings Form
        function boundlessnews_main_page(){

            require get_template_directory() . '/classes/about-render.php';

        }

	}

	new BoundlessNews_About_page();

endif;