<?php
/**
 * Logo Section
 * 
 * @package Blossom_Travel
 */

if( is_active_sidebar( 'logo' ) ){ ?>
	<section id="logo_section" class="client-logo-section">
		<div class="container">
	    	<?php dynamic_sidebar( 'logo' ); ?>
		</div>
	</section> <!-- .client-logo-section -->
	<?php
}