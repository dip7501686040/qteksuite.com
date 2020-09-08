<?php
if ( ! apply_filters('thrive/welcome-screen', true) )
{
	return;
}

add_action("after_switch_theme", "thrive_welcome_screen_activate", 10 ,  2);

function thrive_welcome_screen_activate()
{
	set_transient( 'thrive_welcome_screen_activation_redirect', true, 30 );

    return;
}

add_action( 'admin_init', 'thrive_welcome_screen_do_activation_redirect' );

function thrive_welcome_screen_do_activation_redirect()
{
  	// Bail if no activation redirect
	if ( ! get_transient( 'thrive_welcome_screen_activation_redirect' ) ) {
    	return;
  	}

  	// Delete the redirect transient
  	delete_transient( 'thrive_welcome_screen_activation_redirect' );

  	// Bail if activating from network, or bulk
  	if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    	return;
  	}

  	// Redirect to about page
  	wp_safe_redirect( add_query_arg( array( 'page' => 'thrive-about' ), admin_url( 'themes.php' ) ) );
}

add_action('admin_menu', 'thrive_welcome_screen_pages');

function thrive_welcome_screen_pages() {
	add_theme_page(
    	esc_attr__('Welcome To Thrive', 'thrive-nouveau'),
    	esc_attr__('About Thrive', 'thrive-nouveau'),
    	'read',
    	'thrive-about',
    	'thrive_welcome_screen_content'
  );
}

function thrive_welcome_screen_content() { ?>
  <div class="wrap about-wrap">
    <?php $theme = wp_get_theme(); ?>
    <h1>
      <?php printf( esc_html__('Welcome to Thrive %s "Nouveau"', 'thrive-nouveau'), $theme->get('Version') ); ?>
    </h1>
    <div class="about-text">
        <?php
          esc_html_e("Thanks for choosing Thrive WordPress Theme!
          We hope that you enjoy using this theme. Read the instructions below to get started.", 'thrive-nouveau');
        ?>
    </div>

    <h3><?php esc_html_e('Getting Started', 'thrive-nouveau'); ?></h3>
    <p>
    	<?php esc_html_e('Start customizing your website. Change the logo, color scheme, fonts, and more.', 'thrive-nouveau'); ?>
    </p>
    <ol>
   		 <li>
    		<a target="_blank" href="<?php echo admin_url('themes.php?page=dsc-demo-installer'); ?>" title="<?php esc_html_e('Activate Recommended Plugins', 'thrive-nouveau'); ?>">
    			<?php esc_html_e('Visit Set-up Wizard', 'thrive-nouveau'); ?>
    		</a>
    	</li>

    	<li>
    		<a target="_blank" href="<?php echo admin_url('customize.php'); ?>" title="<?php esc_html_e('Customize Thrive', 'thrive-nouveau'); ?>">
    			<?php esc_html_e('Customize Thrive', 'thrive-nouveau'); ?>
    		</a>
    	</li>
    </ol>

    <h3>
        <?php esc_html_e('Frequently Asked Questions', 'thrive-nouveau'); ?>
    </h3>

    <ol>
    	<li>
			<a target="__blank" title="<?php esc_html_e('Memory Limit Issues', 'thrive-nouveau'); ?>"
				href="//dunhakdis.com/wordpress-increase-php-memory-limit/">
				<?php esc_html_e('Memory Limit Issues', 'thrive-nouveau'); ?>
			</a>
		</li>
    	<li>
			<a title="<?php esc_html_e('Visual Composer License and Auto Updates', 'thrive-nouveau'); ?>" target="__blank"
				href="//kb.wpbakery.com/docs/faq/can-i-update-wpbakery-page-builder-if-i-have-purchased-it-in-a-theme/">
				<?php esc_html_e('Visual Composer License and Auto Updates', 'thrive-nouveau'); ?>
			</a>
		</li>
    	<li>
			<a title="<?php esc_html_e('General Errors (a.k.a 500 Internal Server Error)', 'thrive-nouveau'); ?>" target="__blank"
				href="https://wpfixit.com/wordpress-500-internal-server-error/">
				<?php esc_html_e('General Errors (a.k.a 500 Internal Server Error)', 'thrive-nouveau'); ?>
			</a>
		</li>
    </ol>
    <h3><?php esc_html_e('Get Support', 'thrive-nouveau'); ?></h3>
    <p>
      <?php
        _e('Encounter some problems while using Thrive? Send a friendly ticket to our <a target="_blank" href="http://support.dunhakdis.com/">support portal</a> and we will get back to you as soon as possible.','thrive-nouveau'); ?>
    </p>
    <p>
    	<a target="_blank" href="http://support.dunhakdis.com" class="button button-primary"><?php esc_html_e('Get Support', 'thrive-nouveau'); ?></a>
    </p>

    <h3><?php esc_html_e('Start Learning', 'thrive-nouveau'); ?></h3>

    <a target="_blank" href="https://dunhakdis.com/dsc-knowledgebase/thrive-3-0-nouveau-requirements-getting-started/" class="button button-primary">
        <?php esc_html_e('Access Theme Documentation', 'thrive-nouveau'); ?>
    </a>

    <a target="_blank" href="https://codex.buddypress.org/" class="button button">
        <?php esc_html_e('Read BuddyPress Docs', 'thrive-nouveau'); ?>
    </a>

    <?php if ( true == apply_filters('thrive/welcome-screen/follow-us', true) ) { ?>

        <h3><?php esc_html_e('Follow Us', 'thrive-nouveau'); ?></h3>

        <a target="__blank" href="//www.facebook.com/DSCOfficial" class="button button"><?php esc_html_e('Facebook', 'thrive-nouveau'); ?></a>
        <a target="__blank" href="//dunhakdis.com" class="button button"><?php esc_html_e('Visit our Website', 'thrive-nouveau'); ?></a>

    <?php } ?>

  </div>
  <?php
}

add_action( 'admin_head', 'thrive_welcome_screen_remove_menus' );

function thrive_welcome_screen_remove_menus() {
    remove_submenu_page( 'index.php', 'thrive-about' );
}
