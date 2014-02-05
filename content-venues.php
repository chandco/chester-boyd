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
		
		$little = wp_get_attachment_image_src( $attachment->ID, 'old-blog-thumb' );
		$little = current($little);
		
	?> 
	<img src='<?php echo $big_output; ?>' width="100%" title="<?php echo $attachment->post_excerpt; ?>" alt="<?php echo $attachment->post_title; ?>" />
	
	<?php endforeach; ?>
</div>
<?php else: ?>

	<?php
                
                $imageArgs = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'numberposts' => 1,
        'post_status' => null,
        'post_parent' => get_the_ID(),
        'orderby' => 'menu_order'
    ); 
    $attachments = get_posts($imageArgs);

		foreach ($attachments as $attachment):
				
			$little = wp_get_attachment_image_src( $attachment->ID, 'old-blog-thumb' );
			$little = current($little);
			
		?> 
		<a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' ><img src='<?php echo $little; ?>' width="100%" title="<?php echo $attachment->post_excerpt; ?>" alt="<?php echo $attachment->post_title; ?>" /></a>
		
		<?php endforeach; ?>
<?php endif; ?>
            
           
            <?php if (is_single()): ?>
           
                    <hgroup>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                       <h2 class="caption"><?php echo get_post_meta( get_the_ID(), "wpcf-address", true); ?></h2> 
                    </hgroup>
                    
            <?php else: ?>
         
         <a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' >
                    <hgroup>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                       <h2 class="caption"><?php echo get_post_meta( get_the_ID(), "wpcf-address", true); ?></h2> 
                    </hgroup>
                  </a>
            
			<?php endif; ?>
            

    </div>
    </header><!-- .entry-header -->


		
        
       
    <?php if ( is_single() ): ?>
        <div class="entry-content">
			<?php 
			
			/*
			<img src='<?php echo(types_render_field( "crest", array( "url" => "true" ) )); ?>' style="float:left;margin-right:-15px;" /><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			
			*/?>
           <h2><?php echo get_post_meta( get_the_ID(), "wpcf-caption", true); ?></h2>
           
           <?php the_content(); ?>
            
            
			<div class="ita-link"><a href="http://www.itavenues.co.uk/venues/<?php echo the_slug(); ?>">For more information, and to book this venue head over to &nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/ita.jpg" alt="ITA*" /></a></div>

            
            
      </div>      
            
        <?php else: ?>
        
        <?php 
		/*
        <img src='<?php echo(types_render_field( "crest", array( "url" => "true" ) )); ?>' style="float:left;margin-right:-15px;" />
		*/
		?>
       <a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' > <div class="entry-content">
        <?php echo get_post_meta( get_the_ID(), "wpcf-caption", true); ?>
        </div></a>
        
        <?php endif; ?>
		
        	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		
        
        
        <!-- .entry-content -->


		
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		<!-- .entry-meta -->
	</article><!-- #post -->
