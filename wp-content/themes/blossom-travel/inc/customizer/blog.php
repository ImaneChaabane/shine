<?php
/**
 * Blog Page Settings
 *
 * @package Blossom_Travel
 */

function blossom_travel_customize_register_blogpage( $wp_customize ) {
	if( get_option( 'page_on_front') ){
        $title = __( 'Blog Page Settings', 'blossom-travel' );
    }else {
        $title = __( 'Front Page Settings', 'blossom-travel' );
    }

    /** Blog Page Settings */
    $wp_customize->add_panel( 
        'blogpage_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => $title,
            'description' => __( 'Post Page settings.', 'blossom-travel' ),
        ) 
    );    
      
}
add_action( 'customize_register', 'blossom_travel_customize_register_blogpage' );