<?php
/**
 * Blossom Travel Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Blossom_Travel
 */

function blossom_travel_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'blossom-travel' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'blossom-travel' ),
        ),
        'logo' => array(
            'name'        => __( 'Client Logo Section', 'blossom-travel' ),
            'id'          => 'logo', 
            'description' => __( 'Add "Blossom: Client Logo Widget" for client logo section.', 'blossom-travel' ),
        ),
        'about' => array(
            'name'        => __( 'About Section', 'blossom-travel' ),
            'id'          => 'about', 
            'description' => __( 'Add "Blossom: Featured Page Widget" for about section.', 'blossom-travel' ),
        ),
        'featured' => array(
            'name'        => __( 'Featured Section', 'blossom-travel' ),
            'id'          => 'featured', 
            'description' => __( 'Add "Blossom: Image Text" widget for featured section. For featured section images, use same size images. If the images are of different sizes please regenerate those thumbnails.', 'blossom-travel' ),
        ),
        'map' => array(
            'name'        => __( 'Map Section', 'blossom-travel' ),
            'id'          => 'map', 
            'description' => __( 'Add "Custom HTML" widget for map section.', 'blossom-travel' ),
        ),
        'cta' => array(
            'name'        => __( 'Call To Action Section', 'blossom-travel' ),
            'id'          => 'cta', 
            'description' => __( 'Add "Blossom: Call To Action" widget for Call to Action section.', 'blossom-travel' ),
        ),
        'newsletter'   => array(
            'name'        => __( 'Newsletter Section', 'blossom-travel' ),
            'id'          => 'newsletter', 
            'description' => __( 'Add "BlossomThemes: Email Newsletter Widget" for newsletter section.', 'blossom-travel' ),
        ),
        'blog-trending' => array(
            'name'        => __( 'Trending Section', 'blossom-travel' ),
            'id'          => 'blog-trending', 
            'description' => __( 'Add "Blossom: Recent Post" widget for blog trending section.', 'blossom-travel' ),
        ),
        'blog-featured' => array(
            'name'        => __( 'Featured Blog Section', 'blossom-travel' ),
            'id'          => 'blog-featured', 
            'description' => __( 'Add "Blossom: Image Text" widget for blog featured section.', 'blossom-travel' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'blossom-travel' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'blossom-travel' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'blossom-travel' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'blossom-travel' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'blossom-travel' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'blossom-travel' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'blossom-travel' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'blossom-travel' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name">',
    		'after_title'   => '</h2>',
    	) );
    }
}
add_action( 'widgets_init', 'blossom_travel_widgets_init' );