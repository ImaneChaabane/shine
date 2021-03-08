<?php
/**
 * Blossom Travel Custom functions and definitions
 *
 * @package Blossom_Travel
 */

if ( ! function_exists( 'blossom_travel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blossom_travel_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blossom Travel, use a find and replace
	 * to change 'blossom-travel' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blossom-travel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'blossom-travel' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blossom_travel_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 
        'custom-logo', 
        apply_filters( 
            'blossom_travel_custom_logo_args', 
            array( 
                'height'      => 73,
                'width'       => 250,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ) 
            )
        ) 
    );
    
    /**
     * Add support for custom header.
    */
    add_theme_support( 
        'custom-header', 
        apply_filters( 
            'blossom_travel_custom_header_args', 
            array(
        		'default-image' => esc_url( get_template_directory_uri() . '/images/banner-img.jpg' ),
                'video'         => true,
        		'width'         => 1920,
        		'height'        => 843,
        		'header-text'   => false
            ) 
        ) 
    );

    // Register default headers.
    register_default_headers( array(
        'default-banner' => array(
            'url'           => '%s/images/banner-img.jpg',
            'thumbnail_url' => '%s/images/banner-img.jpg',
            'description'   => esc_html_x( 'Default Banner', 'header image description', 'blossom-travel' ),
        ),
    ) );
 
    /**
     * Add Custom Images sizes.
    */    
    add_image_size( 'blossom-travel-schema', 600, 60 );
    add_image_size( 'blossom-travel-single', 1903, 843, true );
    add_image_size( 'blossom-travel-slider-two', 480, 584, true );
    add_image_size( 'blossom-travel-blog', 780, 673, true );
    add_image_size( 'blossom-travel-blog-one', 1170, 600, true );
    add_image_size( 'blossom-travel-blog-two', 562, 395, true );
    add_image_size( 'blossom-travel-blog-three', 780, 450, true );
    add_image_size( 'blossom-travel-normal-size', 468, 468, true );
    
    /** Starter Content */
    $starter_content = array(
        // Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array( 
            'home', 
            'blog',
        ),
		
        // Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),
        
        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods'  => array(
            'banner_title' => __( 'Start Your Journey Now', 'blossom-travel' ),
            'banner_label' => __( 'Start Now', 'blossom-travel' ),
            'banner_link'  => '#',
        ),
        
        // Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'primary' => array(
				'name' => __( 'Primary', 'blossom-travel' ),
				'items' => array(
					'page_home',
					'page_blog',
				)
			)
		),
    );
    
    $starter_content = apply_filters( 'blossom_travel_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
    
    // Add theme support for Responsive Videos.
    add_theme_support( 'jetpack-responsive-videos' );

    // Add excerpt support for pages
    add_post_type_support( 'page', 'excerpt' );
}
endif;
add_action( 'after_setup_theme', 'blossom_travel_setup' );

if( ! function_exists( 'blossom_travel_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blossom_travel_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'blossom_travel_content_width', 780 );
}
endif;
add_action( 'after_setup_theme', 'blossom_travel_content_width', 0 );

if( ! function_exists( 'blossom_travel_template_redirect_content_width' ) ) :
/**
* Adjust content_width value according to template.
*
* @return void
*/
function blossom_travel_template_redirect_content_width(){
	$sidebar = blossom_travel_sidebar();
    if( $sidebar ){	
        $GLOBALS['content_width'] = 780;       
	}else{
        if( is_singular() ){
            if( blossom_travel_sidebar( true ) === 'full-width centered' ){
                $GLOBALS['content_width'] = 780;
            }else{
                $GLOBALS['content_width'] = 1170;                
            }                
        }else{
            $GLOBALS['content_width'] = 1170;
        }
	}
}
endif;
add_action( 'template_redirect', 'blossom_travel_template_redirect_content_width' );

if( ! function_exists( 'blossom_travel_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function blossom_travel_scripts() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    
    if( blossom_travel_is_woocommerce_activated() )
    wp_enqueue_style( 'blossom-travel-woocommerce', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', array(), BLOSSOM_TRAVEL_THEME_VERSION );
    
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.3.4' );
    wp_enqueue_style( 'blossom-travel-google-fonts', blossom_travel_fonts_url(), array(), null );
    wp_enqueue_style( 'blossom-travel', get_stylesheet_uri(), array(), BLOSSOM_TRAVEL_THEME_VERSION );
    
    
    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery', 'all' ), '5.6.3', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.3.4', true );
    wp_enqueue_script( 'owlcarousel2-a11ylayer', get_template_directory_uri() . '/js' . $build . '/owlcarousel2-a11ylayer' . $suffix . '.js', array( 'jquery', 'owl-carousel' ), '0.2.1', true );
	wp_enqueue_script( 'blossom-travel', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery', 'masonry' ), BLOSSOM_TRAVEL_THEME_VERSION, true );
    wp_enqueue_script( 'blossom-travel-modal', get_template_directory_uri() . '/js' . $build . '/modal-accessibility' . $suffix . '.js', array( 'jquery' ), BLOSSOM_TRAVEL_THEME_VERSION, true );
    $array = array( 
        'rtl'           => is_rtl(),
    );
    
    wp_localize_script( 'blossom-travel', 'blossom_travel_data', $array );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'blossom_travel_scripts' );

if( ! function_exists( 'blossom_travel_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function blossom_travel_admin_scripts( $hook ){    
    wp_enqueue_style( 'blossom-travel-admin', get_template_directory_uri() . '/inc/css/admin.css', '', BLOSSOM_TRAVEL_THEME_VERSION );
    wp_enqueue_script( 'blossom-travel-admin', get_template_directory_uri() . '/inc/js/admin.js', array( 'jquery' ), BLOSSOM_TRAVEL_THEME_VERSION, false );
}
endif; 
add_action( 'admin_enqueue_scripts', 'blossom_travel_admin_scripts' );

if( ! function_exists( 'blossom_travel_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blossom_travel_body_classes( $classes ) {
    $ed_banner   = get_theme_mod( 'ed_banner_section', 'static_banner' ); 
    
    // Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
        $classes[] = 'custom-background-color';
    }
    
    $classes[] = blossom_travel_sidebar( true );

    if( is_home() || is_archive() || is_search() ){
        $classes[] = 'post-lay-three';
    }

    if( $ed_banner == 'no_banner' || !has_custom_header() ) {
        $classes[] = 'banner-disabled';
    }

    if( is_single() ){
        $classes[] = 'single-lay-one';
    }
    
	return $classes;
}
endif;
add_filter( 'body_class', 'blossom_travel_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blossom_travel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blossom_travel_pingback_header' );

if( ! function_exists( 'blossom_travel_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function blossom_travel_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'blossom-travel' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'blossom-travel' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'blossom-travel' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'blossom_travel_change_comment_form_default_fields' );

if( ! function_exists( 'blossom_travel_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function blossom_travel_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'blossom-travel' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    $defaults['title_reply']        = esc_html__( 'Leave A Comment', 'blossom-travel' );
    $defaults['title_reply_before'] = '<h3 id="reply-title" class="comment-reply-title"><span>';
    $defaults['title_reply_after']  = '</span></h3>';
    
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'blossom_travel_change_comment_form_defaults' );

if ( ! function_exists( 'blossom_travel_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function blossom_travel_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip; ';
}

endif;
add_filter( 'excerpt_more', 'blossom_travel_excerpt_more' );

if ( ! function_exists( 'blossom_travel_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function blossom_travel_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'excerpt_length', 55 );
    return is_admin() ? $length : absint( $excerpt_length );    
}
endif;
add_filter( 'excerpt_length', 'blossom_travel_excerpt_length', 999 );

if( ! function_exists( 'blossom_travel_get_the_archive_title' ) ) :
/**
 * Filter Archive Title
*/
function blossom_travel_get_the_archive_title( $title ){

    $ed_prefix = get_theme_mod( 'ed_prefix_archive', false );
    if( is_post_type_archive( 'product' ) ){
        $title = '<h1 class="page-title">' . get_the_title( get_option( 'woocommerce_shop_page_id' ) ) . '</h1>';
    }else{
        if( is_category() ){
            if( $ed_prefix ) {
                $title = '<h1 class="page-title"><span>' . esc_html( single_cat_title( '', false ) ) . '</span></h1>';
            }else{
                $title = '<span class="sub-title">'. esc_html__( 'Category','blossom-travel' ) . '</span><h1 class="page-title"><span>' . esc_html( single_cat_title( '', false ) ) . '</span></h1>';
            }
        }
        elseif( is_tag() ){
            if( $ed_prefix ) {
                $title = '<h1 class="page-title"><span>' . esc_html( single_tag_title( '', false ) ) . '</span></h1>';
            }else{
                $title = '<span class="sub-title">'. esc_html__( 'Tags','blossom-travel' ) . '</span><h1 class="page-title"><span>' . esc_html( single_tag_title( '', false ) ) . '</span></h1>';
            }
        }elseif( is_year() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title"><span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'blossom-travel' ) ) . '</span></h1>';                   
            }else{
                $title = '<span class="sub-title">'. esc_html__( 'Year','blossom-travel' ) . '</span><h1 class="page-title"><span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'blossom-travel' ) ) . '</span></h1>';
            }
        }elseif( is_month() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title"><span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blossom-travel' ) ) . '</span></h1>';                                   
            }else{
                $title = '<span class="sub-title">'. esc_html__( 'Month','blossom-travel' ) . '</span><h1 class="page-title"><span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blossom-travel' ) ) . '</span></h1>';
            }
        }elseif( is_day() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title"><span>' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'blossom-travel' ) ) . '</span></h1>';                                   
            }else{
                $title = '<span class="sub-title">'. esc_html__( 'Day','blossom-travel' ) . '</span><h1 class="page-title"><span>' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'blossom-travel' ) ) .  '</span></h1>';
            }
        }elseif( is_post_type_archive() ) {
            if( $ed_prefix ){
                $title = '<h1 class="page-title"><span>'  . post_type_archive_title( '', false ) . '</span></h1>';                            
            }else{
                $title = '<span class="sub-title">'. esc_html__( 'Archives','blossom-travel' ) . '</span><h1 class="page-title"><span>'  . post_type_archive_title( '', false ) . '</span></h1>';
            }
        }elseif( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            if( $ed_prefix ){
                $title = '<h1 class="page-title"><span>' . single_term_title( '', false ) . '</span></h1>';                                   
            }else{
                $title = '<span class="sub-title">' . $tax->labels->singular_name . '</span><h1 class="page-title"><span>' . single_term_title( '', false ) . '</span></h1>';
            }
        }
    }    
    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'blossom_travel_get_the_archive_title' );

if( ! function_exists( 'blossom_travel_remove_archive_description' ) ) :
/**
 * filter the_archive_description & get_the_archive_description to show post type archive
 * @param  string $description original description
 * @return string post type description if on post type archive
 */
function blossom_travel_remove_archive_description( $description ){
    $ed_shop_archive_description = get_theme_mod( 'ed_shop_archive_description', false );
    if( is_post_type_archive( 'product' ) ) {
        if( ! $ed_shop_archive_description ){
            $description = '';
        }
    }
    return $description;
}
endif;
add_filter( 'get_the_archive_description', 'blossom_travel_remove_archive_description' );

if( ! function_exists( 'blossom_travel_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function blossom_travel_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'blossom-travel-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = blossom_travel_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( blossom_travel_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => esc_url( get_permalink( $post->ID ) )
            ),
            "headline"  => esc_html( get_the_title( $post->ID ) ),
            "datePublished" => esc_html( get_the_time( DATE_ISO8601, $post->ID ) ),
            "dateModified"  => esc_html( get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ) ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => blossom_travel_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( ! empty( $custom_logo_id ) ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => esc_html( get_bloginfo( 'name' ) ),
                "description" => wp_kses_post( get_bloginfo( 'description' ) ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">';
        if ( version_compare( PHP_VERSION, '5.4.0' , '>=' ) ) {
            echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
        } else {
            echo wp_json_encode( $args );
        }
        echo '</script>';
    }
}
endif;
add_action( 'wp_head', 'blossom_travel_single_post_schema' );

if( ! function_exists( 'blossom_travel_get_comment_author_link' ) ) :
/**
 * Filter to modify comment author link
 * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
 */
function blossom_travel_get_comment_author_link( $return, $author, $comment_ID ){
    $comment = get_comment( $comment_ID );
    $url     = get_comment_author_url( $comment );
    $author  = get_comment_author( $comment );
 
    if ( empty( $url ) || 'http://' == $url )
        $return = '<span itemprop="name">'. esc_html( $author ) .'</span>';
    else
        $return = '<span itemprop="name"><a href=' . esc_url( $url ) . ' rel="external nofollow noopener" class="url" itemprop="url">' . esc_html( $author ) . '</a></span>';

    return $return;
}
endif;
add_filter( 'get_comment_author_link', 'blossom_travel_get_comment_author_link', 10, 3 );

if( ! function_exists( 'blossom_travel_admin_notice' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function blossom_travel_admin_notice() {
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'blossom-travel-update-notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if ( is_admin() && 'themes.php' == $pagenow && !$meta ) {
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
            return;
        }

        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'blossom-travel' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'blossom-travel' ), esc_html( $name ) ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=blossom-travel-getting-started' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php esc_html_e( 'Go to the getting started.', 'blossom-travel' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?blossom-travel-update-notice=1"><?php esc_html_e( 'Dismiss','blossom-travel' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'blossom_travel_admin_notice' );

if( ! function_exists( 'blossom_travel_ignore_admin_notice' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function blossom_travel_ignore_admin_notice() {

    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset( $_GET['blossom-travel-update-notice'] ) && $_GET['blossom-travel-update-notice'] = '1' ) {

        update_option( 'blossom-travel-update-notice', true );
    }
}
endif;
add_action( 'admin_init', 'blossom_travel_ignore_admin_notice' );

if( ! function_exists( 'blossom_travel_video_header_onblog' ) ) :
/**
 * Here we are displaying the header video in:
 * 1. On blog page conditionally via: `is_home()` function
 */
function blossom_travel_video_header_onblog( $active ) {
    if ( is_front_page() || is_home() ) {
        return true;
    }

    return false;
}
endif;
add_filter( 'is_header_video_active', 'blossom_travel_video_header_onblog' );

if ( ! function_exists( 'blossom_travel_get_fontawesome_ajax' ) ) :
/**
 * Return an array of all icons.
 */
function blossom_travel_get_fontawesome_ajax() {
    // Bail if the nonce doesn't check out
    if ( ! isset( $_POST['blossom_travel_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['blossom_travel_customize_nonce'] ), 'blossom_travel_customize_nonce' ) ) {
        wp_die();
    }

    // Do another nonce check
    check_ajax_referer( 'blossom_travel_customize_nonce', 'blossom_travel_customize_nonce' );

    // Bail if user can't edit theme options
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die();
    }

    // Get all of our fonts
    $fonts = blossom_travel_get_fontawesome_list();
    
    ob_start();
    if( $fonts ){ ?>
        <ul class="font-group">
            <?php 
                foreach( $fonts as $font ){
                    echo '<li data-font="' . esc_attr( $font ) . '"><i class="' . esc_attr( $font ) . '"></i></li>';                        
                }
            ?>
        </ul>
        <?php
    }
    echo ob_get_clean();

    // Exit
    wp_die();
}
endif;
add_action( 'wp_ajax_blossom_travel_get_fontawesome_ajax', 'blossom_travel_get_fontawesome_ajax' );