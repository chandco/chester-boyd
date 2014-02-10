<?php


function loop_through_menu_query( $args, $list = false )
{
		$query = new WP_Query( $args );
		// The Loop
		
		//$output = print_r($args,true);
		
		if ($list)
		{
			$classes = 'food-menu-items list-only';
		} else {
			$classes = 'food-menu-items';
		}
		$output = "<ul class='" . $classes . "'>";
		while ($query->have_posts()) :
				$query->the_post();
		
		
		$large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'widescreen-large' );
		$url = $large['0'];
		$output .= "<li>";
		$output .= 		"<span>";
		
		if (has_post_thumbnail() and $list == false):
			$output .= 		"<a href='" . $url . "' data-lightbox='menu-items' title='" . get_the_title() . " - " . get_the_content() . "'>";
			$output .= 			get_the_post_thumbnail();
			$output .= 			"<h3>" . get_the_title() . "</h3>";
			$output .= 		"</a>";
		else: 
			$output .= 			"<h3>" . get_the_title() . "</h3>";
		endif;
		$output .= 		"</span>";
		$output .= 			"<p>" . get_the_content() . "</p>";	
		$output .= "</li>";
	
	
		endwhile;
		$output .= "</ul>";
		wp_reset_postdata();
	
		return $output;
}

function output_menu_items($atts)
{
	
	if ($atts["show"]):
	
	// loop through this category and output based on order
	if ($atts["id"])
	{
		$postid = $atts["id"];
	} else {
		
		global $post;
		$postid = get_the_ID();	
	}
	
	$term = get_term_by('slug', $atts["show"], 'menu-item-category');
	
	
	$children = get_term_children( $term->term_id, 'menu-item-category' );
	
	
	$output = "";
	if ($children)
	{
		foreach ($children as $child)
		{
			$child_term = get_term_by( 'id', $child, 'menu-item-category' );

			// one arg loop
			// first show the category heading
			$output .= "<h2>" . $child_term->name . "</h2>";
	
			$args = array(
			'post_type' => 'menu-item',
			'orderby' => 'meta_value',
			'meta_key' => 'wpcf-food-order',
			'order' => 'ASC',
		'nopaging' => 'true',
	'posts_per_page' => -1,
			'meta_query' => array(
					array(
						'key' => '_wpcf_belongs_food_id',
						'value' => $postid,
						'compare' => '='
						)
				),
				'tax_query' => array(
					array(
					'taxonomy' => 'menu-item-category',
					'field' => 'slug',
					'terms' => $child_term->slug
					))
								
			);
		
	
		$output .= loop_through_menu_query( $args, $args["list"] );
		}
	} else {
		
		// one arg loop
	
		$args = array(
		'post_type' => 'menu-item',
		'orderby' => 'meta_value',
		'meta_key' => 'wpcf-food-order',
		'order' => 'ASC',
	'nopaging' => 'true',
'posts_per_page' => -1,
		'meta_query' => array(
	       		array(
           			'key' => '_wpcf_belongs_food_id',
					'value' => $postid,
					'compare' => '='
					)
			),
			'tax_query' => array(
				array(
				'taxonomy' => 'menu-item-category',
				'field' => 'slug',
				'terms' => $atts["show"]
				))
							
		);
		
	
		$output .= loop_through_menu_query( $args, $args["list"] );
	
	}
	return $output;
	else:
	// can't do it without a show
	return "";
	endif;
	
}

add_shortcode('menu-display','output_menu_items');


?>