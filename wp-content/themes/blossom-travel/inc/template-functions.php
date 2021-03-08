<?php
/**
 * Blossom Travel Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Travel
 */

if( ! function_exists( 'blossom_travel_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_travel_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_travel_doctype', 'blossom_travel_doctype' );

if( ! function_exists( 'blossom_travel_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_travel_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_travel_before_wp_head', 'blossom_travel_head' );

if( ! function_exists( 'blossom_travel_page_start' ) ) :
/**
 * Page Start
*/
function blossom_travel_page_start(){ ?>
    <div id="page" class="site">
    <a class="skip-link" href="#content"><?php esc_html_e( 'Skip to Content', 'blossom-travel' ); ?></a>
    <?php
}
endif;
add_action( 'blossom_travel_before_header', 'blossom_travel_page_start', 20 );

if( ! function_exists( 'blossom_travel_header' ) ) :
/**
 * Header Start
*/
function blossom_travel_header(){ 

    $header_array = array( 'one', 'two' );
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'blossom_travel_header', 'blossom_travel_header', 20 );

if( ! function_exists( 'blossom_travel_responsive_nav' ) ) :
/**
 * Responsive Nav
*/
function blossom_travel_responsive_nav(){ ?>
    <div class="responsive-nav">
        <?php blossom_travel_primary_nagivation(); ?>
        <div class="search-form-wrap">
            <?php get_search_form(); ?>
        </div>
        <div class="header-social">
            <?php blossom_travel_social_links(); ?>
        </div>

    </div><!-- .responsive-nav-->
    <?php
}
endif;
add_action( 'blossom_travel_header', 'blossom_travel_responsive_nav', 30 );

if( ! function_exists( 'blossom_travel_banner' ) ) :
/**
 * Banner Section 
*/
function blossom_travel_banner(){
    if( is_front_page() || is_home() ) :

        $ed_banner        = get_theme_mod( 'ed_banner_section', 'static_banner' );
        $banner_title     = get_theme_mod( 'banner_title' );
        $banner_label     = get_theme_mod( 'banner_label' );
        $banner_link      = get_theme_mod( 'banner_link' );
                
        if( ( $ed_banner == 'static_banner' ) && has_custom_header() ){ ?>
            <div id="banner_section" class="banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
                <?php 
                    the_custom_header_markup();  
                    if( $ed_banner == 'static_banner' && ( $banner_title || ( $banner_label && $banner_link ) ) ){
                        echo '<div class="banner-caption"><div class="container">';
                        if( $banner_title ) echo '<h3 class="entry-title">';
                        if( $banner_title && $banner_link ) echo '<a href="' . esc_url( $banner_link ) . '">';
                        if( $banner_title ) echo esc_html( $banner_title );
                        if( $banner_title && $banner_link ) echo '</a>';
                        if( $banner_title ) echo '</h3>';
                        if( $banner_label && $banner_link ) echo '<div class="button-wrap"><a href="' . esc_url( $banner_link ) . '" class="btn-readmore">' . esc_html( $banner_label ) . '</a></div>';
                        echo '</div></div>';
                    }  
                ?>
            </div>
        <?php
        }
    endif;   
}
endif;
add_action( 'blossom_travel_after_header', 'blossom_travel_banner', 25 );

if( ! function_exists( 'blossom_travel_trending_section' ) ) :
/**
 * Blog Trending Section 
*/
function blossom_travel_trending_section(){
    if( is_home() && is_active_sidebar( 'blog-trending' ) ) { ?>
        <section class="trending-section">
            <div class="container">
                <?php dynamic_sidebar( 'blog-trending' ); ?>
            </div>
        </section> <!-- .trending-section -->
    <?php }   
}
endif;
add_action( 'blossom_travel_after_header', 'blossom_travel_trending_section', 35 );

if( ! function_exists( 'blossom_travel_featured_section' ) ) :
/**
 * Blog Featured Section 
*/
function blossom_travel_featured_section(){
    if( is_home() && is_active_sidebar( 'blog-featured' ) ) { ?>
        <section class="featured-section">
            <div class="container">
                <?php dynamic_sidebar( 'blog-featured' ); ?>
            </div>
        </section> <!-- .featured-section -->
    <?php }   
}
endif;
add_action( 'blossom_travel_after_header', 'blossom_travel_featured_section', 35 );

if( ! function_exists( 'blossom_travel_content_start' ) ) :
/**
 * Content Start
 *   
*/
function blossom_travel_content_start(){       
    global $post;
    
    $home_sections  = blossom_travel_get_home_sections();

    if( ! ( is_front_page() && ! is_home() && $home_sections ) ){ ?>
        <div id="content" class="site-content"> 
            <?php if( ! is_home() && !( blossom_travel_is_woocommerce_activated() && is_product() ) ) : 
                $background_image = blossom_travel_header_background_image();
                $ed_prefix = get_theme_mod( 'ed_prefix_archive', false ); ?>
                <header class="page-header" style="background-image: url( '<?php echo esc_url( $background_image ); ?>' );">
                    <div class="container">
                        <?php
                            if( is_archive() ){ 
                                if( is_author() ){
                                    $author_title = get_the_author_meta( 'display_name' );
                                    $author_description = get_the_author_meta( 'description' ); ?>
                                    <div class="author-section">
                                        <figure class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?></figure>
                                        <div class="author-content-wrap">
                                            <?php 
                                                echo '<h3 class="author-name">' . esc_html( $author_title ) . '</h3>';
                                                echo '<div class="author-content">' . wpautop( wp_kses_post( $author_description ) ) . '</div>';
                                            ?>      
                                        </div>
                                    </div>
                                    <?php 
                                }
                                else{
                                    the_archive_title( '', '' );
                                    the_archive_description( '<div class="archive-description">', '</div>' );
                                }             
                            }
                            
                            if( is_search() ){ 
                                echo '<span class="sub-title">' . esc_html__( 'Search Results For', 'blossom-travel' ) . '</span>';
                                get_search_form();
                            }
                            
                            if( is_page() && $post->ID != get_option( 'page_on_front' ) ){
                                the_title( '<h1 class="page-title">', '</h1>' );
                            }

                            if( is_single() ){
                                
                                blossom_travel_category();

                                the_title( '<h1 class="page-title">', '</h1>' );
                                
                                if( 'post' === get_post_type() ){
                                    echo '<div class="entry-meta">';
                                    blossom_travel_posted_on();
                                    blossom_travel_comment_count();
                                    echo '</div>';
                                }
                            }

                            if( is_404() ){                                    
                                echo '<h2 class="page-title">' . esc_html__( 'Uh-Oh...', 'blossom-travel' ) . '</h2>';
                                echo '<div class="page-desc">' . esc_html__( 'The page you are looking for may have been moved, deleted, or possibly never existed.', 'blossom-travel' ) . '</div>';
                            }
                        ?>
                    </div>
                </header><!-- .page-header -->
            <?php endif;
            blossom_travel_top_bar(); ?>
            <div class="container">
                <?php 
    }
}
endif;
add_action( 'blossom_travel_content', 'blossom_travel_content_start' );

if( ! function_exists( 'blossom_travel_posts_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function blossom_travel_posts_per_page_count(){
    global $wp_query;
    if( is_archive() || is_search() && $wp_query->found_posts > 0 ) {
        $posts_per_page = get_option( 'posts_per_page' );
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $start_post_number = 0;
        $end_post_number   = 0;

        if( $wp_query->found_posts > 0 && !( blossom_travel_is_woocommerce_activated() && is_shop() ) ):                
            $start_post_number = 1;
            if( $wp_query->found_posts < $posts_per_page  ) {
                $end_post_number = $wp_query->found_posts;
            }else{
                $end_post_number = $posts_per_page;
            }

            if( $paged > 1 ){
                $start_post_number = $posts_per_page * ( $paged - 1 ) + 1;
                if( $wp_query->found_posts < ( $posts_per_page * $paged )  ) {
                    $end_post_number = $wp_query->found_posts;
                }else{
                    $end_post_number = $paged * $posts_per_page;
                }
            }

            printf( esc_html__( '%1$s Showing:  %2$s - %3$s of %4$s RESULTS %5$s', 'blossom-travel' ), '<span class="post-count">', absint( $start_post_number ), absint( $end_post_number ), esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
        endif;
    }
}
endif; 
add_action( 'blossom_travel_before_posts_content' , 'blossom_travel_posts_per_page_count', 10 );

if ( ! function_exists( 'blossom_travel_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_travel_post_thumbnail() {
    $image_size  = 'thumbnail';
    
    if( is_front_page() && is_home() ){
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '">';
        $image_size = 'blossom-travel-blog-three';
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_travel_get_fallback_svg( $image_size );
        }        
        echo '</a>';
        echo '</figure>';
    }elseif( is_home() ){        
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '">';
        $image_size = 'blossom-travel-blog-three';
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_travel_get_fallback_svg( $image_size );    
        }        
        echo '</a>';
        echo '</figure>';
    }elseif( is_archive() || is_search() ){
        $image_size = 'blossom-travel-blog-three';
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_travel_get_fallback_svg( $image_size );
        }
        echo '</a>';
    }
}
endif;
add_action( 'blossom_travel_before_post_entry_content', 'blossom_travel_post_thumbnail', 20 );

if( ! function_exists( 'blossom_travel_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_travel_entry_header(){

    $ed_post_author   = get_theme_mod( 'ed_post_author', false );
    
    if( is_single() ){
        if( ! $ed_post_author ) echo '<div class="article-meta">';
        blossom_travel_posted_by();
        if( ! $ed_post_author ) echo '</div>';
    }else{ ?>
        <header class="entry-header">
            <?php             
                blossom_travel_category();
                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            ?>
        </header>         
    <?php    
    }
}
endif;
add_action( 'blossom_travel_post_entry_content', 'blossom_travel_entry_header', 10 );


if( ! function_exists( 'blossom_travel_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_travel_entry_content(){ 
    $ed_excerpt     = get_theme_mod( 'ed_excerpt', true ); ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
                the_content();    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-travel' ),
    				'after'  => '</div>',
    			) );
            }else{
                the_excerpt();
            }
		?>
	</div><!-- .entry-content -->
    <?php 
}
endif;
add_action( 'blossom_travel_page_entry_content', 'blossom_travel_entry_content', 15 );
add_action( 'blossom_travel_post_entry_content', 'blossom_travel_entry_content', 15 );

if( ! function_exists( 'blossom_travel_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_travel_entry_footer(){ 
    $readmore = get_theme_mod( 'read_more_text', __( 'Read', 'blossom-travel' ) ); ?>
	<footer class="entry-footer">
		<?php
            if( !is_single() && 'post' === get_post_type() ){
                blossom_travel_posted_on();
                blossom_travel_comment_count();
            } 

			if( is_single() ){
			    blossom_travel_tag();
			}

            if( ( is_home() || is_archive() || is_search() ) ){
                echo '<div class="button-wrap"><a href="' . esc_url( get_the_permalink() ) . '" class="btn-readmore">' . esc_html( $readmore ) . '<i class="fas fa-caret-right"></i></a></div>';    
            }
            
            if( get_edit_post_link() ){
                edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-travel' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
            }
		?>
	</footer><!-- .entry-footer -->
	<?php 
}
endif;
add_action( 'blossom_travel_page_entry_content', 'blossom_travel_entry_footer', 20 );
add_action( 'blossom_travel_post_entry_content', 'blossom_travel_entry_footer', 20 );

if( ! function_exists( 'blossom_travel_author' ) ) :
/**
 * Author Section
*/
function blossom_travel_author(){ 
    $ed_author    = get_theme_mod( 'ed_author', false );
    $author_title = get_theme_mod( 'author_title', __( 'About Author', 'blossom-travel' ) );
    if( ! $ed_author && get_the_author_meta( 'description' ) ){ ?>
    <div class="author-section">
        <figure class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?></figure>
        <div class="author-content-wrap">
            <?php 
                if( $author_title ) echo '<h3 class="author-name">' . esc_html( $author_title ) . '</h3>';
                echo '<div class="author-content">' . wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ) . '</div>';
            ?>      
        </div>
    </div>
    <?php
    }
}
endif;
add_action( 'blossom_travel_after_post_content', 'blossom_travel_author', 15 );

if( ! function_exists( 'blossom_travel_navigation' ) ) :
/**
 * Navigation
*/
function blossom_travel_navigation(){
    if( is_single() ){
        $next_post = get_next_post();
        $prev_post = get_previous_post();

        if( $prev_post || $next_post ){?>            
            <nav class="post-navigation pagination" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-travel' ); ?></h2>
                <div class="nav-links">
                    <?php if( $prev_post ){ ?>
                    <div class="nav-previous">
                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
                            <span class="meta-nav"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8"><defs><style>.arla{fill:#999596;}</style></defs><path class="arla" d="M16.01,11H8v2h8.01v3L22,12,16.01,8Z" transform="translate(22 16) rotate(180)"/></svg><?php esc_html_e( 'Previous Post', 'blossom-travel' ); ?></span>
                            <span class="post-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                        </a>
                        <figure class="post-img">
                            <?php
                            $prev_img = get_post_thumbnail_id( $prev_post->ID );
                            if( $prev_img ){
                                $prev_url = wp_get_attachment_image_url( $prev_img, 'blossom-travel-normal-size' );
                                echo '<img src="' . esc_url( $prev_url ) . '" alt="' . the_title_attribute( 'echo=0', $prev_post ) . '">';                                        
                            }else{
                                blossom_travel_get_fallback_svg( 'blossom-travel-normal-size' );
                            }
                            ?>
                        </figure>
                    </div>
                    <?php } ?>
                    <?php if( $next_post ){ ?>
                    <div class="nav-next">
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
                            <span class="meta-nav"><?php esc_html_e( 'Next Post', 'blossom-travel' ); ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8"><defs><style>.arra{fill:#999596;}</style></defs><path class="arra" d="M16.01,11H8v2h8.01v3L22,12,16.01,8Z" transform="translate(-8 -8)"/></svg></span>
                            <span class="post-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                        </a>
                        <figure class="post-img">
                            <?php
                            $next_img = get_post_thumbnail_id( $next_post->ID );
                            if( $next_img ){
                                $next_url = wp_get_attachment_image_url( $next_img, 'blossom-travel-normal-size' );
                                echo '<img src="' . esc_url( $next_url ) . '" alt="' . the_title_attribute( 'echo=0', $next_post ) . '">';                                        
                            }else{
                                blossom_travel_get_fallback_svg( 'blossom-travel-normal-size' );
                            }
                            ?>
                        </figure>
                    </div>
                    <?php } ?>
                </div>
            </nav>        
            <?php
        }
    }else{            
        the_posts_pagination( array(
            'prev_text'          => '<i class="fas fa-chevron-left"></i>',
            'next_text'          => '<i class="fas fa-chevron-right"></i>',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-travel' ) . ' </span>',
        ) );
    }
}
endif;
add_action( 'blossom_travel_after_post_content', 'blossom_travel_navigation', 20 );
add_action( 'blossom_travel_after_posts_content', 'blossom_travel_navigation' );

if( ! function_exists( 'blossom_travel_related_posts' ) ) :
/**
 * Related Posts 
*/
function blossom_travel_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );
    
    if( $ed_related_post ){
        blossom_travel_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'blossom_travel_after_post_content', 'blossom_travel_related_posts', 35 );

if( ! function_exists( 'blossom_travel_latest_posts' ) ) :
/**
 * Latest Posts
*/
function blossom_travel_latest_posts(){ 
    blossom_travel_get_posts_list( 'latest' );
}
endif;
add_action( 'blossom_travel_latest_posts', 'blossom_travel_latest_posts' );

if( ! function_exists( 'blossom_travel_comment' ) ) :
/**
 * Comments Template 
*/
function blossom_travel_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( !( get_theme_mod( 'ed_comments', false ) ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_travel_after_post_content', 'blossom_travel_comment', 45 );
add_action( 'blossom_travel_after_page_content', 'blossom_travel_comment' );

if( ! function_exists( 'blossom_travel_content_end' ) ) :
/**
 * Content End
*/
function blossom_travel_content_end(){ 
    $home_sections = blossom_travel_get_home_sections(); 
    if( ! ( is_front_page() && ! is_home() && $home_sections ) ){ ?>            
            </div><!-- .container -->        
        </div><!-- .site-content -->
        <?php
    }
}
endif;
add_action( 'blossom_travel_before_footer', 'blossom_travel_content_end', 20 );

if( ! function_exists( 'blossom_travel_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_travel_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_travel_footer', 'blossom_travel_footer_start', 20 );

if( ! function_exists( 'blossom_travel_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_travel_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }
                 
    if( $active_sidebars ){ ?>
        <div class="footer-t">
    		<div class="container">
    			<div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                <?php foreach( $active_sidebars as $active ){ ?>
    				<div class="col">
    				   <?php dynamic_sidebar( $active ); ?>	
    				</div>
                <?php } ?>
                </div>
    		</div>
    	</div>
        <?php 
    }
}
endif;
add_action( 'blossom_travel_footer', 'blossom_travel_footer_top', 30 );

if( ! function_exists( 'blossom_travel_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_travel_footer_bottom(){ ?>
    <div class="footer-b">
		<div class="container">
			<div class="site-info">            
            <?php
                blossom_travel_get_footer_copyright();
                esc_html_e( ' Blossom Travel | Developed By ', 'blossom-travel' );
                echo '<a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( ' Blossom Themes', 'blossom-travel' ) . '</a>.';
                
                printf( esc_html__( ' Powered by %s', 'blossom-travel' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-travel' ) ) .'" target="_blank">WordPress</a> . ' );
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_travel_footer', 'blossom_travel_footer_bottom', 40 );

if( ! function_exists( 'blossom_travel_back_to_top' ) ) :
/**
 * Back to top
*/
function blossom_travel_back_to_top(){ ?>
    <button class="back-to-top">
		<i class="fas fa-chevron-up"></i>
	</button>
    <?php
}
endif;
add_action( 'blossom_travel_footer', 'blossom_travel_back_to_top', 45 );

if( ! function_exists( 'blossom_travel_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_travel_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_travel_footer', 'blossom_travel_footer_end', 50 );

if( ! function_exists( 'blossom_travel_page_end' ) ) :
/**
 * Page End
*/
function blossom_travel_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_travel_after_footer', 'blossom_travel_page_end', 20 );