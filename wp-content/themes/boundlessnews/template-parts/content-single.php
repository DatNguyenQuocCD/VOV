<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage BoundlessNews
 * @since 1.0.0
 */

$boundlessnews_default = boundlessnews_get_default_theme_options();
$boundlessnews_post_layout = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_post_layout', true ) );
$boundlessnews_ed_feature_image = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_ed_feature_image', true ) );

if( is_page() ){

	$boundlessnews_post_layout = get_post_meta(get_the_ID(), 'boundlessnews_page_layout', true);
	
}
if( $boundlessnews_post_layout == '' || $boundlessnews_post_layout == 'global-layout' ){
    
    $boundlessnews_post_layout = get_theme_mod( 'boundlessnews_single_post_layout',$boundlessnews_default['boundlessnews_single_post_layout'] );

}
	
	boundlessnews_disable_post_views();
boundlessnews_disable_post_like_dislike();

$boundlessnews_ed_post_views = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_ed_post_views', true ) );
$boundlessnews_ed_post_read_time = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_ed_post_read_time', true ) );
$boundlessnews_ed_post_author_box = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_ed_post_author_box', true ) );
$boundlessnews_ed_post_social_share = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_ed_post_social_share', true ) );
$boundlessnews_ed_post_reaction = esc_html( get_post_meta( get_the_ID(), 'boundlessnews_ed_post_reaction', true ) );

if( $boundlessnews_ed_post_read_time ){ boundlessnews_disable_post_read_time(); }
if( $boundlessnews_ed_post_author_box ){ boundlessnews_disable_post_author_box(); }
if( $boundlessnews_ed_post_reaction ){ boundlessnews_disable_post_reaction(); }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<?php

	if( empty( $boundlessnews_ed_feature_image ) && $boundlessnews_post_layout != 'layout-2' ){ ?>

		<div class="post-thumbnail">

			<?php boundlessnews_post_thumbnail(); ?>
			
		</div>

	<?php
	}

	if ( is_singular() && $boundlessnews_post_layout != 'layout-2' ) { ?>

		<header class="entry-header">

			<?php
			if ( 'post' === get_post_type() ) { ?>

				<div class="entry-meta">

					<?php boundlessnews_entry_footer( $cats = true, $tags = false, $edits = false, $text = false, $icon = false ); ?>

				</div>

			<?php  } ?>

			<h1 class="entry-title entry-title-large">

	            <?php the_title(); ?>

	        </h1>

		</header>

	<?php }

	if ( $boundlessnews_post_layout != 'layout-2' && is_single() && 'post' === get_post_type() ) { ?>

		<div class="entry-meta">

			<?php
			boundlessnews_posted_by();
			if( !$boundlessnews_ed_post_views ){ boundlessnews_post_view_count(); }
			?>

		</div>

	<?php  } ?>
	
	<div class="post-content-wrap">

		<?php if( is_singular() && empty( $boundlessnews_ed_post_social_share ) && class_exists( 'Booster_Extension_Class' ) && 'post' === get_post_type() ){ ?>

			<div class="post-content-share">
				<?php echo do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
			</div>

		<?php } ?>

		<div class="post-content">

			<div class="entry-content">

				<?php

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'boundlessnews' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				if( !class_exists('Booster_Extension_Class') || is_page() ):

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'boundlessnews'),
                        'after' => '</div>',
                    ));

                endif; ?>

			</div>

			<?php
			if ( is_singular() && 'post' === get_post_type() ) { ?>

				<div class="entry-footer">

                    <div class="entry-meta">
                         <?php boundlessnews_post_like_dislike(); ?>
                    </div>

                    <div class="entry-meta">
                        <?php boundlessnews_entry_footer( $cats = false, $tags = true, $edits = true ); ?>
                    </div>

				</div>

			<?php } ?>

		</div>

	</div>

</article>