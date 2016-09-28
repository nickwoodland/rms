<?php
function grid_interchange_string($img_id){

    if(false == $img_id):
        return false;
    endif;

    $feature_img_id = $img_id;

    //relate WP img sizes to foundation breakpoints
    $size_array = array('medium' => 'small','medium-large' => 'medium','large' => 'large');

    $return_string = '';
    $flag = true;

    foreach($size_array as $img_size => $breakpoint):

        $url = '';
        $url = wp_get_attachment_image_src($feature_img_id, $img_size);

        if($url != false):

            if($flag == true):
                $return_string = '['.$url[0].', (default)]';
            endif;

            $return_string .= ',['.$url[0].', '.$breakpoint.']';

            $flag = false;

        endif;

    endforeach;

    return $return_string;
}
