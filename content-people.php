<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		
	
    
     

            <div class="venue-block">	
          
            
          
			<header class="entry-header post-thumbnail-header">
			
		<?php if (is_archive()): ?>
            
                    <a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' >
                    <?php the_post_thumbnail('square-thumbnail'); ?>
                    </a>
                    <a href='<?php the_permalink(); ?>' title='<?php echo $attachment->post_title; ?>' >
                    <hgroup>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <h2 class="job-description"><?php echo get_post_meta( get_the_ID(), "title", true); ?></h2>
                    </hgroup>
                    </a>
		 <?php else: ?>
             <?php the_post_thumbnail('widescreen-large'); ?>
          	 <hgroup>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <h2 class="job-description"><?php echo get_post_meta( get_the_ID(), "title", true); ?></h2>
            </hgroup>
        <?php endif; ?>    
           
          
            
            
             	</header><!-- .entry-header -->

            </div>

           
             
	


		<div class="entry-content">
        
       
    <?php if ( is_single() ): ?>
       
       
       <?php
       $quote = get_post_meta( get_the_ID(), "quote", true);
	   if ($quote): ?>
       <div class="people-quote">
            <?php echo $quote; ?>
            </div>
        <?php endif; ?>
            
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
            

            
           
            
        <?php else: ?>
        <?php echo get_post_meta( get_the_ID(), "wpcf-caption", true); ?>
        <p><?php echo get_post_meta( get_the_ID(), "wpcf-introduction", true); ?>
        <?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div>
        
        
        <!-- .entry-content -->


		
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		<!-- .entry-meta -->
	</article><!-- #post -->
