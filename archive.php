<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Chester Boyd already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
	

<?php if (get_post_type( ) != "posts"): ?>

<div id="homepage-panels" class="cycle-slideshow" data-cycle-speed="600" data-cycle-timeout="2000" data-cycle-fx="fade" data-cycle-slides="div" data-cycle-prev="#Prev" data-cycle-next="#Next">


<?php
		$args = "media_tags=" . get_post_type( ) . "-carousel&tags_compare=AND&orderby=menu_order&order=DESC";
				
				// WE COULD REPLACE THIS WITH A SIMPLER QUERY, JUST IMAGES WITH THE PARENT BUT THIS WAY MEANS WE CAN SET A ROOM IMAGE AS A VENUE IMAGE
			$images = get_attachments_by_media_tags($args);
			
		foreach ($images as $theImage)
		{
		$output = wp_get_attachment_image_src( $theImage->ID, 'carousel' );
		?>
       
       
			<div >
	          <span class="homepage-title">
	          	 <img src='<?php echo $output[0]; ?>' />
	          </span>
            
              
            <!-- <div class="whats-hot-excerpt"></div> -->
	        </div>
	          
		<?php } ?>
</div>

<?php endif; ?>

    	<div id="content" role="main">

			<header class="archive-header">

<?php 

$postType = get_post_type_object( get_post_type( ) );

echo "<h1 class=\"archive-title\">" . $postType->labels->name . "</h1>\n";
echo "<div class=\"archive-meta\">" . nl2br($postType->description) . "</div>";

//echo "<pre>" . print_r($postType, 1) . "</pre>";
?></header>
		<?php if ( have_posts() ) : ?>
			

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();


				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_type( ) );
			endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php if (get_post_type( ) == "posts") get_sidebar(); ?>
<?php get_footer(); ?>