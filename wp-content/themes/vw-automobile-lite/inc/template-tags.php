<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package VW Automobile Lite
 */

if ( ! function_exists( 'vw_automobile_lite_the_attached_image' ) ) :

function vw_automobile_lite_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'vw_automobile_lite_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
	wp_reset_postdata();
}
endif;

function vw_automobile_lite_categorized_blog() {
	if ( false === ( $vw_automobile_lite_all_the_cool_cats = get_transient( 'vw_automobile_lite_all_the_cool_cats' ) ) ) {
		$vw_automobile_lite_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		$vw_automobile_lite_all_the_cool_cats = count( $vw_automobile_lite_all_the_cool_cats );

		set_transient( 'vw_automobile_lite_all_the_cool_cats', $vw_automobile_lite_all_the_cool_cats );
	}

	if ( '1' != $vw_automobile_lite_all_the_cool_cats ) {
		return true;
	} else {
		return false;
	}
}

if ( ! function_exists( 'vw_automobile_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Twenty Sixteen 1.2
 */
function vw_automobile_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function vw_automobile_lite_category_transient_flusher() {
	delete_transient( 'vw_automobile_lite_all_the_cool_cats' );
}
add_action( 'edit_category', 'vw_automobile_lite_category_transient_flusher' );
add_action( 'save_post',     'vw_automobile_lite_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'vw_automobile_lite_my_admin_bar_css') );
function vw_automobile_lite_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}

/**
 * Posts pagination.
 */
if ( ! function_exists( 'vw_automobile_lite_blog_posts_pagination' ) ) {
	function vw_automobile_lite_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'vw_automobile_lite_blog_pagination_type', 'blog-page-numbers' );
		if ( $pagination_type == 'blog-page-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}