<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'catalogues_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function catalogues_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ad_catalogues_';

    ///// PDF Download
    $cmb = new_cmb2_box( array(
        'id'            => 'catalogue_meta',
        'title'         => __( 'Catalogue Download', 'cmb2' ),
        'object_types'  => array( 'catalogues', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Download Link',
        'desc' => '',
        'id'   => $prefix . 'download_link',
        'type' => 'file',
    ) );

}
