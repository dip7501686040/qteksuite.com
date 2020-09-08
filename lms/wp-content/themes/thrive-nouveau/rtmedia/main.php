<?php
/* * **************************************
 * Main.php
 *
 * The main template file, that loads the header, footer and sidebar
 * apart from loading the appropriate rtMedia template
 * *************************************** */
// by default it is not an ajax request
global $rt_ajax_request;
$rt_ajax_request = false;
//todo sanitize and fix $_SERVER variable usage
// check if it is an ajax request
$_rt_ajax_request = rtm_get_server_var( 'HTTP_X_REQUESTED_WITH', 'FILTER_SANITIZE_STRING' );
if ( 'xmlhttprequest' === strtolower( $_rt_ajax_request ) ) {
	$rt_ajax_request = true;
}
?>
<div id="buddypress" class="buddypress-wrap bp-single-vert-nav bp-vertical-navs bp-dir-hori-nav">
<?php
//if it's not an ajax request, load headers
if ( ! $rt_ajax_request ) {
	// if this is a BuddyPress page, set template type to
	// buddypress to load appropriate headers
	if ( class_exists( 'BuddyPress' ) && ! bp_is_blog_page() && apply_filters( 'rtm_main_template_buddypress_enable', true ) ) {
		$template_type = 'buddypress';
	} else {
		$template_type = '';
	}
	//get_header( $template_type );
	if ( 'buddypress' === $template_type ) {
		//load buddypress markup
		if ( bp_displayed_user_id() ) {
			//if it is a buddypress member profile
			?>
			<?php bp_nouveau_member_hook( 'before', 'home_content' ); ?>

			<?php $is_user_nav_vertical = bp_nouveau_get_appearance_settings('user_nav_display'); ?>
			
			<?php if ( $is_user_nav_vertical ) { ?>
				<!-- Main Vertical Navigation -->
				<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>
					<?php bp_get_template_part( 'members/single/parts/item-nav' ); ?>
				<?php endif; ?>
			<?php } ?>

			<div class="bp-wrap">

			<div id="item-body" class="item-body" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>
				<?php do_action( 'bp_before_member_media' ); ?>

					<nav class="bp-navs bp-subnavs no-ajax user-subnav" id="subnav">
						<ul class="subnav rtmedia-nav">
							<?php rtmedia_sub_nav(); ?>
							<?php do_action( 'rtmedia_sub_nav' ); ?>
						</ul>
					</nav>

				<?php
			} else if ( bp_is_group() ) { // not a member profile, but a group ?>

				<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

					<?php $is_user_nav_vertical = bp_nouveau_get_appearance_settings('user_nav_display'); ?>
			
					<?php if ( $is_user_nav_vertical ) { ?>
						<!-- Main Vertical Navigation -->
						<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>
							<?php bp_get_template_part( 'members/single/parts/item-nav' ); ?>
						<?php endif; ?>
					<?php } ?>

					<div class="bp-wrap">
						
					<div id="item-body" class="item-body">
						
						<?php do_action( 'bp_before_group_body' ); ?>
						<?php do_action( 'bp_before_group_media' ); ?>

						<nav class="bp-navs bp-subnavs no-ajax user-subnav" id="subnav">
							<ul class="subnav rtmedia-nav">
								<?php rtmedia_sub_nav(); ?>
								<?php do_action( 'rtmedia_sub_nav' ); ?>
							</ul>
						</nav>
						
					<?php endwhile;
					endif; // group/profile if/else
			}
	} else { //if BuddyPress ?>
	<div class="bp-wrap">
	<div id="item-body" class="item-body">
	<?php } } // if ajax
		// include the right rtMedia template
		rtmedia_load_template();
		if ( ! $rt_ajax_request ) {
			if ( function_exists( 'bp_displayed_user_id' ) && 'buddypress' === $template_type && ( bp_displayed_user_id() || bp_is_group() ) ) {
				if ( bp_is_group() ) {
					do_action( 'bp_after_group_media' );
					do_action( 'bp_after_group_body' );
				}
				if ( bp_displayed_user_id() ) {
					do_action( 'bp_after_member_media' );
					do_action( 'bp_after_member_body' );
				}
			}
			?>
			</div><!--#item-body-->
			</div><!-- // .bp-wrap -->
			<?php
			if ( function_exists( 'bp_displayed_user_id' ) && 'buddypress' === $template_type && ( bp_displayed_user_id() || bp_is_group() ) ) {
				if ( bp_is_group() ) {
					do_action( 'bp_after_group_home_content' );
				}
				if ( bp_displayed_user_id() ) {
					do_action( 'bp_after_member_home_content' );
				}
			}
		}
		//close all markup
		?>
	</div><!--#buddypress-->
<?php
//get_sidebar($template_type);
//get_footer($template_type);
// if ajax
