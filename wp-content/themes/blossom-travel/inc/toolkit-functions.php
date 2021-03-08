<?php
/**
 * Toolkit Filters
 *
 * @package Blossom_Travel
 */

if( ! function_exists( 'blossom_travel_default_cta_color' ) ) :
    function blossom_travel_default_cta_color(){
        return '#fff9f8';
    }
endif;
add_filter( 'bttk_cta_bg_color', 'blossom_travel_default_cta_color' );

if( ! function_exists( 'blossom_travel_default_image_text_image_size' ) ) :
    function blossom_travel_default_image_text_image_size(){
        return 'blossom-travel-normal-size';
    }
endif;
add_filter( 'bttk_it_img_size', 'blossom_travel_default_image_text_image_size' );


if( ! function_exists( 'blossom_travel_default_recent_post_image_size' ) ) :
    function blossom_travel_default_recent_post_image_size(){
        return 'blossom-travel-blog-two';
    }
endif;
add_filter( 'bttk_recent_post_size', 'blossom_travel_default_recent_post_image_size' );

if( ! function_exists( 'blossom_travel_newsletter_bg_image_size' ) ) :
    function blossom_travel_newsletter_bg_image_size(){
        return 'full';
    }
endif;
add_filter( 'bt_newsletter_img_size', 'blossom_travel_newsletter_bg_image_size' );

if( ! function_exists( 'blossom_travel_ad_image' ) ) :
    function blossom_travel_ad_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_ad_img_size', 'blossom_travel_ad_image' );

if( ! function_exists( 'blossom_travel_newsletter_bg_color' ) ) :
    function blossom_travel_newsletter_bg_color(){
        return '#e4bfb6';
    }
endif;
add_filter( 'bt_newsletter_bg_color_setting', 'blossom_travel_newsletter_bg_color' );

if( ! function_exists( 'blossom_travel_author_image' ) ) :
   function blossom_travel_author_image(){
       return 'blossom-travel-blog-list';
   }
endif;
add_filter( 'author_bio_img_size', 'blossom_travel_author_image' );