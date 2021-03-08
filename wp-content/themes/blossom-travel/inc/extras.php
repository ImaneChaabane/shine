<?php
/**
 * Blossom Travel Standalone Functions.
 *
 * @package Blossom_Travel
 */

if ( ! function_exists( 'blossom_travel_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function blossom_travel_posted_on() {
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    $ed_post_date   = get_theme_mod( 'ed_post_date', false );
    $on = __( 'on ', 'blossom-travel' );
    if( $ed_post_date ) return false;
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
            $on = __( 'updated on ', 'blossom-travel' );		  
		}else{
            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
		}        
	}else{
	   $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    $posted_on = sprintf( '%1$s %2$s', esc_html( $on ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
	
	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'blossom_travel_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function blossom_travel_posted_by() {
    global $post;
    $ed_post_author   = get_theme_mod( 'ed_post_author', false );
    if( $ed_post_author ) return false;
    
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'blossom-travel' ),
		'<span itemprop="name" class="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url">' . get_avatar( get_the_author_meta( 'ID' ), 180 ) . esc_html( get_the_author() ) . '</a></span>' 
    );
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if( ! function_exists( 'blossom_travel_comment_count' ) ) :
/**
 * Comment Count
*/
function blossom_travel_comment_count(){
    $ed_comments    = get_theme_mod( 'ed_comments', false );
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && !$ed_comments ) {
		echo '<span class="comments">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( '0 Comment<span class="screen-reader-text"> on %s</span>', 'blossom-travel' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}    
}
endif;

if ( ! function_exists( 'blossom_travel_category' ) ) :
/**
 * Prints categories
 */
function blossom_travel_category(){
    $ed_cat_single  = get_theme_mod( 'ed_category', false );
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() && !$ed_cat_single ) {
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list ) {
			echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'blossom_travel_tag' ) ) :
/**
 * Prints tags
 */
function blossom_travel_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( ' ' );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="cat-tags" itemprop="about"><span class="tag-title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="M17,3H7A2.006,2.006,0,0,0,5,5V21l7-3,7,3V5A2.006,2.006,0,0,0,17,3Zm0,15-5-2.18L7,18V5H17Z"></path></svg></span>' . esc_html__( '%1$sTags:%2$s %3$s', 'blossom-travel' ) . '</span>', '<span>', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'blossom_travel_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function blossom_travel_get_posts_list( $status ){
    global $post;
    
    $args = array(
        'post_type'           => 'post',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 3;
        $title                  = __( 'You might also enjoy:', 'blossom-travel' );
        $class                  = 'additional-post';
        $image_size             = 'blossom-travel-blog-two';
        $readmore               = get_theme_mod( 'read_more_text', __( 'Read', 'blossom-travel' ) );
        break;
        
        case 'related':
        $args['posts_per_page'] = 4;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_title', __( 'You might also enjoy:', 'blossom-travel' ) );
        $class                  = 'additional-post';
        $image_size             = 'blossom-travel-blog-two';
        $readmore               = get_theme_mod( 'read_more_text', __( 'Read', 'blossom-travel' ) );
        $cats                   = get_the_category( $post->ID );        
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }        
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>">
    		<?php 
            if( $title ) echo '<h3 class="post-title">' . esc_html( $title ) . '</h2>'; ?>
            <div class="section-grid">
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <article class="post">
    				<figure class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <?php
                            if( has_post_thumbnail() ){
                                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                            }else{ 
                                blossom_travel_get_fallback_svg( $image_size );
                            }
                        ?>
                        </a>
                    </figure>
                    <div class="content-wrap">
        				<header class="entry-header">
        					<?php 
                                blossom_travel_category();
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                            ?>                        
                        </header>
                        <div class="entry-footer">
                        <?php 
                            blossom_travel_posted_on();
                            echo '<div class="button-wrap"><a href="' . esc_url( get_the_permalink() ) . '" class="btn-readmore">' . esc_html( $readmore ) . '<i class="fas fa-caret-right"></i></a></div>';
                        ?>
                        </div>
                    </div>
    			</article>
    			<?php }?>
            </div>    		
    	</div>
        <?php
    }
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'blossom_travel_site_branding' ) ) :
/**
 * Site Branding
*/
function blossom_travel_site_branding(){ 
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    if( has_custom_logo() || $site_title || $site_description || $header_text ) :
        if( has_custom_logo() && ( $site_title || $site_description ) && $header_text ) {
            $branding_class = ' text-image';
        }else{
            $branding_class = '';
        } ?>
        <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization">
    		<?php 
            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                the_custom_logo();
            } 
            if( $site_title || $site_description ) :
                if( $branding_class ) echo '<div class="site-title-wrap">';
                if( is_front_page() ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                }
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description" itemprop="description"><?php echo $description; ?></p>
                <?php
                }
                if( $branding_class ) echo '</div>';
            endif;
            ?>
    	</div>    
    <?php
    endif;
}
endif;

if( ! function_exists( 'blossom_travel_social_links' ) ) :
/**
 * Social Links 
*/
function blossom_travel_social_links( $echo = true ){ 
    $social_links = get_theme_mod( 'social_links' );
    $ed_social    = get_theme_mod( 'ed_social_links', false );
    $header       = get_theme_mod( 'header_layout', 'one' );
    
    if( $ed_social && $social_links && $echo ){    
        if( $header == 'two' ) echo '<div class="header-social">'; ?>
        <ul class="social-list">
        	<?php 
            foreach( $social_links as $link ){
        	    if( $link['link'] ){ ?>
                <li>
                    <a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
                        <i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
                    </a>
                </li>                              
                <?php } 
            } 
            ?>
    	</ul>
    <?php    
        if( $header == 'two' ) echo '</div>';
    }elseif( $ed_social && $social_links ){
        return true;
    }else{
        return false;
    }
    ?>
    <?php                                
}
endif;

if( ! function_exists( 'blossom_travel_form_section' ) ) :
/**
 * Form Icon
*/
function blossom_travel_form_section(){ ?>
    <div class="form-section">
		<span id="btn-search" class="fas fa-search"></span>
	</div>
    <?php
}
endif;

if( ! function_exists( 'blossom_travel_primary_nagivation' ) ) :
/**
 * Primary Navigation.
*/
function blossom_travel_primary_nagivation(){     
    $add_menu_class = ( has_nav_menu( 'primary' ) ) ? '' : ' menu-fallback';  ?>
    	<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $add_menu_class ); ?>" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                <button class="btn-close-menu close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"><span></span></button>
                <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'blossom-travel' ); ?>">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'nav-menu main-menu-modal',
                            'fallback_cb'    => 'blossom_travel_primary_menu_fallback',
                        ) );
                    ?>
                </div>
            </div>
    	</nav><!-- #site-navigation -->
    <?php
}
endif;

if( ! function_exists( 'blossom_travel_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function blossom_travel_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-travel' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_travel_header_search' ) ) :
/**
 * Header Search
*/
function blossom_travel_header_search(){ 
    ?>    
    <button class="search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
        <svg aria-hidden="true" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-9x"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
        <span class="search-title"><?php esc_html_e( 'Search', 'blossom-travel' ); ?></span>
    </button>
    <div class="header-search-wrap search-modal cover-modal" data-modal-target-string=".search-modal">
        <div class="header-search-inner-wrap">
            <?php get_search_form();?> 
            <button class="close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"></button>
        </div>
    </div>
    <?php
}
endif;

if( ! function_exists( 'blossom_travel_top_bar' ) ) :
/**
 * Top bar for single page and post
*/
function blossom_travel_top_bar(){
    if( ! is_front_page() && ( is_singular() || is_archive() ) ){ ?>
        <div class="top-bar">
            <div class="container">
            <?php
                //Breadcrumb
                blossom_travel_breadcrumb();
            ?>
            </div>
        </div>   
        <?php 
    }    
}
endif;

if( ! function_exists( 'blossom_travel_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function blossom_travel_breadcrumb() {
    global $post;
    $post_page  = get_option('page_for_posts'); //The ID of the page that displays posts.
    $show_front = get_option('show_on_front'); //What to show on the front page
    $home       = get_theme_mod('home_text', __('Home', 'blossom-travel')); // text for the 'Home' link
    $delimiter  = '<i class="fa fa-angle-right"></i>';
    $before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb

    if( get_theme_mod( 'ed_breadcrumb', true ) ){
            
        $depth = 1;
        echo '<div class="breadcrumb-wrapper"><div class="container" >
                <div id="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList"> 
                    <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html( $home ) . '</span></a>
                        <meta itemprop="position" content="'. absint( $depth ).'" />
                        <span class="separator">' .  $delimiter  . '</span>
                    </span>';
        if( is_home() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> '. $after;
            
        }elseif( is_category() ){
            
            $depth = 2;
            $thisCat = get_category( get_query_var( 'cat' ), false );

            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( $post_page ) ) . '"><span itemprop="name">' . esc_html( $p->post_title ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span>';
                $depth ++;  
            }

            if ( $thisCat->parent != 0 ) {
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );

                foreach ( $parent_categories as $parent_term ) {
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url    = get_term_link( $parent_obj->term_id );
                        $term_name   = $parent_obj->name;
                        echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span> ';
                        $depth ++;
                    }
                }
            }
            echo $before . ' <a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> ' . $after;
        
        }elseif( blossom_travel_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            
            if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                $shop_url = wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> <span class="separator">' . $delimiter . '</span></span> ';
                $depth++;
            }

            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $ancestor ) ) . '"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> <span class="separator">' . $delimiter . '</span></span> ';
                        $depth++;
                    }
                }
            }           
            echo $before .'<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">'. esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
            
        }elseif( blossom_travel_is_woocommerce_activated() && is_shop() ){ //Shop Archive page

            $depth = 2;
            if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
                return;
            }
            $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );

            if ( ! $_name ) {
                $product_post_type = get_post_type_object( 'product' );
                $_name = $product_post_type->labels->singular_name;
            }
            echo $before .'<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">'. esc_html( $_name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after; 

        }elseif( is_tax( 'blossom_portfolio_categories' ) ){
            $depth = 2;
            $queried_object = get_queried_object();
            $taxonomy = 'blossom_portfolio_categories';
            $ancestors = get_ancestors( $queried_object->term_id, $taxonomy );
            if( !empty( $ancestors ) ){
            $termz = get_term( $ancestors[0], $taxonomy );
            $ancestors_title = !empty( $termz->name ) ? esc_html( $termz->name ) : ''; 
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $termz->term_id ) ) . '"><span itemprop="name">' . $ancestors_title . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'"/><span class="separator">' . $delimiter . '</span></span> ';
                $depth++;
            }
            
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( $queried_object->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        }elseif( is_tag() ){
            
            $queried_object = get_queried_object();
            $depth = 2;

            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
     
        }elseif( is_author() ){
            
            $depth = 2;
            global $author;

            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
     
        }elseif( is_search() ){
            
            $depth = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before .'<a itemprop="item" href="'. esc_url( $request_uri ) .'"><span itemprop="name">'. esc_html__( 'Search Results for "', 'blossom-travel' ) . esc_html( get_search_query() ) . esc_html__( '"', 'blossom-travel' ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_day() ){
            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-travel' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'blossom-travel' ) ) ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'"/><span class="separator">' . $delimiter . '</span></span> ';
            $depth ++;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'blossom-travel' ) ), get_the_time( __( 'm', 'blossom-travel' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'blossom-travel' ) ) ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span> ';
            $depth ++;
            echo $before .'<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'blossom-travel' ) ), get_the_time( __( 'm', 'blossom-travel' ) ), get_the_time( __( 'd', 'blossom-travel' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'd', 'blossom-travel' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_month() ){
            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-travel' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'blossom-travel' ) ) ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span> ';
            $depth++;
            echo $before .'<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'blossom-travel' ) ), get_the_time( __( 'm', 'blossom-travel' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'F', 'blossom-travel' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_year() ){
            
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-travel' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'blossom-travel' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;

        }elseif( is_single() && !is_attachment() ){
            
            if( blossom_travel_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                
                $depth = 2;
                if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    $shop_url = wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> <span class="separator">' . $delimiter . '</span></span> ';
                    $depth++;
                }
            
                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span> ';
                    $depth ++;
                }
                
                echo $before .'<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
                
            }elseif( get_post_type() != 'post' ){
                $depth = 2;
                $post_type = get_post_type_object( get_post_type() );
                
                if( $post_type->has_archive == true ){// For CPT Archive Link
                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   printf( '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" />', esc_url( get_post_type_archive_link( get_post_type() ) ), $label, $depth );
                   echo '<meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span>';
                   $depth ++;    
                }

                if( get_post_type() =='blossom-portfolio' ){
                    // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   $portfolio_link = blossom_travel_get_page_template_url( 'templates/blossom-portfolio.php' );
                   echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.esc_url( $portfolio_link) .'" itemprop="item"><span itemprop="name">'.esc_html($label).'</span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span>';
                   $depth ++;    
                }

                echo $before .'<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                $depth            = 2;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span> ';  
                    $depth++;
                }
                
                if( is_array( $cat_object ) ){ //Getting category hierarchy if any
        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object )
                    {
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term = $key;
                            $potential_parent = $object->term_id;
                        }
                    }
                    
                    $cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );

                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url    = get_term_link( $cat_obj->term_id );
                            $term_name   = $cat_obj->name;
                            echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span> ';
                            $depth ++;
                        }
                    }
                }

                 echo $before .'<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;     
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
            
            $depth = 2;
            $post_type = get_post_type_object(get_post_type());
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />';
                echo ' <span class="separator">' . $delimiter . '</span></span> ' . $before . sprintf( __('Page %s', 'blossom-travel'), get_query_var('paged') ) . $after;
            }elseif( is_archive() ){
                echo $before .'<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">'. esc_html( post_type_archive_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
            }else{
                echo $before .'<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">'. esc_html( $post_type->label ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
            }

        }elseif( is_attachment() ){
            
            $depth = 2;
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, ' <span class="separator">' . $delimiter . '</span> ');
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $parent ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $parent->post_title ) . '<span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . ' <span class="separator">' . $delimiter . '</span></span>';
            }
            echo  $before .'<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_page() && !$post->post_parent ){
            
           $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;

        }elseif( is_page() && $post->post_parent ){
            
            global $post;
            $depth = 2;
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $current_page = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id  = $current_page->post_parent;
            }

            $breadcrumbs = array_reverse( $breadcrumbs );

            for ( $i = 0; $i < count( $breadcrumbs); $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /></span>';
                if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . $delimiter . '</span> ';
                $depth++;
            }

            echo ' <span class="separator">' .  $delimiter . '</span> ' . $before .'<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" /></span>'. $after;
        
        }elseif( is_404() ){
            echo $before . esc_html__( '404 Error - Page Not Found', 'blossom-travel' ) . $after;
        }
        
        if( get_query_var('paged') ) echo __( ' (Page', 'blossom-travel' ) . ' ' . get_query_var('paged') . __( ')', 'blossom-travel' );
        
        echo '</div></div></div><!-- .breadcrumb-wrapper -->';
        
    }  
}
endif;

if( ! function_exists( 'blossom_travel_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function blossom_travel_theme_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
    <?php if ( 'div' != $args['style'] ) : ?>
    <article id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        	</div><!-- .comment-author vcard -->
            <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person">%s<span class="says">says:</span></b>', 'blossom-travel' ), get_comment_author_link() ); ?>
            <div class="comment-metadata commentmetadata">
                <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                    <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'blossom-travel' ), get_comment_date(),  get_comment_time() ); ?></time>
                </a>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blossom-travel' ); ?></p>
                <br />
            <?php endif; ?>
        </footer>
        <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>        
	<?php if ( 'div' != $args['style'] ) : ?>
    </article><!-- .comment-body -->
	<?php endif; ?>
    
<?php
}
endif;

if( ! function_exists( 'blossom_travel_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function blossom_travel_sidebar( $class = false ){
    global $post;
    $return = false;
    $page_layout = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Pages
    $post_layout = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Posts
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    
    if( is_singular( array( 'page', 'post' ) ) ){         
        if( get_post_meta( $post->ID, '_blossom_travel_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_blossom_travel_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( is_page() ){
            if( is_page_template( 'templates/blossom-portfolio.php' ) ) {
                $return = $class ? 'full-width' : false;
            }elseif( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }elseif( is_single() ){
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }
    }elseif( blossom_travel_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || get_post_type() == 'product' ) ){
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( 'shop-sidebar' ) ){            
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }         
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }elseif( is_singular( 'blossom-portfolio' ) && 'blossom-portfolio' === get_post_type() ){ //For Portfolio Post Type
        $return = $class ? 'full-width' : false; //Fullwidth
    }elseif( is_404() ){
        $return = $class ? 'full-width' : false;
    }else{
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( 'sidebar' ) ){            
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = 'sidebar';    
            }                         
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }    
    return $return; 
}
endif;

if( ! function_exists( 'blossom_travel_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function blossom_travel_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'blossom-travel' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            if( $slug ){
                $post_options[ $posts->post_title ] = $posts->post_title;
            }else{
                $post_options[ $posts->ID ] = $posts->post_title;    
            }
        }
    }
    return $post_options;
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'blossom_travel_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function blossom_travel_get_categories( $select = true, $taxonomy = 'category', $slug = false ){    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'blossom-travel' );
    foreach( $catlists as $category ){
        if( $slug ){
            $categories[$category->slug] = $category->name;
        }else{
            $categories[$category->term_id] = $category->name;    
        }        
    }
    
    return $categories;
}
endif;

if( ! function_exists( 'blossom_travel_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function blossom_travel_get_id_from_page( $slider_pages ){
    if( $slider_pages ){
        $ids = array();
        foreach( $slider_pages as $p ){
             if( !empty( $p['page'] ) ){
                $page_ids = get_page_by_title( $p['page'] );
                $ids[] = $page_ids->ID;
             }
        }   
        return $ids;
    }else{
        return false;
    }
}
endif;

if( ! function_exists( 'blossom_travel_get_home_sections' ) ) :
/**
 * Returns Home Sections 
*/
function blossom_travel_get_home_sections(){
                                                
    $sections = array( 
        'logo'        => array( 'sidebar' => 'logo' ),
        'about'       => array( 'sidebar' => 'about' ),
        'featured'    => array( 'sidebar' => 'featured' ),
        'blog'        => array( 'section' => 'blog' ), 
        'map'         => array( 'sidebar' => 'map' ),
        'cta'         => array( 'sidebar' => 'cta' ),
        'newsletter'  => array( 'sidebar' => 'newsletter' ),
    );

    $enabled_section = array();

    foreach( $sections as $k => $v ){
        if( array_key_exists( 'sidebar', $v ) ){
            if( is_active_sidebar( $v['sidebar'] ) ) array_push( $enabled_section, $v['sidebar'] );
        }else{
            if( get_theme_mod( 'ed_' . $v['section'] . '_section', true ) ) array_push( $enabled_section, $v['section'] );
        }
    } 

    if( blossom_travel_is_btif_activated() && get_theme_mod( 'ed_instagram', true ) ) array_push( $enabled_section, 'instagram' );

    return apply_filters( 'blossom_travel_home_sections', $enabled_section );
}
endif;

if( ! function_exists( 'blossom_travel_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function blossom_travel_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'blossom_travel_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function blossom_travel_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'blossom_travel_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function blossom_travel_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = blossom_travel_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

/**
 * Is Blossom Theme Toolkit active or not
*/
function blossom_travel_is_bttk_activated(){
    return class_exists( 'Blossomthemes_Toolkit' ) ? true : false;
}

/**
 * Is BlossomThemes Email Newsletters active or not
*/
function blossom_travel_is_btnw_activated(){
    return class_exists( 'Blossomthemes_Email_Newsletter' ) ? true : false;        
}

/**
 * Is BlossomThemes Social Feed active or not
*/
function blossom_travel_is_btif_activated(){
    return class_exists( 'Blossomthemes_Instagram_Feed' ) ? true : false;
}

/**
 * Query WooCommerce activation
 */
function blossom_travel_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

if ( ! function_exists( 'blossom_travel_header_background_image' ) ) :
/**
 * Inner Pages Header Background Image
*/
function blossom_travel_header_background_image() {
    
    $return = '';
    $ed_featured = get_theme_mod( 'ed_featured_image', true );    

    if( is_singular() ){
        $image_size = 'blossom-travel-single';
        if( is_single() ){
            if( $ed_featured ) $return = get_the_post_thumbnail_url( '', $image_size );
        }elseif( is_page_template( 'templates/blossom-portfolio.php' ) ){
            $background_image = esc_url( get_template_directory_uri() .'/images/header-bg.jpg' );
            if( has_post_thumbnail() ) :
                $return = get_the_post_thumbnail_url( '', $image_size );
            else:
                $return = $background_image;
            endif;
        }else{
            $return = get_the_post_thumbnail_url( '', $image_size );
        }
    }elseif( is_category() ){
        $category_id = get_queried_object_id();
        $image_id = get_term_meta( $category_id, 'category-image-id', true );
        if( $image_id ) {
            $return = wp_get_attachment_url( $image_id );
        }else{
            $return = get_theme_mod( 'header_background_image', esc_url( get_template_directory_uri() .'/images/header-bg.jpg' ) );
        }    
    }else{
        $return = get_theme_mod( 'header_background_image', esc_url( get_template_directory_uri() .'/images/header-bg.jpg' ) );
    }
    
    return $return;
}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     *
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         *
         */
        do_action( 'wp_body_open' );
    }
endif;

if( ! function_exists( 'blossom_travel_get_page_template_url' ) ) :
/**
 * Returns page template url if not found returns home page url
*/
function blossom_travel_get_page_template_url( $page_template ){
    $args = array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $page_template,
        'post_type'  => 'page',
        'fields'     => 'ids',
    );
    
    $posts_array = get_posts( $args );
    
    $url = ( $posts_array ) ? get_permalink( $posts_array[0] ) : get_permalink( get_option( 'page_on_front' ) );
    return $url;    
}
endif;