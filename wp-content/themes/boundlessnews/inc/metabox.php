<?php
/**
* Sidebar Metabox.
*
* @package BoundlessNews
*/
 
add_action( 'add_meta_boxes', 'boundlessnews_metabox' );

if( ! function_exists( 'boundlessnews_metabox' ) ):


    function  boundlessnews_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'boundlessnews' ),
            'boundlessnews_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'boundlessnews' ),
            'boundlessnews_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$boundlessnews_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'boundlessnews' ),
    'layout-2' => esc_html__( 'Banner Layout', 'boundlessnews' ),
);

$boundlessnews_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'boundlessnews' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'boundlessnews' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'boundlessnews' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'boundlessnews' ),
                ),
);

$boundlessnews_post_layout_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'boundlessnews' ),
    'layout-1' => esc_html__( 'Simple Layout', 'boundlessnews' ),
    'layout-2' => esc_html__( 'Banner Layout', 'boundlessnews' ),
);

$boundlessnews_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'boundlessnews' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'boundlessnews' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'boundlessnews_post_metafield_callback' ) ):
    
    function boundlessnews_post_metafield_callback() {
        global $post, $boundlessnews_post_sidebar_fields, $boundlessnews_post_layout_options,  $boundlessnews_page_layout_options, $boundlessnews_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'boundlessnews_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'boundlessnews'); ?>

                        </a>
                    </li>

                    <li>
                        <a id="metabox-navbar-appearance" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'boundlessnews'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'boundlessnews'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','boundlessnews'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $boundlessnews_post_sidebar = esc_html( get_post_meta( $post->ID, 'boundlessnews_post_sidebar_option', true ) );
                            if( $boundlessnews_post_sidebar == '' ){ $boundlessnews_post_sidebar = 'global-sidebar'; }

                            foreach ( $boundlessnews_post_sidebar_fields as $boundlessnews_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="boundlessnews_post_sidebar_option" value="<?php echo esc_attr( $boundlessnews_post_sidebar_field['value'] ); ?>" <?php if( $boundlessnews_post_sidebar_field['value'] == $boundlessnews_post_sidebar ){ echo "checked='checked'";} if( empty( $boundlessnews_post_sidebar ) && $boundlessnews_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $boundlessnews_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','boundlessnews'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $boundlessnews_page_layout = esc_html( get_post_meta( $post->ID, 'boundlessnews_page_layout', true ) );
                                if( $boundlessnews_page_layout == '' ){ $boundlessnews_page_layout = 'layout-1'; }

                                foreach ( $boundlessnews_page_layout_options as $key => $boundlessnews_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="boundlessnews_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $boundlessnews_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $boundlessnews_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','boundlessnews'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $boundlessnews_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'boundlessnews_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="boundlessnews-header-overlay" name="boundlessnews_ed_header_overlay" value="1" <?php if( $boundlessnews_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="boundlessnews-header-overlay"><?php esc_html_e( 'Enable Header Overlay','boundlessnews' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','boundlessnews'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $boundlessnews_post_layout = esc_html( get_post_meta( $post->ID, 'boundlessnews_post_layout', true ) );
                                if( $boundlessnews_post_layout == '' ){ $boundlessnews_post_layout = 'global-layout'; }

                                foreach ( $boundlessnews_post_layout_options as $key => $boundlessnews_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="boundlessnews_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $boundlessnews_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $boundlessnews_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','boundlessnews'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $boundlessnews_header_overlay = esc_html( get_post_meta( $post->ID, 'boundlessnews_header_overlay', true ) );
                                if( $boundlessnews_header_overlay == '' ){ $boundlessnews_header_overlay = 'global-layout'; }

                                foreach ( $boundlessnews_header_overlay_options as $key => $boundlessnews_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="boundlessnews_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $boundlessnews_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $boundlessnews_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Feature Image Setting','boundlessnews'); ?></h3>

                        <div class="metabox-opt-wrap theme-checkbox-wrap">

                            <?php
                            $boundlessnews_ed_feature_image = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_feature_image', true ) ); ?>

                            <input type="checkbox" id="boundlessnews-ed-feature-image" name="boundlessnews_ed_feature_image" value="1" <?php if( $boundlessnews_ed_feature_image ){ echo "checked='checked'";} ?>/>

                            <label for="boundlessnews-ed-feature-image"><?php esc_html_e( 'Disable Feature Image','boundlessnews' ); ?></label>


                        </div>

                    </div>

                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Navigation Setting','boundlessnews'); ?></h3>

                        <?php $twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Navigation Type','boundlessnews' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php esc_html_e('Global Layout','boundlessnews'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php esc_html_e('Disable Navigation','boundlessnews'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php esc_html_e('Next Previous Navigation','boundlessnews'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php esc_html_e('Ajax Load Next 3 Posts Contents','boundlessnews'); ?></option>

                            </select>

                        </div>
                    </div>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Video Aspect Ration Setting','boundlessnews'); ?></h3>

                        <?php $twp_aspect_ratio = esc_attr( get_post_meta($post->ID, 'twp_aspect_ratio', true) ); ?>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Video Aspect Ratio','boundlessnews' ); ?></b></label>

                            <select name="twp_aspect_ratio">

                                <option <?php if( $twp_aspect_ratio == '' || $twp_aspect_ratio == 'global' ){ echo 'selected'; } ?> value="global"><?php esc_html_e('Global','boundlessnews'); ?></option>

                                <option <?php if( $twp_aspect_ratio == '' || $twp_aspect_ratio == 'default' ){ echo 'selected'; } ?> value="default"><?php esc_html_e('Default','boundlessnews'); ?></option>

                                <option <?php if( $twp_aspect_ratio == 'square' ){ echo 'selected'; } ?> value="square"><?php esc_html_e('Square','boundlessnews'); ?></option>

                                <option <?php if( $twp_aspect_ratio == 'portrait' ){ echo 'selected'; } ?> value="portrait"><?php esc_html_e('Portrait','boundlessnews'); ?></option>

                                <option <?php if( $twp_aspect_ratio == 'landscape' ){ echo 'selected'; } ?> value="landscape"><?php esc_html_e('Landscape','boundlessnews'); ?></option>

                            </select>

                        </div>

                    </div>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Video Autoplay','boundlessnews'); ?></h3>

                        <?php $twp_video_autoplay = esc_attr( get_post_meta($post->ID, 'twp_video_autoplay', true) ); ?>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Video Autoplay','boundlessnews' ); ?></b></label>

                            <select name="twp_video_autoplay">

                                <option <?php if( $twp_video_autoplay == '' || $twp_video_autoplay == 'global' ){ echo 'selected'; } ?> value="global"><?php esc_html_e('Global','boundlessnews'); ?></option>

                                <option <?php if( $twp_video_autoplay == 'autoplay-enable' ){ echo 'selected'; } ?> value="autoplay-enable"><?php esc_html_e('Enable Autoplay','boundlessnews'); ?></option>

                                <option <?php if( $twp_video_autoplay == 'autoplay-disable' ){ echo 'selected'; } ?> value="autoplay-disable"><?php esc_html_e('Disable Autoplay','boundlessnews'); ?></option>


                            </select>

                        </div>

                    </div>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $boundlessnews_ed_post_views = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_views', true ) );
                    $boundlessnews_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_read_time', true ) );
                    $boundlessnews_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_like_dislike', true ) );
                    $boundlessnews_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_author_box', true ) );
                    $boundlessnews_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_social_share', true ) );
                    $boundlessnews_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_reaction', true ) );
                    $boundlessnews_ed_post_rating = esc_html( get_post_meta( $post->ID, 'boundlessnews_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','boundlessnews'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-views" name="boundlessnews_ed_post_views" value="1" <?php if( $boundlessnews_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-views"><?php esc_html_e( 'Disable Post Views','boundlessnews' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-read-time" name="boundlessnews_ed_post_read_time" value="1" <?php if( $boundlessnews_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','boundlessnews' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-like-dislike" name="boundlessnews_ed_post_like_dislike" value="1" <?php if( $boundlessnews_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','boundlessnews' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-author-box" name="boundlessnews_ed_post_author_box" value="1" <?php if( $boundlessnews_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','boundlessnews' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-social-share" name="boundlessnews_ed_post_social_share" value="1" <?php if( $boundlessnews_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','boundlessnews' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-reaction" name="boundlessnews_ed_post_reaction" value="1" <?php if( $boundlessnews_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','boundlessnews' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="boundlessnews-ed-post-rating" name="boundlessnews_ed_post_rating" value="1" <?php if( $boundlessnews_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="boundlessnews-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','boundlessnews' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'boundlessnews_save_post_meta' );

if( ! function_exists( 'boundlessnews_save_post_meta' ) ):

    function boundlessnews_save_post_meta( $post_id ) {

        global $post, $boundlessnews_post_sidebar_fields, $boundlessnews_post_layout_options, $boundlessnews_header_overlay_options,  $boundlessnews_page_layout_options;

        if ( !isset( $_POST[ 'boundlessnews_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['boundlessnews_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $boundlessnews_post_sidebar_fields as $boundlessnews_post_sidebar_field ) {
            

                $old = esc_html( get_post_meta( $post_id, 'boundlessnews_post_sidebar_option', true ) );
                $new = isset( $_POST['boundlessnews_post_sidebar_option'] ) ? boundlessnews_sanitize_sidebar_option_meta( wp_unslash( $_POST['boundlessnews_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'boundlessnews_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'boundlessnews_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? boundlessnews_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $boundlessnews_post_layout_options as $boundlessnews_post_layout_option ) {
            
            $boundlessnews_post_layout_old = esc_html( get_post_meta( $post_id, 'boundlessnews_post_layout', true ) );
            $boundlessnews_post_layout_new = isset( $_POST['boundlessnews_post_layout'] ) ? boundlessnews_sanitize_post_layout_option_meta( wp_unslash( $_POST['boundlessnews_post_layout'] ) ) : '';

            if ( $boundlessnews_post_layout_new && $boundlessnews_post_layout_new != $boundlessnews_post_layout_old ){

                update_post_meta ( $post_id, 'boundlessnews_post_layout', $boundlessnews_post_layout_new );

            }elseif( '' == $boundlessnews_post_layout_new && $boundlessnews_post_layout_old ) {

                delete_post_meta( $post_id,'boundlessnews_post_layout', $boundlessnews_post_layout_old );

            }
            
        }



        foreach ( $boundlessnews_header_overlay_options as $boundlessnews_header_overlay_option ) {
            
            $boundlessnews_header_overlay_old = esc_html( get_post_meta( $post_id, 'boundlessnews_header_overlay', true ) );
            $boundlessnews_header_overlay_new = isset( $_POST['boundlessnews_header_overlay'] ) ? boundlessnews_sanitize_header_overlay_option_meta( wp_unslash( $_POST['boundlessnews_header_overlay'] ) ) : '';

            if ( $boundlessnews_header_overlay_new && $boundlessnews_header_overlay_new != $boundlessnews_header_overlay_old ){

                update_post_meta ( $post_id, 'boundlessnews_header_overlay', $boundlessnews_header_overlay_new );

            }elseif( '' == $boundlessnews_header_overlay_new && $boundlessnews_header_overlay_old ) {

                delete_post_meta( $post_id,'boundlessnews_header_overlay', $boundlessnews_header_overlay_old );

            }
            
        }



        $boundlessnews_ed_feature_image_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_feature_image', true ) );
        $boundlessnews_ed_feature_image_new = isset( $_POST['boundlessnews_ed_feature_image'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_feature_image'] ) ) : '';

        if ( $boundlessnews_ed_feature_image_new && $boundlessnews_ed_feature_image_new != $boundlessnews_ed_feature_image_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_feature_image', $boundlessnews_ed_feature_image_new );

        }elseif( '' == $boundlessnews_ed_feature_image_new && $boundlessnews_ed_feature_image_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_feature_image', $boundlessnews_ed_feature_image_old );

        }



        $boundlessnews_ed_post_views_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_views', true ) );
        $boundlessnews_ed_post_views_new = isset( $_POST['boundlessnews_ed_post_views'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_views'] ) ) : '';

        if ( $boundlessnews_ed_post_views_new && $boundlessnews_ed_post_views_new != $boundlessnews_ed_post_views_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_views', $boundlessnews_ed_post_views_new );

        }elseif( '' == $boundlessnews_ed_post_views_new && $boundlessnews_ed_post_views_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_views', $boundlessnews_ed_post_views_old );

        }



        $boundlessnews_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_read_time', true ) );
        $boundlessnews_ed_post_read_time_new = isset( $_POST['boundlessnews_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_read_time'] ) ) : '';

        if ( $boundlessnews_ed_post_read_time_new && $boundlessnews_ed_post_read_time_new != $boundlessnews_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_read_time', $boundlessnews_ed_post_read_time_new );

        }elseif( '' == $boundlessnews_ed_post_read_time_new && $boundlessnews_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_read_time', $boundlessnews_ed_post_read_time_old );

        }



        $boundlessnews_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_like_dislike', true ) );
        $boundlessnews_ed_post_like_dislike_new = isset( $_POST['boundlessnews_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_like_dislike'] ) ) : '';

        if ( $boundlessnews_ed_post_like_dislike_new && $boundlessnews_ed_post_like_dislike_new != $boundlessnews_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_like_dislike', $boundlessnews_ed_post_like_dislike_new );

        }elseif( '' == $boundlessnews_ed_post_like_dislike_new && $boundlessnews_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_like_dislike', $boundlessnews_ed_post_like_dislike_old );

        }



        $boundlessnews_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_author_box', true ) );
        $boundlessnews_ed_post_author_box_new = isset( $_POST['boundlessnews_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_author_box'] ) ) : '';

        if ( $boundlessnews_ed_post_author_box_new && $boundlessnews_ed_post_author_box_new != $boundlessnews_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_author_box', $boundlessnews_ed_post_author_box_new );

        }elseif( '' == $boundlessnews_ed_post_author_box_new && $boundlessnews_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_author_box', $boundlessnews_ed_post_author_box_old );

        }



        $boundlessnews_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_social_share', true ) );
        $boundlessnews_ed_post_social_share_new = isset( $_POST['boundlessnews_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_social_share'] ) ) : '';

        if ( $boundlessnews_ed_post_social_share_new && $boundlessnews_ed_post_social_share_new != $boundlessnews_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_social_share', $boundlessnews_ed_post_social_share_new );

        }elseif( '' == $boundlessnews_ed_post_social_share_new && $boundlessnews_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_social_share', $boundlessnews_ed_post_social_share_old );

        }



        $boundlessnews_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_reaction', true ) );
        $boundlessnews_ed_post_reaction_new = isset( $_POST['boundlessnews_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_reaction'] ) ) : '';

        if ( $boundlessnews_ed_post_reaction_new && $boundlessnews_ed_post_reaction_new != $boundlessnews_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_reaction', $boundlessnews_ed_post_reaction_new );

        }elseif( '' == $boundlessnews_ed_post_reaction_new && $boundlessnews_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_reaction', $boundlessnews_ed_post_reaction_old );

        }



        $boundlessnews_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'boundlessnews_ed_post_rating', true ) );
        $boundlessnews_ed_post_rating_new = isset( $_POST['boundlessnews_ed_post_rating'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_post_rating'] ) ) : '';

        if ( $boundlessnews_ed_post_rating_new && $boundlessnews_ed_post_rating_new != $boundlessnews_ed_post_rating_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_post_rating', $boundlessnews_ed_post_rating_new );

        }elseif( '' == $boundlessnews_ed_post_rating_new && $boundlessnews_ed_post_rating_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_post_rating', $boundlessnews_ed_post_rating_old );

        }

        foreach ( $boundlessnews_page_layout_options as $boundlessnews_post_layout_option ) {
        
            $boundlessnews_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'boundlessnews_page_layout', true ) );
            $boundlessnews_page_layout_new = isset( $_POST['boundlessnews_page_layout'] ) ? boundlessnews_sanitize_post_layout_option_meta( wp_unslash( $_POST['boundlessnews_page_layout'] ) ) : '';

            if ( $boundlessnews_page_layout_new && $boundlessnews_page_layout_new != $boundlessnews_page_layout_old ){

                update_post_meta ( $post_id, 'boundlessnews_page_layout', $boundlessnews_page_layout_new );

            }elseif( '' == $boundlessnews_page_layout_new && $boundlessnews_page_layout_old ) {

                delete_post_meta( $post_id,'boundlessnews_page_layout', $boundlessnews_page_layout_old );

            }
            
        }

        $boundlessnews_ed_header_overlay_old = absint( get_post_meta( $post_id, 'boundlessnews_ed_header_overlay', true ) );
        $boundlessnews_ed_header_overlay_new = isset( $_POST['boundlessnews_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['boundlessnews_ed_header_overlay'] ) ) : '';

        if ( $boundlessnews_ed_header_overlay_new && $boundlessnews_ed_header_overlay_new != $boundlessnews_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'boundlessnews_ed_header_overlay', $boundlessnews_ed_header_overlay_new );

        }elseif( '' == $boundlessnews_ed_header_overlay_new && $boundlessnews_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'boundlessnews_ed_header_overlay', $boundlessnews_ed_header_overlay_old );

        }

        $twp_aspect_ratio_old = esc_attr( get_post_meta( $post_id, 'twp_aspect_ratio', true ) );

        $twp_aspect_ratio_new = '';
        if( isset( $_POST['twp_aspect_ratio'] ) ){

            $twp_aspect_ratio_new = isset( $_POST['twp_aspect_ratio'] ) ? sanitize_text_field( wp_unslash( $_POST['twp_aspect_ratio'] ) ) : '';

        }

        if( $twp_aspect_ratio_new && $twp_aspect_ratio_new != $twp_aspect_ratio_old ){

            update_post_meta ( $post_id, 'twp_aspect_ratio', $twp_aspect_ratio_new );

        }elseif( '' == $twp_aspect_ratio_new && $twp_aspect_ratio_old ) {

            delete_post_meta( $post_id,'twp_aspect_ratio', $twp_aspect_ratio_old );

        }

        $twp_video_autoplay_old = esc_attr( get_post_meta( $post_id, 'twp_video_autoplay', true ) );

        $twp_video_autoplay_new = '';
        if( isset( $_POST['twp_video_autoplay'] ) ){

            $twp_video_autoplay_new = isset( $_POST['twp_video_autoplay'] ) ? sanitize_text_field( wp_unslash( $_POST['twp_video_autoplay'] ) ) : '';

        }

        if( $twp_video_autoplay_new && $twp_video_autoplay_new != $twp_video_autoplay_old ){

            update_post_meta ( $post_id, 'twp_video_autoplay', $twp_video_autoplay_new );

        }elseif( '' == $twp_video_autoplay_new && $twp_video_autoplay_old ) {

            delete_post_meta( $post_id,'twp_video_autoplay', $twp_video_autoplay_old );

        }
        
    }

endif;   