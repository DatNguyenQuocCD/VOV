<?php
/**
 * Slider Post Widgets.
 *
 * @package BoundlessNews
 */
if ( !function_exists('boundlessnews_slider_post_widgets') ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function boundlessnews_slider_post_widgets(){
        // Slider Post widget.
        register_widget('BoundlessNews_Sidebar_Slider_Posts_Widget');
    }
endif;
add_action('widgets_init', 'boundlessnews_slider_post_widgets');
// Slider Post widget
if ( !class_exists('BoundlessNews_Sidebar_Slider_Posts_Widget') ) :
    /**
     * Slider Post.
     *
     * @since 1.0.0
     */
    class BoundlessNews_Sidebar_Slider_Posts_Widget extends BoundlessNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'boundlessnews_slider_post_widget',
                'description' => esc_html__('Displays post form selected category specific for popular post in sidebars.', 'boundlessnews'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'boundlessnews'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'boundlessnews'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'boundlessnews'),
                ),
                'slider_excerpt' => array(
                    'label' => esc_html__('Enable Slider Excerpt', 'boundlessnews'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'slider_arrow' => array(
                    'label' => esc_html__('Slider Arrows:', 'boundlessnews'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'slider_dots' => array(
                    'label' => esc_html__('Slider Dots:', 'boundlessnews'),
                    'type' => 'checkbox',
                    'default' => false,
                ),
                'slider_autoplay' => array(
                    'label' => esc_html__('Slider Autoplay:', 'boundlessnews'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'boundlessnews'),
                    'type' => 'number',
                    'default' => 5,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 12,
                ),
            );
            parent::__construct( 'BoundlessNews-slider-posts', esc_html__('BoundlessNews: Slider Widget', 'boundlessnews'), $opts, array(), $fields );
        }
        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance )
        {
            $params = $this->get_params( $instance );
            echo $args['before_widget'];
            
                $section_category = isset( $params['post_category'] ) ? $params['post_category'] : '';
                $slider_arrows = isset( $params['slider_arrow'] ) ? $params['slider_arrow'] : '';
                $slider_excerpt = isset( $params['slider_excerpt'] ) ? $params['slider_excerpt'] : '';
                $slider_dots = isset( $params['slider_dots'] ) ? $params['slider_dots'] : '';
                $slider_autoplay = isset( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
                $post_number = isset( $params['post_number'] ) ? $params['post_number'] : '';

                $home_section_title = isset( $params['title'] ) ? $params['title'] : '';

                if( empty( $home_section_title ) && $section_category ){

                    $home_section_title = get_the_category_by_ID( $section_category );

                }

                $home_section_be = $args['before_title'] . esc_html( $home_section_title ) . $args['after_title'];

                $slider_post_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $post_number,'post__not_in' => get_option("sticky_posts"), 'cat' => esc_html( $section_category ) ) );

                if ( $slider_arrows == 'yes' || $slider_arrows == '' ) {
                    $arrow = 'true';
                }else{
                    $arrow = 'false';
                }
                if ( $slider_autoplay == 'yes' || $slider_autoplay == '' ) {
                    $autoplay = 'true';
                }else{
                    $autoplay = 'false';
                }
                if( $slider_dots == 'yes' ) {
                    $dots = 'true';
                }else {
                    $dots = 'false';
                }
                if( is_rtl() ) {
                    $rtl = 'true';
                }else{
                    $rtl = 'false';
                } ?>

                
                <div class="theme-block theme-block-widgetarea">

                    <?php if( $section_category || $home_section_title ){ ?>

                        <div class="column-row">
                            <div class="column column-12">
                                <header class="block-title-wrapper">

                                    <?php if( $home_section_title ){ ?>

                                        <?php echo $home_section_be; ?>

                                    <?php } ?>

                                    <?php if( $section_category ){

                                        $cat_link = get_category_link( $section_category ); ?>

                                        <div class="theme-heading-controls">
                                            <a href="<?php echo esc_url($cat_link); ?>" class="view-all-link">
                                                <span class="view-all-icon"><?php boundlessnews_the_theme_svg('plus'); ?></span>
                                                <span class="view-all-label"><?php echo esc_html_e('View All', 'boundlessnews'); ?></span>
                                            </a>
                                        </div>

                                    <?php } ?>
                                    
                                </header>
                            </div>
                        </div>

                    <?php } ?>

                    <?php
                    if ( $slider_post_query->have_posts() ): ?>

                        <div class="theme-slider-widget-main" data-slick='{"arrows": <?php echo esc_attr( $arrow ); ?>,"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'>

                            <?php while( $slider_post_query->have_posts() ){ 
                                $slider_post_query->the_post();
                                $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'boundlessnews-1600-700' );
                                $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>

                                <div class="theme-slider-item">
                                    <article id="theme-post-<?php the_ID(); ?>" <?php post_class('post-thumb post-thumb-slides'); ?>>
                                        <div class="data-bg data-bg-xl-large thumb-overlay thumb-overlay-darker img-hover-slide" data-background="<?php echo esc_url($featured_image); ?>">
                                            <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>
                                            <div class="article-content article-content-overlay">
                                                <div class="entry-meta">
                                                    <?php boundlessnews_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                                                </div>
                                                <h2 class="entry-title entry-title-large">
                                                    <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <div class="entry-meta">
                                                    <?php boundlessnews_post_view_count(); ?>
                                                    <?php boundlessnews_posted_by(); ?>
                                                </div>

                                                <?php if( $slider_excerpt ){ ?>
                                                    <div class="entry-content text-white hidden-xs-element">

                                                        <?php
                                                        if( has_excerpt() ){

                                                            the_excerpt();

                                                        }else{

                                                            echo '<p>';
                                                            echo esc_html( wp_trim_words( get_the_content(),60,'...' ) );
                                                            echo '</p>';

                                                        } ?>

                                                    </div>
                                                <?php } ?>
                                            
                                            </div>
                                        </div>
                                    </article>
                                </div>

                            <?php } ?>

                        </div>

                        <?php
                        wp_reset_postdata();
                    
                    endif; ?>

                </div>
                
            <?php
            echo $args['after_widget'];

        }
    }
endif;