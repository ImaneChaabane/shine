<?php
/**
 * Blossom Travel Customizer Partials
 *
 * @package Blossom_Travel
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_travel_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_travel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_travel_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_travel_get_read_more(){
    return esc_html( get_theme_mod( 'read_more_text', __( 'Read', 'blossom-travel' ) ) );    
}
endif;

if( ! function_exists( 'blossom_travel_get_banner_title' ) ) :
/**
 * Display banner title button
*/
function blossom_travel_get_banner_title(){
    return esc_html( get_theme_mod( 'banner_title' ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_banner_label' ) ) :
/**
 * Display banner title button
*/
function blossom_travel_get_banner_label(){
    return esc_html( get_theme_mod( 'banner_label' ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_author_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_travel_get_author_title(){
    return esc_html( get_theme_mod( 'author_title', __( 'About Author', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_travel_get_related_title(){
    return esc_html( get_theme_mod( 'related_post_title', __( 'You might also enjoy:', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_gallery_section_title' ) ) :
/**
 * Display gallery section title
*/
function blossom_travel_get_gallery_section_title(){
    return esc_html( get_theme_mod( 'gallery_section_title', __( 'Gallery', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_gallery_view_all' ) ) :
/**
 * Display gallery section view all
*/
function blossom_travel_get_gallery_view_all(){
    return esc_html( get_theme_mod( 'gallery_view_all', __( 'View More', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_fc_button_label' ) ) :
/**
 * Display featured category section view all
*/
function blossom_travel_get_fc_button_label(){
    return esc_html( get_theme_mod( 'fc_button_label', __( 'View More', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_product_title' ) ) :
/**
 * Display shop title
*/
function blossom_travel_get_product_title(){
    return esc_html( get_theme_mod( 'product_title', __( 'Get My Travel Guides', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_product_view_all' ) ) :
/**
 * Display shop button title
*/
function blossom_travel_get_product_view_all(){
    return esc_html( get_theme_mod( 'product_view_all', __( 'Get My Travel Guides', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_blog_section_title' ) ) :
/**
 * Display blog title
*/
function blossom_travel_get_blog_section_title(){
    return esc_html( get_theme_mod( 'blog_section_title', __( 'Explore all New Trending Stories', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_blog_view_all_btn' ) ) :
/**
 * Display blog view more button title
*/
function blossom_travel_get_blog_view_all_btn(){
    return esc_html( get_theme_mod( 'blog_view_all', __( 'View More', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_instagram_title' ) ) :
/**
 * Display instagram title
*/
function blossom_travel_get_instagram_title(){
    return esc_html( get_theme_mod( 'instagram_title', __( 'Instagram', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_related_portfolio_title' ) ) :
/**
 * Display Related portfolio title
*/
function blossom_travel_get_related_portfolio_title(){
    return esc_html( get_theme_mod( 'related_portfolio_title', __( 'Related Projects', 'blossom-travel' ) ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function blossom_travel_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( $copyright );
    }else{
        esc_html_e( '&copy; Copyright ', 'blossom-travel' );
        echo date_i18n( esc_html__( 'Y', 'blossom-travel' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'blossom-travel' );
    }
    echo '</span>'; 
}
endif;