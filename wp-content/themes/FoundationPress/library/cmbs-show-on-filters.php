<?php
/**
 * Include metabox on front page
 * @author Ed Townend
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function ad_metabox_include_front_page( $display, $meta_box ) {

    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return false;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
add_filter( 'cmb2_show_on', 'ad_metabox_include_front_page', 10, 2 );

function ad_metabox_include_partners_page( $display, $meta_box ) {

    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'partners' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $partners_page = get_page_by_path('partners');

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return false;
    }



    // there is a front page set and we're on it!
    return $post_id == $partners_page->ID;
}
add_filter( 'cmb2_show_on', 'ad_metabox_include_partners_page', 10, 2 );
