<?php
/**
 * Template Name: Homepagey
 * 
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */


get_header(); ?>


<div id="homepage-panels" class="cycle-slideshow" data-cycle-speed="600" data-cycle-timeout="4000" data-cycle-fx="fade" data-cycle-slides="div">


<?php
		global $post;
		$hotPosts = get_posts( array('numberposts' => -1, 'post_type' => 'homepage-panels') );
		foreach( $hotPosts as $post ) { 
			setup_postdata( $post );
			
			$url = get_post_meta(get_the_id(), 'wpcf-hp-destination');
			$destination = $url[0];
		?>
       
       
			<div > <a href="<?php echo $destination; ?>"><?php the_post_thumbnail('carousel'); ?></a> <a href="<?php echo $destination; ?>"></a>
	          <hgroup class="homepage-title">
	          
              	 <h2><a href="<?php echo $destination; ?>"><?php the_title(); ?></a></h2>
                  <h3><a href="<?php echo $destination; ?>"><?= the_excerpt() ?></a></h3>
	          </hgroup>
            
              
            <!-- <div class="whats-hot-excerpt"></div> -->
	        </div>
	          
		<?php } ?>
</div>

	<div id="primary" class="site-content">
		<div id="content" role="main">









<div id="homepage-intro">
<?php if ( have_posts() ) : ?>

			<?php // Start the Loop  ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
            
        <?php endif; ?>


</div>
















		</div><!-- #content -->
 
 <section id="ita-intro">
 
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ITA_GROUP.png" class="ita-group"  width="200" />
  
  <div class="ita-logo">
 <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ITA_LOGO_DARKBG.png" width="200" />
 
 <div class="ita-cta">
 To allow us to put our all into what we do best, delivering fine food and seamless service, all enquiries and reservations for Chester Boyd and our venues are handled by our dedicated sales partner, ITA*.

 
<a href='<?php echo get_site_url(); ?>/ita/'>Read More...</a>
</div>
 </div>
 
 </section>
        
        <div id="blog-panels">
        <h3>Latest News</h3>

<?php
		global $post;
		$hotPosts = get_posts( array('numberposts' => 3, 'post_type' => 'post') );
		foreach( $hotPosts as $post ) { 
			setup_postdata( $post );
		?>
			<div class="whats-hot-block">
	          <a href="<?php the_permalink(); ?>"><div class="whats-hot-image">
	          	  <?php the_post_thumbnail('old-blog-thumb'); ?>
                  <h3><?php the_title(); ?></h3>
	          </div>
              </a>
    
              
	        </div>
	      
		<?php } ?>
</div>
        
        
        
	</div><!-- #primary -->
    
    

<?php get_footer(); ?>