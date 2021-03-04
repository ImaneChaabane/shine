<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Automobile Lite
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) 
  {
    wp_body_open();
  }else{
    do_action('wp_body_open');
  }
?>

<?php
  $vw_automobile_lite_search_hide_show = get_theme_mod( 'vw_automobile_lite_search_hide_show' );
  if ( 'Disable' == $vw_automobile_lite_search_hide_show ) {
    $colmd = 'col-lg-12 col-md-12';
  } else { 
    $colmd = 'col-lg-10 col-md-9 col-8 offset-1';
  }
?>

<header role="banner">
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'vw-automobile-lite' ); ?></a>

  <div id="header">
    <div class="row m-0">
      <div class="col-lg-3 col-md-3">
        <div class="logowrapper">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('vw_automobile_lite_logo_title_hide_show',true) != ''){ ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('vw_automobile_lite_logo_title_hide_show',true) != ''){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('vw_automobile_lite_tagline_hide_show',true) != ''){ ?>
                <p class="site-description">
                  <?php echo esc_html( $description ); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 padremove">
        <div class="con_details">       
          <div class="row marremove">
            <?php if(get_theme_mod('vw_automobile_lite_contact') != '') { ?>
            <div class="top-contact col-lg-4 col-md-4">
              <span class="call"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_phone_icon','fa fa-phone')); ?>"></i><?php echo esc_html(get_theme_mod('vw_automobile_lite_contact','')); ?></span>
            </div>
            <?php } if(get_theme_mod('vw_automobile_lite_email') != '') { ?>  
            <div class="top-contact col-lg-4 col-md-4">   
              <span class="email"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_cont_email_icon','fas fa-envelope')); ?>"></i><?php echo esc_html( get_theme_mod( 'vw_automobile_lite_email','' ) ); ?></span>
            </div>
            <?php } if(get_theme_mod('vw_automobile_lite_headertimings') != '') { ?>  
            <div class="top-contact col-lg-4 col-md-4">   
              <span class="timings"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_headertiming_icon','far fa-clock')); ?>"></i><?php echo esc_html(get_theme_mod('vw_automobile_lite_headertimings','')); ?></span>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="menubox">
          <div class="row m-0">
            <div class="menu1 <?php echo esc_html( $colmd ); ?>">
              <?php if(has_nav_menu('primary')){ ?>
                <div class="toggle-nav mobile-menu">
                  <button onclick="vw_automobile_lite_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-automobile-lite'); ?></span></button>
                </div>  
              <?php } ?>
              <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-automobile-lite' ); ?>">
                  <?php 
                    if(has_nav_menu('primary')){
                      wp_nav_menu( array( 
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) ); 
                    }
                  ?>
                  <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_automobile_lite_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-automobile-lite'); ?></span></a>
                </nav>
              </div>
            </div>

            <?php if ( 'Disable' != $vw_automobile_lite_search_hide_show ) {?>
            <div class="col-lg-1 col-md-2 col-4 p-0">
              <div class="search-box">
                <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_search_icon','fas fa-search')); ?>"></i></a></span>
              </div>
            </div>
            <?php } ?>

            <div class="serach_outer">
              <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
              <div class="serach_inner">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <?php if(get_theme_mod('vw_automobile_lite_loader_enable',true)==1){ ?>
    <div id="preloader">
      <div id="status">
        <?php $vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_loader_icon','Two Way');
          if($vw_automobile_lite_theme_lay == 'Two Way'){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/two-way.gif" alt="" role="img"/>
        <?php }else if($vw_automobile_lite_theme_lay == 'Dots'){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/dots.gif" alt="" role="img"/>
        <?php }else if($vw_automobile_lite_theme_lay == 'Rotate'){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rotate.gif" alt="" role="img"/>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

  <?php if ( is_singular() && has_post_thumbnail() ) : ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'vw-automobile-lite-post-image-cover' );
      $post_image = $thumb['0'];
    ?>
    <div class="header-image bg-image" style="background-image: url(<?php echo esc_url( $post_image ); ?>)">
      <?php the_post_thumbnail( 'vw-automobile-lite-post-image' ); ?>
    </div>

  <?php elseif ( get_header_image() ) : ?>
  <div class="header-image bg-image" style="background-image: url(<?php header_image(); ?>)">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>">
    </a>
  </div>
  <?php endif; ?>
</header>