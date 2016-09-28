<?php
/*NOTE: update the '3' to the ID of your form */
add_filter( 'gform_pre_render_3', 'populate_checkbox' );
add_filter( 'gform_pre_validation_3', 'populate_checkbox' );
add_filter( 'gform_pre_submission_filter_3', 'populate_checkbox' );
add_filter( 'gform_admin_pre_render_3', 'populate_checkbox' );

add_filter('gform_init_scripts_footer', 'init_scripts');
function init_scripts() {
    return true;
}

function populate_checkbox( $form ) {

    foreach( $form['fields'] as &$field )  {

        //NOTE: replace 3 with your checkbox field id
        $field_id = 8;
        if ( $field->id != $field_id ) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retreieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_status=publish&&post_type=catalogues' );

        $input_id = 1;
        foreach( $posts as $post ) {

            //skipping index that are multiples of 10 (multiples of 10 create problems as the input IDs)
            if ( $input_id % 10 == 0 ) {
                $input_id++;
            }

            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
            $inputs[] = array( 'label' => $post->post_title, 'id' => "{$field_id}.{$input_id}" );

            $input_id++;
        }

        $field->choices = $choices;
        $field->inputs = $inputs;

    }

    return $form;
}
?>
