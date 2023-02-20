<?php
/**
 * Template file for footer area
 */
?>
<!-- Footer Section -->

<footer class="site-footer">		
	<div class="container">
		<?php if ( is_active_sidebar( 'footer_widget_area_left' ) || is_active_sidebar( 'footer_widget_area_center' ) ||  is_active_sidebar( 'footer_widget_area_right' )):	
			 get_template_part('sidebar','footer');
			 endif;?>		
		<div class="row">
				<div class="col-md-12">
					<div class="site-info wow fadeIn animated" data-wow-delay="0.4s">
					    <p><?php esc_html_e('Proudly powered by', 'spicepress-dark'); ?>&nbsp;<a href="<?php echo esc_url( __( 'https://wordpress.org', 'spicepress-dark' ) ); ?>"><?php esc_html_e('WordPress', 'spicepress-dark'); ?></a><?php esc_html_e('| Theme:', 'spicepress-dark');?>&nbsp;<a href="<?php echo esc_url( __( 'https://spicethemes.com/spicepress-dark-wordpress-theme/', 'spicepress-dark' ) ); ?>" rel="nofollow"><?php esc_html_e('SpicePress Dark', 'spicepress-dark'); ?></a> <?php esc_html_e('by','spicepress-dark');?><a href="<?php echo esc_url( __('https://spicethemes.com', 'spicepress-dark')); ?>" rel="nofollow">  <?php esc_html_e('SpiceThemes', 'spicepress-dark');?></a></p>
					</div> 			
				</div>			
		</div>			
	</div>
</footer>
<!-- /Footer Section -->
<div class="clearfix"></div>
</div><!--Close of wrapper-->
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top--> 
<?php wp_footer(); ?>
</body>
</html>