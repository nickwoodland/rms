<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'fp_grid_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function fp_grid_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_fp_grid_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'grid_meta',
        'title'         => __( 'Front Page Grid', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'front-page'),
        'show_on_cb' => 'ad_metabox_include_front_page'
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'grid_block_group',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Grid Block {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Grid Block', 'cmb2' ),
            'remove_button' => __( 'Remove Grid Block', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Block Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Block Link',
        'description' => 'Write a short description for this entry',
        'id'   => 'link',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Block Image',
        'id'   => 'image',
        'type' => 'file',
    ) );

}
