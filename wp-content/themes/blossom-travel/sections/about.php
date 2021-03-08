<?php
/**
 * About Section
 * 
 * @package Blossom_Travel
 */
if( is_active_sidebar( 'about' ) ){ ?>
<section id="about_section" class="about-section">
	<div class="container">
    	<?php dynamic_sidebar( 'about' ); ?>
    </div>
</section><!-- .about-section -->
<?php
}