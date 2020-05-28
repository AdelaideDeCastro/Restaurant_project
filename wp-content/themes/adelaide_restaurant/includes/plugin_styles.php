<?php
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles()
{
    // add custom css file
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css' );

    // add custom js file
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.min.js', [ 'jquery' ], time(), true );

}