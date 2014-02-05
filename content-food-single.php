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
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		
			<?php if (has_post_thumbnail()): ?>
			<header class="entry-header post-thumbnail-header">
			<?php the_post_thumbnail('widescreen-large'); ?>
			<h1 class="entry-title post-thumbnail-header">
            <?php else: ?>
            <header class="entry-header">
           	<h1 class="entry-title">
            <?php endif; ?>
			
			<?php if ( is_single() ) : ?>
			<?php the_title(); ?>
			<?php else : ?>

				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>


			<?php endif; // is_single() ?>
  			</h1>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
