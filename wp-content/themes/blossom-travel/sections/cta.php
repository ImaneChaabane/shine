<?php
/**
 * CTA Section
 * 
 * @package Blossom_Travel
 */
if( is_active_sidebar( 'cta' ) ){ ?>
	<section id="cta_section" class="cta-section">
	    <?php dynamic_sidebar( 'cta' ); ?>
	</section> <!-- .bg-cta-section -->
	<?php
}