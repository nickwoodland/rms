<?php
/* Code for custom metaboxes.
Requires CMB2, as managed by composer.
*/
add_action( 'cmb2_admin_init', 'products_form_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function products_form_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ad_products_';

    $options_tables = array();
    $options_tables[0]='Please select...';

    if( class_exists( TablePress ) ) {
        $table_q_args = array(
            'post_type' => 'tablepress_table',
            'posts_per_page' => -1
        );
        $table_query = get_posts($table_q_args);
        $tablepress_lookup_json = get_option('tablepress_tables');
        $tablepress_lookup_decode = json_decode($tablepress_lookup_json, true);
        $tablepress_lookup = array_flip($tablepress_lookup_decode['table_post']);

        foreach($table_query as $table):
            $table_id = $tablepress_lookup[$table->ID];
            $options_tables[$table_id] = $table->post_title;
        endforeach;

    }

    $options_accessories = array();
    $options_accessories[0]='Please select...';

    $accessory_q_args = array(
        'post_type' => 'products',
        'posts_per_page' => -1,
        'tax_query' => array(
    		array(
    			'taxonomy' => 'product-types',
    			'field'    => 'slug',
    			'terms'    => 'accessories',
    		),
    	),
    );
    $accessory_query = get_posts($accessory_q_args);

    foreach($accessory_query as $accessory):
        $options_accessories[$accessory->ID] = $accessory->post_title;
    endforeach;

    $related_products = array();
    $related_products[0]='Please select...';

    $r_prod_q_args = array(
        'post_type' => 'products',
        'posts_per_page' => -1,
    );
    $r_prod_query = get_posts($r_prod_q_args);

    foreach($r_prod_query as $r_prod):
        $related_products[$r_prod->ID] = $r_prod->post_title;
    endforeach;

    ///// Product ref
    $cmb = new_cmb2_box( array(
        'id'            => 'ref_meta',
        'title'         => __( 'Product Reference', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Reference Code',
        'desc' => '',
        'id'   => $prefix . 'ref_code',
        'type' => 'text',
    ) );

    ///// GALLERY

    $cmb = new_cmb2_box( array(
        'id'            => 'gallery_meta',
        'title'         => __( 'Product Gallery', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Gallery Images',
        'desc' => '',
        'id'   => $prefix . 'gallery_images',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // Optional, override default text strings
        'options' => array(
            'add_upload_files_text' => 'Add Images', // default: "Add or Upload Files"
            'remove_image_text' => 'Remove Image', // default: "Remove Image"
        ),
    ) );


    ///// FINISHES CHECKBOXES


    $cmb = new_cmb2_box( array(
        'id'            => 'finishes_meta',
        'title'         => __( 'Product Finishes', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name' => 'Select Finishes',
        'desc' => '',
        'id'   => $prefix . 'finishes',
        'type' => 'multicheck',
        'options' => array(
            'bzp' => 'Bright Zinc Plate',
            'pg' => 'Pre Galvanised',
            'hdg' => 'Hot Dip Galvanised',
            'epc' => 'Epoxy Powder Coat',
            'ss' => 'Stainless Steel',
            'wp' => 'Waterproof',
            'br' => 'Brass',
            'ch' => 'Chrome',
            'ali' => 'Aluminium',
            'mg' => 'Magnelis'
        ),
    ) );


    //// REPEATABLE TABLE SELECT


    $cmb = new_cmb2_box( array(
        'id'            => 'table_meta',
        'title'         => __( 'Table Select', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Add Product Tables', 'cmb2' ),
        //'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'table_dropdown',
        'type'       => 'select',
        'options'    => $options_tables,
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        'repeatable'      => true,
    ) );


    //// ACCESSORIES REPEATABLE

    $cmb = new_cmb2_box( array(
        'id'            => 'accesories_meta',
        'title'         => __( 'Product Accessories', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Select Accessory', 'cmb2' ),
        //'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'select_accessory',
        'type'       => 'select',
        'options'    => $options_accessories,
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
         'repeatable'      => true,
    ) );


    //// TECH SPEC GROUP

    $cmb = new_cmb2_box( array(
        'id'            => 'tech_spec_meta',
        'title'         => __( 'Tech Spec', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
    //    'show_on'      => array( 'key' => 'id', 'value' => $fp_id ),
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'tech_spec_group',
        'type'        => 'group',
        //'description' => __( 'Generates reusable form entries', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Tech Spec Row {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Tech Spec Row', 'cmb2' ),
            'remove_button' => __( 'Remove Tech Spec Row', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Row Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Row Image',
        'id'   => 'image',
        'type' => 'file',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Row Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            //'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => 4, // rows="..."
            //'tabindex' => '',
            //'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            //'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => true, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            //'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    //// RELATED PRODUCTS REPEATABLE

    $cmb = new_cmb2_box( array(
        'id'            => 'related_meta',
        'title'         => __( 'Related Products', 'cmb2' ),
        'object_types'  => array( 'products', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Select Related Products', 'cmb2' ),
        //'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'select_r_products',
        'type'       => 'select',
        'options'    => $related_products,
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
         'repeatable'      => true,
    ) );


}
