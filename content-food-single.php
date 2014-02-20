<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */
?>
	<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		
		/*
			$media = get_attached_media( 'image' );	
			foreach ($media as $image):
			
			$output = wp_get_attachment_image_src( $image->ID, 'widescreen-large' );		
			
			print_r( $output ); echo "" . "<BR />";
			endforeach;
			*/
			?>
          <header class="entry-header post-thumbnail-header">  
              <div class='cycle-slideshow venue-block' data-cycle-fx="scrollHorz" data-cycle-slides="img" data-cycle-prev="#Prev-<?php the_ID(); ?>" data-cycle-next="#Next-<?php the_ID(); ?>">
        
        
        <span id='Prev-<?php the_ID(); ?>' class="prev">Prev</span><span id='Next-<?php the_ID(); ?>' class="next">Next</span>
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
			
		$big_output = wp_get_attachment_image_src( $attachment->ID, 'widescreen-large' );
		$big_output = current($big_output);
		
		$little = wp_get_attachment_image_src( $attachment->ID, 'old-blog-thumb' );
		$little = current($little);
		
	?> 
	<img src='<?php echo $big_output; ?>' width="100%" title="<?php echo $attachment->post_excerpt; ?>" alt="<?php echo $attachment->post_title; ?>" />
	
	<?php endforeach; ?>
</div>
		
			
			
			<h1 class="entry-title post-thumbnail-header"><?php the_title(); ?></h1>
            	</header><!-- .entry-header -->
         
			
		
		
			
	

		
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		
		<footer class="entry-meta">
			
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
