<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Travel
 */
    /**
     * Doctype Hook
     * 
     * @hooked blossom_travel_doctype
    */
    do_action( 'blossom_travel_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked blossom_travel_head
    */
    do_action( 'blossom_travel_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php

    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked blossom_travel_page_start - 20  
    */
    do_action( 'blossom_travel_before_header' );
    
    /**
     * Header
     * 
     * @hooked blossom_travel_header - 20       
     * @hooked blossom_travel_responsive_nav - 30    
    */
    do_action( 'blossom_travel_header' );
    
    /**
     * Before Content
     * 
     * @hooked blossom_travel_banner  - 25
     * @hooked blossom_travel_trending_section  - 30
     * @hooked blossom_travel_featured_section  - 35
    */
    do_action( 'blossom_travel_after_header' );
    
    /**
     * Content
     * 
     * @hooked blossom_travel_content_start
    */
    do_action( 'blossom_travel_content' );