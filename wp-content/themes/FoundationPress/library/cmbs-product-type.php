<?php
add_filter('cmb2-taxonomy_meta_boxes', 'cmb2_taxonomy_product_types_metaboxes');
function cmb2_taxonomy_product_types_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_product_type_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['term_img_metabox'] = array(
		'id'            => 'term_img_metabox',
		'title'         => __( 'Product Type Image', 'cmb2' ),
		'object_types'  => array( 'product-types', ), // Taxonomy
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'        => array(
			array(
				'name'       => __( 'Image Upload', 'cmb2' ),
				'id'         => $prefix . 'image',
				'type'       => 'file'
			),
		),
	);

	return $meta_boxes;
}
?>
