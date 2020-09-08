<?php
global $bp;
extract( shortcode_atts(array('title' => '' ), $atts ));

if ( function_exists( 'bp_activity_directory_permalink' ) ) {

$output = '';
$params = array('title' => $title ); 

?>

<?php buddypress()->current_component = 'activity'; ?>

<div class="gears-clearfix"></div>
	<div class="gears-shortcode-element gears-bp-activity-stream gears-clearfix">
		
		<div class="buddypress directory">
			<?php if ( ! empty( $title ) ) { ?>
				<h3><?php echo esc_html__( $title ); ?></h3>
			<?php } ?>
			<main id="buddypress-main" class="site-main-buddypress" role="main">
				<div id="buddypress" class="buddypress-wrap bp-dir-hori-nav">
					<div class="bp-wrap">
						<div id="item-body">
							<?php bp_get_template_part( 'buddypress/activity/index' ); ?>
						</div>
					</div>
				</div>
			</main>
		</div>

	</div>

<?php

} else {

	return $this->bp_not_installed;
	
}

?>
<div class="gears-clearfix"></div>