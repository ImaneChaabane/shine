<?php
/**
 * Instagram Section
 * 
 * @package Blossom_Travel
 */

$sec_title      = get_theme_mod( 'instagram_title', __( 'Instagram', 'blossom-travel' ) );

if( blossom_travel_is_btif_activated() ){
    $ed_instagram = get_theme_mod( 'ed_instagram', true );
    if( $ed_instagram ){
        echo '<div id="instagram_section" class="instagram-section">';
        if( $sec_title ) echo '<h2 class="section-title">' . esc_html( $sec_title ) . '</h2>';
        echo do_shortcode( '[blossomthemes_instagram_feed]' );
        echo '</div>';    
    }
}