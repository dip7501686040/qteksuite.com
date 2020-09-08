<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
 * Page for the actual import step.
 */

$args = array(
	'action' => 'wxr-import',
	'id'     => $this->id,
);

$url = add_query_arg( urlencode_deep( $args ), admin_url( 'admin-ajax.php' ) );

$script_data = array(
	'count' => array(
		'posts' => $data->post_count,
		'media' => $data->media_count,
		'users' => count( $data->users ),
		'comments' => $data->comment_count,
		'terms' => $data->term_count,
	),
	'url' => $url,
	'strings' => array(
		'complete' => __( 'Import complete!', 'thrive-nouveau' ),
	),
);

$url = get_template_directory_uri() . '/installer/assets/import.js';

wp_enqueue_script( 'wxr-importer-import', $url, array( 'jquery' ), '20160909', true );
wp_localize_script( 'wxr-importer-import', 'wxrImportData', $script_data );

wp_enqueue_style( 'wxr-impsorter-import', get_template_directory_uri() . '/installer/assets/import.css', array(), '20160909' );

$this->render_header();
?>
<h3>
	<?php esc_html_e('Step 3 of 3:', 'thrive-nouveau'); ?>
	<small style="font-weight: 300;">
		<?php esc_html_e('Running Import.', 'thrive-nouveau'); ?>
	</small>
</h3>

<div class="welcome-panel">
	<div class="welcome-panel-content">
		<h2><?php esc_html_e( 'Step 3: Importing', 'thrive-nouveau' ) ?></h2>
		<div id="import-status-message" class="notice notice-info"><?php esc_html_e( 'Now importing.', 'thrive-nouveau' ) ?></div>

		<table class="import-status">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Import Summary', 'thrive-nouveau' ) ?></th>
					<th><?php esc_html_e( 'Completed', 'thrive-nouveau' ) ?></th>
					<th><?php esc_html_e( 'Progress', 'thrive-nouveau' ) ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<span class="dashicons dashicons-admin-post"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d post (including CPTs)', '%d posts (including CPTs)', $data->post_count, 'thrive-nouveau' ),
							$data->post_count
						));
						?>
					</td>
					<td>
						<span id="completed-posts" class="completed">0/0</span>
					</td>
					<td>
						<progress id="progressbar-posts" max="100" value="0"></progress>
						<span id="progress-posts" class="progress">0%</span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="dashicons dashicons-admin-media"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d media item', '%d media items', $data->media_count, 'thrive-nouveau' ),
							$data->media_count
						));
						?>
					</td>
					<td>
						<span id="completed-media" class="completed">0/0</span>
					</td>
					<td>
						<progress id="progressbar-media" max="100" value="0"></progress>
						<span id="progress-media" class="progress">0%</span>
					</td>
				</tr>

				<tr>
					<td>
						<span class="dashicons dashicons-admin-users"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d user', '%d users', count( $data->users ), 'thrive-nouveau' ),
							count( $data->users )
						));
						?>
					</td>
					<td>
						<span id="completed-users" class="completed">0/0</span>
					</td>
					<td>
						<progress id="progressbar-users" max="100" value="0"></progress>
						<span id="progress-users" class="progress">0%</span>
					</td>
				</tr>

				<tr>
					<td>
						<span class="dashicons dashicons-admin-comments"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d comment', '%d comments', $data->comment_count, 'thrive-nouveau' ),
							$data->comment_count
						));
						?>
					</td>
					<td>
						<span id="completed-comments" class="completed">0/0</span>
					</td>
					<td>
						<progress id="progressbar-comments" max="100" value="0"></progress>
						<span id="progress-comments" class="progress">0%</span>
					</td>
				</tr>

				<tr>
					<td>
						<span class="dashicons dashicons-category"></span>
						<?php
						echo esc_html( sprintf(
							_n( '%d term', '%d terms', $data->term_count, 'thrive-nouveau' ),
							$data->term_count
						));
						?>
					</td>
					<td>
						<span id="completed-terms" class="completed">0/0</span>
					</td>
					<td>
						<progress id="progressbar-terms" max="100" value="0"></progress>
						<span id="progress-terms" class="progress">0%</span>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="import-status-indicator">
			<div class="progress">
				<progress id="progressbar-total" max="100" value="0"></progress>
			</div>
			<div class="status">
				<span id="completed-total" class="completed">0/0</span>
				<span id="progress-total" class="progress">0%</span>
			</div>
		</div>
	</div>
</div>

<div id="import-log-button">
	<a class="button button-primary button-large" href="#" title="<?php esc_html_e('Toggle Import Log', 'thrive-nouveau');?>" id="import-log-btn">
		<?php esc_html_e('Click to toggle the import log', 'thrive-nouveau');?>
	</a>
</div>

<div id="import-log-wrap" style="display: none;">
	<table id="import-log" class="widefat">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Type', 'thrive-nouveau' ) ?></th>
				<th><?php esc_html_e( 'Message', 'thrive-nouveau' ) ?></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<?php

$this->render_footer();
