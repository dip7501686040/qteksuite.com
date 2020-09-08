/**
 * Custom Meta CSS
 */
<?php
$customizer_prefix = 'thrive_customizer_page_';
$default_background = get_theme_mod($customizer_prefix . 'background_settings');
$metaboxes_collection = array(
		array(
				'element' => '#page-hero h1 a',
				'value' => thrive_cmb2_pages_meta('color_title'),
				'property' => 'color'
			),
		array(
				'element'=> '#page-hero h3.subtitle',
				'value' => thrive_cmb2_pages_meta('color_subtitle'),
				'property' => 'color'
		),
		array(
				'element'=> '#page-hero',
				'value' => thrive_cmb2_pages_meta('textalignment'),
				'property' => 'text-align'
		),
		array(
			'element' => '#page-hero',
			'value' => thrive_cmb2_pages_meta('background_image'),
			'property' => 'background-image',
			'prefix' => 'url(',
			'suffix' => ')'
		),
		array(
			'element' => '#page-hero .page-hero-inner-wrap:after',
			'value' => thrive_cmb2_pages_meta('background_overlay'),
			'property' => 'background'
		),
		array(
			'element' => '#page-hero',
			'value' => thrive_cmb2_pages_meta('background_position'),
			'property' => 'background-position'
		),
		array(
			'element' => '#page-hero',
			'value' => thrive_cmb2_pages_meta('background_size'),
			'property' => 'background-size'
		),
		array(
			'element' => '#page-hero',
			'value' => thrive_cmb2_pages_meta('background_repeat'),
			'property' => 'background-repeat'
		),
		array(
			'element' => '#page-hero',
			'value' => isset( $default_background['background-attachment'] ) ? $default_background['background-attachment']: 'scroll',
			'property' => 'background-attachment'
		),
		array(
			'element' => '#page-hero',
			'value' => thrive_cmb2_pages_meta( 'disable_page_header' ),
			'property' => 'display'
		)

	);
foreach($metaboxes_collection as $metabox_collection) {
	if ( ! empty( $metabox_collection['value'] )) { ?>
		<?php echo $metabox_collection['element']; ?> { 
			<?php echo $metabox_collection['property']; ?>:
			<?php if ( ! empty( $metabox_collection['prefix'] ) ) { ?>
				<?php echo $metabox_collection['prefix']; ?>
			<?php } ?>
			<?php echo esc_html( $metabox_collection['value'] ); ?>
			<?php if ( ! empty( $metabox_collection['suffix'] ) ) { ?>
				<?php echo $metabox_collection['suffix']; ?>
			<?php } ?>
			;
		}
	<?php
	} //endif
}
?>
