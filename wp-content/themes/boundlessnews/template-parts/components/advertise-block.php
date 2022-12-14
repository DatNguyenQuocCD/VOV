<?php
/**
 * Advertise
 *
 * @package BoundlessNews
 */

function boundlessnews_advertise_block( $boundlessnews_home_section,$repeat_times ){

	$advertise_image = esc_html( isset($boundlessnews_home_section->advertise_image) ? $boundlessnews_home_section->advertise_image : '');
	$advertise_link = esc_html( isset($boundlessnews_home_section->advertise_link) ? $boundlessnews_home_section->advertise_link : '');
	if( $advertise_image ){
	?>

	<div class="theme-block theme-block-nospace theme-block-ava">
	    <div class="wrapper">
	        <div class="column-row">
	            <div class="column column-12">
	                <a href="<?php echo esc_url( $advertise_link ); ?>" target="_blank" class="home-lead-link">
	                    <img src="<?php echo esc_url( $advertise_image ); ?>" alt="<?php esc_attr_e('Advertise Image','boundlessnews'); ?>">
	                </a>
	            </div>
	        </div>
	    </div>
	</div>

	<?php
	}
	
} ?>