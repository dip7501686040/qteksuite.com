<div class="wrap">

	<h1 class="inline-heading">
		<?php esc_html_e('Thrive Setup Wizard', 'thrive-nouveau'); ?>
	</h1>

	<div id="export-panel">
		
		<?php

		$importer_ui = new WXR_Import_UI();
		
		$step = (int)filter_input(INPUT_GET, 'step', FILTER_SANITIZE_NUMBER_INT);

		switch($step) {
			case 1:
				// Step 1 shows demo list.
				$importer_ui->show_demo_list();
				break;
			case 2:
				// Step 2 Shows the confirmation.
				$importer_ui->dispatch_import_step();
				break;
			case 3:
				// Step 3 shows the progress.
				$demo_id = filter_input(INPUT_POST,'demo_id', FILTER_SANITIZE_STRING);
				$importer_ui->display_import_progress();
				

				// Import Widgets
				$widget = new DSC\Widgets\WidgetImportExport( $demo_id );
				$widget->import();

				// Import Customizer
				$customizer = new DSC\Customizer\ImportExport( $demo_id );
				$customizer->import();
				
				break;

			default:
				// Step 4 shows the list of demos.
				$importer_ui->show_demo_list();
				break;
		}
		?>
	</div>

	<?php $importer_ui->show_export_button(); ?>
	
</div>

