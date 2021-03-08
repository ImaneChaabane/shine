<?php
/**
 * Map Section
 * 
 * @package Blossom_Travel
 */
if( is_active_sidebar( 'map' ) ){ ?>
<section id="map_section" class="explore-destination-section">
	<div class="container">
    	<?php dynamic_sidebar( 'map' ); ?>
	</div>
</section> <!-- .explore-destination-section -->
<?php
}