<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
        
        <?php
		
		global $post;
		if ($post->post_type != "post" AND $post->post_type != "page"):
		
		$args = array (
				"post_type" => $post->post_type,
				"posts_per_page" => -1,
				"orderby" => "menu_order"
				);
				
				$menu = get_posts($args);
		
		if ($menu): 
		$post_type_object = get_post_type_object( $post->post_type );
		
		?>
        <h3><?php echo $post_type_object->labels->name; ?> </h3>
        <ul class="sidebar-navigation">
        
        <?php foreach ($menu as $menuItem): ?>
		
			<li><a href="<?php echo get_permalink($menuItem->ID); ?>"><?php echo $menuItem->post_title; ?></a></li>		
			
		<?php
		endforeach; ?>
        </ul>
        <?php
		endif; // if there was a menu
		
		 
        elseif ($post->post_type == "post"):
		
		
		$tags = get_categories(); //get_terms( 'category', array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10 ) ); // Always query top tags

		?>
        <h2 style="margin-bottom:3px">News Categories</h2>
		<ul class="sidebar-navigation">
		<?php foreach ($tags as $tag): ?>
		
			<li><a href="<?php echo get_term_link( $tag ); ?>"><?php echo $tag->name; ?></a></li>		
			
		<?php
		endforeach; ?>
		  </ul>
          
          
          <?php the_widget( 'WP_Widget_Tag_Cloud', 'Tag Cloud', 'post_tag' ); ?>
		
		<?php
		endif;  // is_archive();
		
		?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>