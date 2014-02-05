<?php
/**
 * Template Name: Homepage
 * 
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">


<?php 

// we don't need this for now - the other panels work like a carousel just not animated?
//<div id="homepage-carousel">Carousel</div>
?>

<div id="homepage-intro">
<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
            
        <?php endif; ?>


</div>



<div id="homepage-panels">


<?php
		global $post;
		$hotPosts = get_posts( array('numberposts' => 3, 'post_type' => 'homepage-panels') );
		foreach( $hotPosts as $post ) { 
			setup_postdata( $post );
			
			$url = get_post_meta(get_the_id(), 'wpcf-hp-destination');
			$destination = $url[0];
		?>
			<div class="whats-hot-block">
	          <div class="whats-hot-image">
	          	  <a href="<?php echo $destination; ?>"><?php the_post_thumbnail('old-blog-thumb'); ?></a> <a href="<?php echo $destination; ?>"><h3><?php the_title(); ?></h3></a>
	          </div>
              <a href="<?php echo $destination; ?>"><div class="whats-hot-caption">
              
             
             <h3> <?php
              
			  $caption = get_post_meta(get_the_id(), 'wpcf-hover-text');
				echo ($caption[0]);
				?></h3>
              </div></a>
              
             <div class="whats-hot-excerpt"><?= the_excerpt() ?></div>
	        </div>
	          
		<?php } ?>
</div>



<div id="blog-panels">
<h3 class="whats-new"> What's New? Read all about food, people, events and more in our blog...</h3>

<?php
		global $post;
		$hotPosts = get_posts( array('numberposts' => 3, 'post_type' => 'post') );
		foreach( $hotPosts as $post ) { 
			setup_postdata( $post );
		?>
			<div class="whats-hot-block">
	          <div class="whats-hot-image">
	          	  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('old-blog-thumb'); ?></a> <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	          </div>
              <a href="<?php the_permalink(); ?>"><div class="whats-hot-caption">
              
             
             <h3>Read More...</h3>
              </div></a>
              
             <div class="whats-hot-excerpt"><?= the_excerpt() ?></div>
	        </div>
	          
		<?php } ?>
</div>











		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>