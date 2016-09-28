<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'partners_grid_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function partners_grid_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_partners_grid_';

    $options_partners = array();
    $options_partners[0]='Please select...';

    $partners_page = get_page_by_path('partners');
    $partners_children = get_pages(array('child_of'=>$partners_page->ID));

    foreach($partners_children as $partner):
        $options_partners[$partner->ID] = $partner->post_title;
    endforeach;

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'partners_grid_meta',
        'title'         => __( 'Partners Page Grid', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'partners'),
        'show_on_cb' => 'ad_metabox_include_partners_page'
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'partners_grid_block_group',
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
        'id'   => 'link',
        'type' => 'select',
        'options'    => $options_partners,
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Block Image',
        'id'   => 'image',
        'type' => 'file',
    ) );

}

add_action( 'cmb2_admin_init', 'partners_sub_page_metaboxes' );
function partners_sub_page_metaboxes() {

    $prefix = '_partners_page_';

    $options[0]='Please select...';
    if( class_exists( RGFormsModel ) ) {
        foreach( RGFormsModel::get_forms(null, 'title') AS $form):
            $options[$form->id] = $form->title;
        endforeach;
    }
    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'partners_page_form_meta',
        'title'         => __( 'Partners Page Form', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/partners.php'),
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Pick a Form', 'cmb2' ),
        //'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'form_dropdown',
        'type'       => 'select',
        'options'    => $options,
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'partners_page_file_meta',
        'title'         => __( 'Partners Page File Downloads', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/partners.php'),
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'partners_file_download_group',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'File {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another File', 'cmb2' ),
            'remove_button' => __( 'Remove File', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'File Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'File Upload',
        'id'   => 'link',
        'type' => 'file',
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'File Image',
        'id'   => 'image',
        'type' => 'file',
    ) );
}
