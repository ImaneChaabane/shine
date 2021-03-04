<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VW Automobile Lite
 */

get_header(); ?>

<main id="maincontent" role="main">
  <div class="middle-align container">
    <?php
      $vw_automobile_lite_left_right = get_theme_mod( 'vw_automobile_lite_theme_options','Right Sidebar');
    if($vw_automobile_lite_left_right == 'Left Sidebar'){ ?>
      <div class="row">
        <div class="col-lg-4 col-md-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-8 col-md-8">         
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' , get_post_format() );
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }else if($vw_automobile_lite_left_right == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">         
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' , get_post_format() ); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else if($vw_automobile_lite_left_right == 'One Column'){ ?>
        <div id="our-services" class="services">                   
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' , get_post_format() ); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
    <?php }else if($vw_automobile_lite_left_right == 'Three Columns'){ ?>
      <div class="row">
        <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-6 col-md-6">          
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' , get_post_format() ); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
      </div>
    <?php }else if($vw_automobile_lite_left_right == 'Four Columns'){ ?>
      <div class="row">
        <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-3 col-md-3">           
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' , get_post_format() );
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
        <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
      </div>
    <?php }else if($vw_automobile_lite_left_right == 'Grid Layout'){ ?>
      <div class="row">
        <div id="our-services" class="services col-md-9">
          <div class="row">           
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/grid-layout' ); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          </div>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-md-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else{?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">          
          <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' , get_post_format() ); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_automobile_lite_blog_pagination_hide_show',true) != '') { ?>
            <div class="navigation">
              <?php vw_automobile_lite_blog_posts_pagination(); ?>
                <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php } ?>
    <div class="clearfix"></div>
  </div>
</main>

<?php get_footer(); ?>