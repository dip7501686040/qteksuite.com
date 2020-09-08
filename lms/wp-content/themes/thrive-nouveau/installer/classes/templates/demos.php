<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

wp_enqueue_style( 'wxr-impsorter-import', get_template_directory_uri() . '/installer/assets/import.css', array(), '20160909' );

$config = new DemoConfig();

$demos = $config->getAll();
?>

<h3>
	<?php esc_html_e('Step 1 of 3:', 'thrive-nouveau'); ?>
	<small style="font-weight: 300;">
		<?php esc_html_e('Please select a demo to get started.', 'thrive-nouveau'); ?>
	</small>
</h3>

<?php if ( ! class_exists( 'XMLReader') ): ?>
	<div id="import-wizard-error">
		<p>
			<strong><?php esc_html_e('Server Error: PHP XMLReader Class is Not Found', 'thrive-nouveau'); ?></strong>
		</p> <br/>
		<p>
			<?php echo esc_html_e('You need to install or enable the said PHP module before you can start importing. Contact your hosting provider for more details.', 'thrive-nouveau'); ?>
		</p>
	</div>
<?php endif; ?>

<div id="dsc-demo-importer-demos-list">
	<?php if ( ! empty( $demos ) ): ?>
		<ul id="dsc-demo-importer-demos-list-ul">
			<?php foreach( $demos as $index => $demo ): ?>
				<li class="dsc-demo-importer-demos-list-item">
					<div class="dsc-demo-importer-demos-list-item-wrap">
						<div class="dsc-demo-importer-demos-list-item-wrap-inner">
							<div class="demo-import-details">
								<img class="dsc-demo-importer-demos-list-item-image" 
								src="<?php echo esc_attr( $demo['image'] ); ?>" />
							</div>
							<div class="demo-import-meta">
								<h3 class="demo-import-meta-title">
									<?php echo esc_html( $demo['name'] ); ?>
								</h3>
								<?php if ( class_exists( 'XMLReader') ): ?>
									<a href="<?php echo admin_url('themes.php?page=dsc-demo-installer&step=2&demo_id='.$index); ?>" 
										class="button button-primary"
										title"<?php esc_html_e('Select Demo', 'thrive-nouveau'); ?>"
										>
										<?php esc_html_e('Select Demo', 'thrive-nouveau'); ?>		
									</a>&nbsp;
									<a href="<?php echo admin_url('themes.php?page=tgmpa-install-plugins&demo='.$index); ?>" 
										class="button button-secondary"
										title="<?php esc_html_e('Install Plugins', 'thrive-nouveau'); ?>"
										>
										<?php esc_html_e('Install Plugins', 'thrive-nouveau'); ?>		
									</a>
								<?php else: ?>	
									<a href="#" disabled class="button button-primary"
										title"<?php esc_html_e('Select Demo', 'thrive-nouveau'); ?>"
										>
										<?php esc_html_e('Select Demo', 'thrive-nouveau'); ?>		
									</a>&nbsp;
									<a href="#" class="button button-secondary" disabled title="<?php esc_html_e('Install Plugins', 'thrive-nouveau'); ?>"
										>
										<?php esc_html_e('Install Plugins', 'thrive-nouveau'); ?>		
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>