<?php
/**
 * Blog Section
 * 
 * @package Blossom_Travel
 */

$sec_title= get_theme_mod( 'blog_section_title', __( 'Explore all New Trending Stories', 'blossom-travel' ) );
$blog     = get_option( 'page_for_posts' );
$label    = get_theme_mod( 'blog_view_all', __( 'View More', 'blossom-travel' ) );
$index = 1; 

$args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 5,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query( $args );

if( $sec_title || $qry->have_posts() ){ ?>

<section id="blog_section" class="trending-stories-section">
	<div class="container">
        
        <?php if( $sec_title ) echo '<h2 class="section-title">' . esc_html( $sec_title ) . '</h2>'; ?>
        
        <?php if( $qry->have_posts() ){ ?>
            <div class="section-grid">
    			<?php 
                while( $qry->have_posts() ){
                    $qry->the_post(); ?>
                    <article class="post<?php if( $index == 1 || $index == 2 ) echo ' large-post'; ?>">
                        <figure class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                            <?php 
                                if( $index == 1 || $index == 2 ){
                                    $image_size = 'blossom-travel-blog';
                                }else{
                                    $image_size = 'thumbnail';
                                }
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                }else{ 
                                    blossom_travel_get_fallback_svg( $image_size );
                                }                            
                            ?>                        
                            </a>
                        </figure>
    					<header class="entry-header">
                            
                            <?php if( $index == 1 || $index == 2 ) {
                                blossom_travel_category(); ?>
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php } ?>
                            <div class="entry-meta">
                                <?php
                                    if( $index != 1 && $index != 2 ) blossom_travel_category();
                                    if( $index == 1 || $index == 2 ) blossom_travel_posted_on();
                                    if( $index == 1 || $index == 2 ) blossom_travel_comment_count();
                                ?>
                            </div>
                            <?php if( $index != 1 && $index != 2 ) { ?>
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php blossom_travel_posted_on(); ?>
                            <?php } ?>                          
    					</header>
        			</article>			
        			<?php $index++;
                }
                ?>
    		</div>
    		
            <?php if( $blog && $label ){ ?>
                <div class="button-wrap">
        			<a href="<?php the_permalink( $blog ); ?>" class="btn-readmore"><?php echo esc_html( $label ); ?></a>
        		</div>
            <?php } ?>
        
        <?php } 
        wp_reset_postdata(); ?>
	</div>
</section>
<?php 
}