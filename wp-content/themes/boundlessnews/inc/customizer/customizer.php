<?php
/**
 * BoundlessNews Theme Customizer
 *
 * @package BoundlessNews
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('boundlessnews_customize_register')) :

function boundlessnews_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/active-callback.php';
	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/layout.php';
	require get_template_directory() . '/inc/customizer/preloader.php';
	require get_template_directory() . '/inc/customizer/top-header.php';
	require get_template_directory() . '/inc/customizer/header.php';
	require get_template_directory() . '/inc/customizer/repeater.php';
	require get_template_directory() . '/inc/customizer/pagination.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/single.php';
	require get_template_directory() . '/inc/customizer/footer.php';

	$wp_customize->get_section( 'colors' )->panel = 'theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','boundlessnews');
	$wp_customize->get_section( 'title_tagline' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'theme_general_settings';
    

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'boundlessnews_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'boundlessnews_customize_partial_blogdescription',
		) );
	}

	// Theme Options Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'boundlessnews' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'boundlessnews' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'boundlessnews' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'theme_template_pannel',
		array(
			'title'      => esc_html__( 'Template Settings', 'boundlessnews' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'BoundlessNews_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new BoundlessNews_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'BoundlessNews Pro', 'boundlessnews' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'boundlessnews' ),
				'pro_url'  => esc_url('https://www.themeinwp.com/theme/boundlessnews-pro/'),
				'priority'  => 1,
			)
		)
	);

}

endif;
add_action( 'customize_register', 'boundlessnews_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('boundlessnews_customizer_scripts')) :

    function boundlessnews_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('boundlessnews-customizer', get_template_directory_uri() . '/assets/lib/custom/css/customizer.css');
        wp_enqueue_script('boundlessnews-customizer', get_template_directory_uri() . '/assets/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('boundlessnews_customizer_ajax_nonce');
        wp_localize_script( 
		    'boundlessnews-customizer',
		    'boundlessnews_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'boundlessnews_customizer_scripts');
add_action('customize_controls_init', 'boundlessnews_customizer_scripts');

/**
 * Customizer Enqueue scripts and styles.
 */
function boundlessnews_customizer_repearer(){
	
	wp_enqueue_style('boundlessnews-repeater', get_template_directory_uri() . '/assets/lib/custom/css/repeater.css');
    wp_enqueue_script('boundlessnews-repeater', get_template_directory_uri() . '/assets/lib/custom/js/repeater.js', array('jquery','customize-controls'), '', 1);

    $boundlessnews_post_category_list = boundlessnews_post_category_list();

    $cat_option = '';

    if( $boundlessnews_post_category_list ){
	    foreach( $boundlessnews_post_category_list as $key => $cats ){
	    	$cat_option .= "<option value='". esc_attr( $key )."'>". esc_html( $cats )."</option>";
	    }
	}

    wp_localize_script( 
        'boundlessnews-repeater',
        'boundlessnews_repeater',
        array(
            'optionns'   => "
            				<option value='banner-blocks-1'>". esc_html__('Slider & Tab Block','boundlessnews')."</option>
            				<option value='main-banner'>". esc_html__('Slider & Vertical Slider','boundlessnews')."</option>
            				<option value='latest-posts-blocks'>". esc_html__('Latest Posts Block','boundlessnews')."</option>
            				<option value='slider-blocks-1'>". esc_html__('Slider Block Style 1','boundlessnews')."</option>
            				<option value='slider-blocks-2'>". esc_html__('Slider Block Style 2','boundlessnews')."</option>
            				<option selected='selected' value='tiles-blocks'>". esc_html__('Tiles Block','boundlessnews')."</option>
        					<option value='advertise-blocks'>". esc_html__('Advertise Block','boundlessnews')."</option>
        					<option value='carousel-blocks'>". esc_html__('Carousel Block','boundlessnews')."</option>
            				<option value='home-widget-area'>". esc_html__('Widgets Area Block','boundlessnews')."</option",
           	'categories'   => $cat_option,
            'new_section'   =>  esc_html__('New Section','boundlessnews'),
            'upload_image'   =>  esc_html__('Choose Image','boundlessnews'),
            'use_image'   =>  esc_html__('Select','boundlessnews'),
         )
    );

    wp_localize_script( 
        'boundlessnews-customizer',
        'boundlessnews_customizer',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
         )
    );
}

add_action('customize_controls_enqueue_scripts', 'boundlessnews_customizer_repearer');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('boundlessnews_customize_partial_blogname')) :

	function boundlessnews_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('boundlessnews_customize_partial_blogdescription')) :

	function boundlessnews_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function boundlessnews_customize_preview_js() {
	wp_enqueue_script( 'boundlessnews-customizer-preview', get_template_directory_uri() . '/assets/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'boundlessnews_customize_preview_js' );