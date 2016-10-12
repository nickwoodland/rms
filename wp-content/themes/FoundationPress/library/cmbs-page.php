<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'page_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function page_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_page_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_title',
        'title'         => __( 'Page Subtitle', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'not-front-page'),
        'show_on_cb' => 'ad_metabox_exclude_front_page'
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Subtitle',
        'desc' => '',
        'id'   => $prefix . 'subtitle',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name' => 'Title Colour',
        'id'   => $prefix . 'title_colour',
        'type' => 'radio',
        'options'          => array(
            'red' => __( 'Red', 'cmb2' ),
            'blue'   => __( 'Blue', 'cmb2' ),
            'grey'     => __( 'Grey', 'cmb2' ),
        ),
        'default' => 'red',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'page_slider',
        'title'         => __( 'Page Slider', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'not-front-page'),
        'show_on_cb' => 'ad_metabox_exclude_front_page'
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Slide Images',
        'desc' => '',
        'id'   => $prefix . 'slide_images',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );


}
