<?php
/**
 * The template part for displaying content
 *
 * @package VW Automobile Lite 
 * @subpackage vw_automobile_lite
 * @since VW Automobile Lite 1.0
 */
?>
<?php 
  $vw_automobile_lite_archive_year  = get_the_time('Y'); 
  $vw_automobile_lite_archive_month = get_the_time('m'); 
  $vw_automobile_lite_archive_day   = get_the_time('d'); 
?>
<?php
  $vw_automobile_lite_toggle_postdate = get_theme_mod( 'vw_automobile_lite_toggle_postdate' );
  if ( 'Disable' == $vw_automobile_lite_toggle_postdate ) {
   $colmd = 'col-lg-12 col-md-12';
  } else { 
   $colmd = 'col-lg-10 col-md-10';
  } 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <?php $vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_blog_layout_option','Default');
    if($vw_automobile_lite_theme_lay == 'Default'){ ?>
      <?php the_post_thumbnail(); ?>
      <div class="row">
        <?php if ( 'Disable' != $vw_automobile_lite_toggle_postdate ) {?>
          <div class="col-lg-2 col-md-2">
            <div class="datebox">
              <div class="date-monthwrap">
                <span class="date-month"><a href="<?php echo esc_url( get_day_link( $vw_automobile_lite_archive_year, $vw_automobile_lite_archive_month, $vw_automobile_lite_archive_day)); ?>"><?php echo esc_html( get_the_date( 'M' ) ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>

                <span class="date-day"><a href="<?php echo esc_url( get_day_link( $vw_automobile_lite_archive_year, $vw_automobile_lite_archive_month, $vw_automobile_lite_archive_day)); ?>"><?php echo esc_html( get_the_date( 'd') ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
              </div>
              <div class="yearwrap">
                <span class="date-year"><a href="<?php echo esc_url( get_day_link( $vw_automobile_lite_archive_year, $vw_automobile_lite_archive_month, $vw_automobile_lite_archive_day)); ?>"><?php echo esc_html( get_the_date( 'Y' ) ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="<?php echo esc_html( $colmd ); ?>">
          <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <div class="new-text">
            <div class="entry-content">
              <p>
                <?php $vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_excerpt_settings','Excerpt');
                if($vw_automobile_lite_theme_lay == 'Content'){ ?>
                  <?php the_content(); ?>
                <?php }
                if($vw_automobile_lite_theme_lay == 'Excerpt'){ ?>
                  <?php if(get_the_excerpt()) { ?>
                    <?php $excerpt = get_the_excerpt(); echo esc_html( vw_automobile_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_automobile_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_automobile_lite_excerpt_suffix',''));?>
                  <?php }?>
                <?php }?>
              </p>
            </div>
          </div>
          <?php if( get_theme_mod('vw_automobile_lite_button_text','READ MORE') != ''){ ?>
            <div class="content-bttn">
              <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_automobile_lite_button_text',__('READ MORE','vw-automobile-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_automobile_lite_button_text',__('READ MORE','vw-automobile-lite')));?></span></a>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }else if($vw_automobile_lite_theme_lay == 'Center'){ ?>
      <div class="new-text">
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'vw_automobile_lite_toggle_postdate',true) != '' || get_theme_mod( 'vw_automobile_lite_toggle_author',true) != '' || get_theme_mod( 'vw_automobile_lite_toggle_comments',true) != '') { ?>
          <div class="metabox">
            <?php if(get_theme_mod('vw_automobile_lite_toggle_postdate',true)==1){ ?>
              <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_automobile_lite_archive_year, $vw_automobile_lite_archive_month, $vw_automobile_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_automobile_lite_toggle_author',true)==1){ ?>
              <span class="entry-author"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_toggle_author_icon','far fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_automobile_lite_toggle_comments',true)==1){ ?>
              <span class="entry-comments"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_toggle_comments_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','vw-automobile-lite'), __('0 Comments','vw-automobile-lite'), __('% Comments','vw-automobile-lite')); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="box-image">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="new-text">
          <div class="entry-content">
            <p>
              <?php $vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_excerpt_settings','Excerpt');
              if($vw_automobile_lite_theme_lay == 'Content'){ ?>
                <?php the_content(); ?>
              <?php }
              if($vw_automobile_lite_theme_lay == 'Excerpt'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <?php $excerpt = get_the_excerpt(); echo esc_html( vw_automobile_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_automobile_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_automobile_lite_excerpt_suffix',''));?>
                <?php }?>
              <?php }?>
            </p>
          </div>
        </div>
        <?php if( get_theme_mod('vw_automobile_lite_button_text','READ MORE') != ''){ ?>
          <div class="content-bttn">
            <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_automobile_lite_button_text',__('READ MORE','vw-automobile-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_automobile_lite_button_text',__('READ MORE','vw-automobile-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php }else if($vw_automobile_lite_theme_lay == 'Left'){ ?>
      <div class="new-text">
        <div class="box-image">
          <?php the_post_thumbnail(); ?>
        </div>
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'vw_automobile_lite_toggle_postdate',true) != '' || get_theme_mod( 'vw_automobile_lite_toggle_author',true) != '' || get_theme_mod( 'vw_automobile_lite_toggle_comments',true) != '') { ?>
          <div class="metabox">
            <?php if(get_theme_mod('vw_automobile_lite_toggle_postdate',true)==1){ ?>
              <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_automobile_lite_archive_year, $vw_automobile_lite_archive_month, $vw_automobile_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_automobile_lite_toggle_author',true)==1){ ?>
              <span class="entry-author"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_toggle_author_icon','far fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_automobile_lite_toggle_comments',true)==1){ ?>
              <span class="entry-comments"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_toggle_comments_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','vw-automobile-lite'), __('0 Comments','vw-automobile-lite'), __('% Comments','vw-automobile-lite')); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="new-text">
          <div class="entry-content">
            <p>
              <?php $vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_excerpt_settings','Excerpt');
              if($vw_automobile_lite_theme_lay == 'Content'){ ?>
                <?php the_content(); ?>
              <?php }
              if($vw_automobile_lite_theme_lay == 'Excerpt'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <?php $excerpt = get_the_excerpt(); echo esc_html( vw_automobile_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_automobile_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_automobile_lite_excerpt_suffix',''));?>
                <?php }?>
              <?php }?>
            </p>
          </div>
        </div>
        <?php if( get_theme_mod('vw_automobile_lite_button_text','READ MORE') != ''){ ?>
          <div class="content-bttn">
            <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_automobile_lite_button_text',__('READ MORE','vw-automobile-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_automobile_lite_button_text',__('READ MORE','vw-automobile-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>