<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thrive
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php  if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>

    <link rel="icon" href="<?php echo esc_url( thrive_favicon_url() ); ?>" type="image/x-icon" />

	<link rel="shortcut icon" href="<?php echo esc_url( thrive_favicon_url() ); ?>" type="image/x-icon" />

<?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class( array('thrive-inline') ); ?>>

<div id="thrive-global-wrapper" class="active">

	<div id="thrive-site-container" class="hfeed site">

			<div class="container-fluid" id="page-container">

				<div class="row" id="page-row">

					<div id="page" class="<?php echo thrive_layout_class('content'); ?>">

						<header id="masthead" class="site-header" role="banner">
							<?php $header_styles = array('navigation-1', 'navigation-2'); ?>
							<?php $header_style = get_theme_mod('thrive_customizer_header_style', 'navigation-1'); ?>
							<?php if ( in_array( $header_style, $header_styles ) ) {?>
								<?php get_template_part('header', $header_style); ?>
							<?php } ?>
						</header><!-- #masthead -->

						<div id="content" class="site-content thrive-container">
						<?php
						// Remove fluid on canvas template.
					 	if ( ! is_page_template('page-templates/canvas.php') ) { ?>
							<div class="container-fluid">
						<?php } ?>

							<div class="row">
								<?php do_action( 'thrive_before_content' ); ?>
 
