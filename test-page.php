<?php
/**
 * Template Name: Test Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */

 ?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/49bfbad0-793b-451a-afbc-6e749f58e156.css"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle2.min.js" ></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/transit.js" ></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/tricks.js" ></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/lightbox/js/lightbox-2.6.min.js'></script>
<link href="<?php echo get_template_directory_uri(); ?>/js/lightbox/css/lightbox.css" rel="stylesheet" />
</head>

<body <?php body_class('preload'); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<hgroup class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/chesterboyd.jpg" alt="CHESTER BOYD" /></a>
            
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

<div style="100%;height:200px;background:#df8783;"></div>
	<div id="main" class="wrapper">
      



<div id="homepage-panels" class="cycle-slideshow" data-cycle-speed="600" data-cycle-timeout="4000" data-cycle-fx="fade" data-cycle-slides="img">
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
		
	
	$big_output = wp_get_attachment_image_src( $attachment->ID, 'carousel' );
	$big_output = current($big_output);
	
	
?> 
<img src='<?php echo $big_output; ?>' width="100%" title="<?php echo $attachment->post_excerpt; ?>" alt="<?php echo $attachment->post_title; ?>" />

<?php endforeach; ?>
</div>	     
            

	     </div>     
	<div id="primary" class="site-content">
		
       

        
        <div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>