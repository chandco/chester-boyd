<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
        <header class="entry-header">
	<div class="venue-block">	
    
    <?php if ( is_single() ): ?>
    <div class='cycle-slideshow' data-cycle-fx="scrollHorz" data-cycle-slides="img" data-cycle-prev="#Prev-<?php the_ID(); ?>" data-cycle-next="#Next-<?php the_ID(); ?>">
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
	
	$little = wp_get_attachment_image_src( $attachment->ID, 'medium' );
	$little = current($little);
	
?> 
<img src='<?php echo $big_output; ?>' width="100%" title="<?php echo $attachment->post_excerpt; ?>" alt="<?php echo $attachment->post_title; ?>" />

<?php endforeach; ?>
</div>

<?php else: ?>


<?php
			

		
	
?> 
<a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' >
<?php the_post_thumbnail('widescreen-large'); ?>
</a>


<?php endif; ?>
            <a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' ><h1 class="entry-title"><?php the_title(); ?></h1></a>

         
            
        			
                   

            </div>


		</header><!-- .entry-header -->


        
       
    <?php if ( is_single() ): ?>
    		<div class="entry-content">
    
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
            
            
</div>
            
            
            
            
                <?php endif; ?>
			<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		
        
        
        <!-- .entry-content -->


		
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		<!-- .entry-meta -->
	</article><!-- #post -->
