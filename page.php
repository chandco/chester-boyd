<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */

get_header(); ?>
      


<div id="homepage-panels" class="cycle-slideshow" data-cycle-speed="600" data-cycle-timeout="4000" data-cycle-fx="fade" data-cycle-slides="img">
        	<?php
			
			$imageArgs = array(
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'numberposts' => null,
	'post_status' => null,
	'post_parent' => get_the_ID(),
	'orderby' => 'menu_order'
); 
$attachments = get_posts($imageArgs);

foreach ($attachments as $attachment):
		
	
	$big_output = wp_get_attachment_image_src( $attachment->ID, 'carousel' );
	$big_output = current($big_output);
	
	
?> 
<img src='<?php echo $big_output; ?>' width="100%" title="<?php echo $attachment->post_excerpt; ?>" alt="<?php echo $attachment->post_title; ?>" />

<?php endforeach; ?>
</div>	     
            

	     </div>     
	<div id="primary" class="site-content">
		
       

        
        <div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>