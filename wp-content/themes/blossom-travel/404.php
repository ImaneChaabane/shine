<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Blossom_Travel
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<div class="page-content">
					<div class="error-num"><?php esc_html_e( '404', 'blossom-travel' ); ?></div>
					<a class="btn-readmore" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Take me to the home page', 'blossom-travel' ); ?></a>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	    <?php
	    /**
	     * @see blossom_travel_latest_posts
	    */
	    do_action( 'blossom_travel_latest_posts' ); ?>
	</div><!-- #primary -->
<?php     
get_footer();