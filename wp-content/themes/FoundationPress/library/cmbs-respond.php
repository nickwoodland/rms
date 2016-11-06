<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'respond_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function respond_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_respond_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'respond_meta',
        'title'         => __( 'Respond Custom Information', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'respond'),
        'show_on_cb' => 'ad_metabox_include_respond_page'
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Main Graphic',
        'desc' => '',
        'id'   => $prefix . 'graphic',
        'type' => 'file',
    ) );

    $cmb->add_field( array(
        'name' => 'Heading',
        'desc' => '',
        'id'   => $prefix . 'heading',
        'type' => 'text',
    ) );
}
