<?php
/**
 * Featured Section
 * 
 * @package Blossom_Travel
 */
if( is_active_sidebar( 'featured' ) ){ ?>
	<section id="featured_section" class="featured-section">
		<div class="container">
	    	<?php dynamic_sidebar( 'featured' ); ?>
	    </div>
	</section> <!-- .feature-section -->
	<?php
}