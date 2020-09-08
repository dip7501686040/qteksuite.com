<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
 * Options for the import (step 1).
 */

$this->render_header();

$generator = $data->generator;

$config = new DemoConfig();

$demo = $config->get( filter_input(INPUT_GET, 'demo_id', FILTER_SANITIZE_STRING));

wp_enqueue_style( 'wxr-importer-import', get_template_directory_uri() . '/installer/assets/import.css', array(), '20160909' );

wp_enqueue_script( 'wxr-importer-import', get_template_directory_uri() . '/installer/assets/select-options.js', array('jquery'), '20160909' );

if ( preg_match( '#^http://wordpress\.org/\?v=(\d+\.\d+\.\d+)$#', $generator, $matches ) )
{
	$generator = sprintf( __( 'WordPress %s', 'thrive-nouveau' ), $matches[1] );
}

?>
<h3>
	<?php esc_html_e('Step 2 of 3:', 'thrive-nouveau'); ?>
	<small style="font-weight: 300;">
		<?php esc_html_e('Install 3rd Party Plugins.', 'thrive-nouveau'); ?>
	</small>
</h3>

<div class="welcome-panel" id="dsc-import">

	<div class="welcome-panel-content">
		<h3 style="margin-top: 0; font-weight: 300;">
			<?php echo sprintf( esc_html__( 'You have chosen: %s', 'thrive-nouveau' ), $demos['name'] );  ?>
		</h3>

		<p id="import-3rd-party-plugin-notification">
			<span id="import-3rd-party-plugin-notification-icon" class="dashicons dashicons-warning"></span>
			<?php
				esc_html_e( 'Your import is almost ready to go. Before we begin,
					be sure to check out the \'Required Plugins\' to make sure
					every post type data and other 3rd party plugins data will be imported.', 'thrive-nouveau' )
			?>
		</p>

		<div class="welcome-panel-column-container">

			<div class="welcome-panel-column">

				<?php if ( ! empty( $demo['plugins'] ) ) { ?>

					<h4>
						<?php esc_html_e( 'Required Plugins', 'thrive-nouveau' ) ?>
					</h4>
					<p>
						<?php esc_html_e('This demo requires the following plugins to be
						installed and activated, plugins listed below that are checked does not require any actions:','thrive-nouveau'); ?>
					</p>
					<?php if ( !empty( $demo['plugins'] ) ) { ?>

						<?php $plugins_count = count( $demo['plugins'] ); ?>

						<h4><?php esc_html_e('Legend', 'thrive-nouveau'); ?></h4>

						<p>
							<span style="margin-top: 0px" class="importer-plugins-is-active dashicons dashicons-no-alt"></span>
							&mdash; <?php esc_html_e('Needs to be installed and activated', 'thrive-nouveau'); ?> <br/>
							<span style="margin-top: 0px" class="importer-plugins-is-active dashicons dashicons-yes"></span>
							&mdash; <?php esc_html_e('Already installed and activated', 'thrive-nouveau'); ?>
						</p>

						<ul id="import-wizard-demo-plugins-list" style="display: inline-block;">

							<?php add_thickbox(); ?>
							<?php $active_plugins = thrive_installer_get_active_plugins(); ?>
							<?php $count_active_plugins = 0; ?>
							<?php foreach( $demo['plugins'] as $plugin ) { ?>
								<li style="float: none">
									<a class="thickbox open-plugin-details-modal" href="<?php echo admin_url('plugin-install.php'); ?>?tab=plugin-information&plugin=<?php echo $plugin['slug'] ;?>&TB_iframe=true&width=772&height=435">
										<?php if ( in_array($plugin['slug'], $active_plugins) ) { ?>
											<?php $count_active_plugins++ ?>
											<span class="importer-plugins-is-active dashicons dashicons-yes"></span>
										<?php } else { ?>
											<span class="importer-plugins-is-active dashicons dashicons-no-alt"></span>
										<?php } ?>
										<?php echo trim( esc_html( $plugin['name'] ) ); ?>
									</a>
								</li>
							<?php } ?>

						</ul>

						<div class="clear"></div>

						<p>
						<?php $selected_demo = filter_input(INPUT_GET, 'demo_id', FILTER_SANITIZE_STRING); ?>

							<a class="button button-large button-secondary"
								href="<?php echo admin_url('themes.php?page=tgmpa-install-plugins&demo='
								. esc_html($selected_demo) );?>">
								<span style="margin: 3.5px 0 0 -5px;" class="dashicons dashicons-admin-plugins"></span>
								<?php echo esc_html__('Click to begin installing and activating required plugins', 'thrive-nouveau'); ?>
							</a>
						</p>
					<?php } else { ?>

						<p>
							<em><?php echo esc_html('No plugins required for this demo', 'thrive-nouveau'); ?></em>
						</p>

					<?php } ?>
				<?php } ?>

			</div><!-- Required Plugin -->

			<div style="clear:both; margin-bottom: 30px;"></div>

			<hr/>
			<div class="welcome-panel-column half">

				<h3><?php esc_html_e( 'Summary', 'thrive-nouveau' ) ?></h3>

				<ul>
					<li>
						<span class="dashicons dashicons-admin-post"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d post (including CPTs)', '%d posts (including CPTs)', $data->post_count, 'thrive-nouveau' ),
							$data->post_count
						));
						?>
					</li>
					<li>
						<span class="dashicons dashicons-admin-media"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d media item', '%d media items', $data->media_count, 'thrive-nouveau' ),
							$data->media_count
						));
						?>
					</li>
					<li>
						<span class="dashicons dashicons-admin-users"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d user', '%d users', count( $data->users ), 'thrive-nouveau' ),
							count( $data->users )
						));
						?>
					</li>
					<li>
						<span class="dashicons dashicons-admin-comments"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d comment', '%d comments', $data->comment_count, 'thrive-nouveau' ),
							$data->comment_count
						));
						?>
					</li>
					<li>
						<span class="dashicons dashicons-category"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d term', '%d terms', $data->term_count, 'thrive-nouveau' ),
							$data->term_count
						));
						?>
					</li>
				</ul>
			</div><!--Import Summary-->
			<div class="welcome-panel-column half">
				<h3><?php esc_html_e( 'Import Facts', 'thrive-nouveau' ) ?></h3>
				<ul>
					<li>
						<?php
						echo wp_kses( sprintf(
							__( 'Exported from <a href="%1$s">%2$s</a>', 'thrive-nouveau' ),
							esc_url( $data->home ),
							esc_html( $data->title )
						), 'data' );
						?>
					</li>
					<li>
						<?php
						echo esc_html( sprintf(
							__( 'Generated by %s', 'thrive-nouveau' ),
							$generator
						));
						?>
					</li>
					<li>
						<?php
						echo esc_html( sprintf(
							__( 'Format: WXR v%s', 'thrive-nouveau' ),
							$data->version
						));
						?>
					</li>
				</ul>
			</div><!-- Import Facts -->
		</div>
	</div>
</div>

<?php $demo_id = filter_input(INPUT_GET, 'demo_id', FILTER_SANITIZE_STRING); ?>

<div id="importer-form-action">

	<form action="<?php echo admin_url( 'themes.php?page=dsc-demo-installer&step=3&demo=' . esc_attr( $demo_id ) ); ?>" method="post">

		<?php if ( ! empty( $data->users ) ) : ?>
			<div style="position: absolute; height: 0px; overflow: hidden; z-index: 0;">
				<h3>
					<?php esc_html_e( 'Assign Authors', 'thrive-nouveau' ) ?>
				</h3>
				<p><?php
					echo wp_kses(
						__( 'To make it easier for you to edit and save the imported content, you may want to reassign the author of the imported item to an existing user of this site. For example, you may want to import all the entries as <code>admin</code>s entries.', 'thrive-nouveau' ),
						'data'
					);
				?></p>

				<?php if ( $this->allow_create_users() ) : ?>

					<p><?php printf( esc_html__( 'If a new user is created by WordPress, a new password will be randomly generated and the new user&#8217;s role will be set as %s. Manually changing the new user&#8217;s details will be necessary.', 'thrive-nouveau' ), esc_html( get_option( 'default_role' ) ) ) ?></p>

				<?php endif; ?>

				<ol id="authors">

					<?php foreach ( $data->users as $index => $users ) : ?>

						<li><?php $this->author_select( $index, $users['data'] ); ?></li>

					<?php endforeach ?>

				</ol>
			</div>
		<?php endif; ?>

		<?php if ( $this->allow_fetch_attachments() ) : ?>

			<h3><?php esc_html_e( 'Import Attachments', 'thrive-nouveau' ) ?></h3>
			<p>
				<input type="checkbox" checked value="1" name="fetch_attachments" id="import-attachments" />
				<label for="import-attachments"><?php
					esc_html_e( 'Download and import file attachments', 'thrive-nouveau' ) ?></label>
			</p>

		<?php endif; ?>

		<input type="hidden" name="import_id" value="<?php echo esc_attr( $this->id ) ?>" />

		<input type="hidden" name="demo_id" value="<?php echo esc_attr( $demo_id ) ?>" />

		<?php wp_nonce_field( sprintf( 'wxr.import:%d', $this->id ) ) ?>

		<p>
			<input type="checkbox" name="plugins_activated" id="import-plugins-activated" />
			<label for="import-plugins-activated">
				<?php
				esc_html_e( 'I have already installed and activated all required plugins', 'thrive-nouveau' ) ?>
			</label>
		</p>

		<?php submit_button(
			__( 'Start Importing', 'thrive-nouveau'),
			array('primary', 'button-large'),
			'', true,
			array(
					'disabled' => 'disabled',
					'id' => 'import-plugins-button'
				)
			)
		?>

	</form>

</div>

<div style="clear:both"></div>

<?php

$this->render_footer();
