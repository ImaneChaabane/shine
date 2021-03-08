<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Travel
 */
    
    /**
     * After Content
     * 
     * @hooked blossom_travel_content_end - 20
    */
    do_action( 'blossom_travel_before_footer' );
    
    /**
     * Footer
     * 
     * @hooked blossom_travel_footer_start  - 20
     * @hooked blossom_travel_footer_top    - 30
     * @hooked blossom_travel_footer_bottom - 40
     * @hooked blossom_travel_back_to_top   - 45
     * @hooked blossom_travel_footer_end    - 50
    */
    do_action( 'blossom_travel_footer' );
    
    /**
     * After Footer
     * 
     * @hooked blossom_travel_page_end    - 20
    */
    do_action( 'blossom_travel_after_footer' );

    wp_footer(); ?>

</body>
</html>