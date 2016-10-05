<?php
function reg_image_sizes() {
    //add_image_size( 'thumbnail', 500, 200, true );
    add_image_size( 'medium', 480, 0, false );
    add_image_size( 'medium-large', 500, 0, false );
    add_image_size( 'large', 600, 0, false );
}
add_action( 'after_setup_theme', 'reg_image_sizes' );

function banner_image_sizes() {
    //add_image_size( 'thumbnail', 500, 200, true );
    add_image_size( 'banner-medium', 1280, 0, false );
    add_image_size( 'banner-medium-large', 1440, 0, false );
    add_image_size( 'banner-large', 1920, 0, false );
}
add_action( 'after_setup_theme', 'reg_image_sizes' );
