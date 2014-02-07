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
		'post_type' => 'menu-item',
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
		
		$output = print_r($args,true);
		$output = "<ul class='food-menu-items'>";
		while ($query->have_posts()) :
				$query->the_post();

	
		$output .= "<li>";
		$output .= 		"<span>";
		$output .= 			get_the_post_thumbnail();
		$output .= 			"<h3>" . get_the_title() . "</h3>";
		$output .= 		"</span>";
		$output .= 			"<p>" . get_the_content() . "</p>";	
		$output .= "</li>";
	
	
		endwhile;
		$output .= "</ul>";
	
	return $output;
	else:
	// can't do it without a show
	return "";
	endif;
	
	
	
}

add_shortcode('menu-display','output_menu_items');


?>