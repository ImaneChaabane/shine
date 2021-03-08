<?php
/**
 * Active Callback
 * 
 * @package Blossom_Travel
*/

/**
 * Active Callback for Banner Slider
*/
function blossom_travel_banner_ac( $control ){
    $banner      = $control->manager->get_setting( 'ed_banner_section' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'header_image' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_title' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_label' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_link' && $banner == 'static_banner' ) return true;

    return false;
}

/**
 * Active Callback for Blog View All Button
*/
function blossom_travel_blog_view_all_ac(){
    $blog = get_option( 'page_for_posts' );
    if( $blog ) return true;
    
    return false; 
}

/**
 * Active Callback for post/page
*/
function blossom_travel_post_page_ac( $control ){
    
    $ed_related = $control->manager->get_setting( 'ed_related' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'related_post_title' && $ed_related == true ) return true;
    if ( $control_id == 'ed_featured_image' ) return true;
    
    return false;
}

/**
 * Active Callback for Active Page
*/
function blossom_travel_is_active_page( $control ){
    
    if( is_front_page() && ! is_home() ) return true;
    
    return false;
}