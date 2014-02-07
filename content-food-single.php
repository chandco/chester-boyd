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
		
		
		
			<?php if (has_post_thumbnail()): ?>
			<header class="entry-header post-thumbnail-header">
			<?php the_post_thumbnail('widescreen-large'); ?>
			<h1 class="entry-title post-thumbnail-header"><?php the_title(); ?></h1>
            	</header><!-- .entry-header -->
            <?php else: ?>
            <header class="entry-header">
           	<h1 class="entry-title"><?php the_title(); ?></h1>
            	</header><!-- .entry-header -->
            <?php endif; ?>
			
		
		
			
	

		
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		
		<footer class="entry-meta">
			
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
