<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'fp_banner_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function fp_banner_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_fp_banner_';

    /**
     * Initiate the metabox
     */
    $cmb_primary = new_cmb2_box( array(
        'id'            => 'banner_meta_primary',
        'title'         => __( 'Front Page Main Banner', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'front-page'),
        'show_on_cb' => 'ad_metabox_include_front_page'
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb_primary->add_field( array(
        'id'          => 'banner_main_group_1',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
         'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Banner Left', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Banner Block', 'cmb2' ),
            'remove_button' => __( 'Remove Banner Block', 'cmb2' ),
            'sortable'      => false, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Banner Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Banner Link',
        'description' => 'Write a short description for this entry',
        'id'   => 'link',
        'type' => 'text_url'
    ) );

    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Banner Image',
        'id'   => 'image',
        'type' => 'file',
    ) );

    $group_field_id = $cmb_primary->add_field( array(
        'id'          => 'banner_main_group_2',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Banner Middle', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Banner Block', 'cmb2' ),
            'remove_button' => __( 'Remove Banner Block', 'cmb2' ),
            'sortable'      => false, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Block Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Block Link',
        'description' => 'Write a short description for this entry',
        'id'   => 'link',
        'type' => 'text_url'
    ) );

    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Block Image',
        'id'   => 'image',
        'type' => 'file',
    ) );

    $group_field_id = $cmb_primary->add_field( array(
        'id'          => 'banner_main_group_3',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Banner Right', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Banner Block', 'cmb2' ),
            'remove_button' => __( 'Remove Banner Block', 'cmb2' ),
            'sortable'      => false, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Block Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Block Link',
        'description' => 'Write a short description for this entry',
        'id'   => 'link',
        'type' => 'text_url'
    ) );

    $cmb_primary->add_group_field( $group_field_id, array(
        'name' => 'Block Image',
        'id'   => 'image',
        'type' => 'file',
    ) );


    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'banner_meta_secondary',
        'title'         => __( 'Front Page Repeatable Banner', 'cmb2' ),
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
        'id'          => 'banner_block_group',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Banner Block {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another banner Block', 'cmb2' ),
            'remove_button' => __( 'Remove banner Block', 'cmb2' ),
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
        'name' => 'Block Title Colour',
        'id'   => 'colour',
        'type' => 'radio',
        'options'          => array(
            'red' => __( 'Red', 'cmb2' ),
            'blue'   => __( 'Blue', 'cmb2' ),
            'grey'     => __( 'Grey', 'cmb2' ),
        ),
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
