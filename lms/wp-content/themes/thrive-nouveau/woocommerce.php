<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package thrive
 */

get_header(); ?>
<?php
/**
 * This file serves as a reference to
 * the generic layout of the theme.
 */
?>
<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">
	
	<?php if ( is_shop() ) { ?>
		<?php $shop_post_id = absint( get_option( 'woocommerce_shop_page_id' ) ); ?>
		<?php $shop = get_post( $shop_post_id ); ?>
		<?php if ( ! empty( $shop ) && $shop_post_id !== 0 ) { ?>
			<div id="page-hero">
				<?php do_action('thrive_before_page_title'); ?>
				<div class="page-hero-inner-wrap">
					<h1 class="entry-title no-mg-bottom">
						<a title="<?php echo esc_url( the_title() ); ?>" href="<?php echo esc_url( get_permalink( $shop->ID ) ); ?>">
							<?php echo esc_html( $shop->post_title ); ?>
						</a>
					</h1>
					<?php if ( ! empty( thrive_cmb2_pages_meta('subtitle') ) ) { ?>
						<h3 class="subtitle no-mg-bottom mg-top-5">
							<?php echo thrive_cmb2_pages_meta('subtitle') ?>
						</h3>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<?php thrive_the_page_title(); ?>
	<?php } ?>

	<div id="sidebar-wrap">
		<div id="sidebar-wrapper">
			<div id="page-sidenav" class="<?php echo thrive_layout_class('sidenav'); ?>">
				<div id="page-sidenav-section">
					<?php get_template_part( 'template-parts/sidebar', 'content' ); ?>
				</div>
			</div>
		</div>
	</div><!--#sidebar-wrap-->
	
	<div id="page-content-wrapper">

		<?php do_action( 'thrive_before_page_content' ); ?>

		<?php $layout = thrive_get_layout(); ?>

		<div class="row <?php echo esc_attr( $layout['layout'] ); ?>">
			<div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">
				<div id="primary" class="dunhakdis-card content-area thrive-page-document">
					<main id="main" class="site-main" role="main">
						<?php woocommerce_content(); ?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!--.col-md-8-->

			<div id="content-right-col" class="<?php echo esc_attr( $layout['sidebar'] ); ?>">

				<?php get_sidebar(); ?>

			</div><!--.col-md-4-->
		</div>	 
	</div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?> 
