<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package thrive
 */

?>
</div><!--.row-->
<?php if ( ! is_page_template('page-templates/canvas.php') ) { ?>
</div><!-- #content -->
<?php } ?>
</div><!--.row-->
</div><!--#page-container">-->
</div><!--#page-row-->

<div class="row">

	<div id="site-footer-section" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">

	<?php if ( is_active_sidebar( 'sidebar-footer-area' ) ) { ?>

		<div id="thrive_footer_widget">
			<div class="container-fluid">
    			<div class="limiter">
    				<div class="col-md-12">
    					<?php thrive_footer_widget(); ?>
    				</div>
    			</div>
			</div>
		</div>

	<?php } ?>

	<footer id="thrive_footer" class="site-footer" role="contentinfo">

		<div class="site-info">

			<div class="container-fluid">

				<div class="row">

					<div id="thrive_footer_copytext" class="col-xs-12">

						<?php

							$thrive_allowed_html_tags = array(
						    	'a' => array(
						        	'href' => array(),
						        	'title' => array()
						    	),
						    	'br' => array(),
						    	'em' => array(),
						    	'strong' => array(),
							);

						?>

						<?php $thrive_default_copytext = __( '&copy; [Your Website Name Here] 2015. All Rights Reserved.', 'thrive-nouveau'); ?>

						<?php $thrive_copytext = get_theme_mod( 'thrive_customizer_footer_copyright_text', $thrive_default_copytext ); ?>

						<?php if ( !empty( $thrive_copytext ) ) { ?>

							<?php echo wp_kses( $thrive_copytext, $thrive_allowed_html_tags ); ?>

						<?php } else { ?>

							<?php echo wp_kses( $thrive_default_copytext, $thrive_allowed_html_tags ); ?>

						<?php } ?>

					</div> <!--.col-xs-12-->
				</div> <!--.row-->
			</div><!--.container-fluid-->

		</div><!-- .site-info -->

	</footer><!-- #thrive_footer-->
</div><!--#site-footer-section-->
</div><!--.row-->

</div><!--.site-content -(header.php)-->
</div><!-- #page-container-->
<?php do_action( 'thrive_after_body' ); ?>
</div><!-- #page -->

<div id="thrive-scroll-to-top">
	<a href="#" title="<?php esc_html_e('Scroll to top','thrive-nouveau'); ?>">
		<span class="sr-only">
			<?php esc_html_e('Scroll to top','thrive-nouveau'); ?>
		</span>
		<i class="material-icons md-24">vertical_align_top</i>
	</a>
</div>

</div><!--#thrive-global-wrapper-->
<!-- Mobile Menu -->
<div id="main-menu-mobile-wrap">
	<div class="main-menu-mobile-wrap__inner-wrap">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'primary',
			));
		?>
	</div>
</div>
<!-- Mobile Menu End. -->
<?php wp_footer(); ?>
</body>
</html>
