<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Chester_Boyd
 * @since Chester Boyd 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
		For all enquiries please contact the ITA team: <a href='http://www.itavenues.co.uk/' class="no-hover">www.itavenues.co.uk</a> | <a href='mailto:hello@itavenues.co.uk'>hello@itavenues.co.uk</a> | 0207 392 3998 | 
	© Chester Boyd <?php echo date("Y"); ?>
		</div><!-- .site-info -->
		<div class="site-info">
		<?php echo do_shortcode( "[policy_links]" ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

 <script>
 
            var _gaq=[['_setAccount','UA-21561026-6'],['_trackPageview']]; //// UA-21561026-6
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            <?php if (current_user_can( "update_core")): ?>g.src='//www.google-analytics.com/u/ga_debug.js';<?php else: ?>g.src='//www.google-analytics.com/ga.js';
		
			
			
			<?php endif; ?>			
            s.parentNode.insertBefore(g,s)}(document,'script'));
			
			
		
		</script>
<?php wp_footer(); ?>
</body>
</html>
