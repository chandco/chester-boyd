<?php


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
	$args = array(
		'post_type' => 'menu-items',
		'meta_key' => 'wpcf-food-order',
		'orderby' => 'meta_value_num',
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
		$query = new WP_Query( $args );
		// The Loop
		
		$output = $args;
		while ($query->have_posts()) :
				$query->the_post();

	
		$output .= "<div class='food-menu-item'>";
		$output .= 		"<span>";
		$output .= 			the_post_thumbnail();
		$output .= 			"<h3>" . the_title() . "</h3>";
		$output .= 		"</span>";
		$output .= 			"<p>" . the_content() . "</p>";	
		$output .= "</div>";
	
	
		endwhile;
	
	
	return $output;
	else:
	// can't do it without a show
	return "";
	endif;
	
	
	
}

add_shortcode('menu-display','output_menu_items');


?>