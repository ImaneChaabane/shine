<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Travel
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
	<?php 
        
        /**
         * @hooked blossom_travel_post_thumbnail - 20
        */
        do_action( 'blossom_travel_before_post_entry_content' );
        
        if( !is_single() ) echo '<div class="content-wrap">';
        
        /**
         * @hooked blossom_travel_entry_header  - 10 
         * @hooked blossom_travel_entry_content - 15
         * @hooked blossom_travel_entry_footer  - 20
        */
        do_action( 'blossom_travel_post_entry_content' );

        if( !is_single() ) echo '</div>';
    ?>
</article><!-- #post-<?php the_ID(); ?> -->