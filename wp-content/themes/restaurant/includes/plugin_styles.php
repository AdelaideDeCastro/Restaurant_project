<?php
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles()
{
    wp_enqueue_script( 'consulting-front', get_template_directory_uri() . '/script.js', [ 'jquery' ], time(), true );
    /*
     * Always include last
     */
    wp_enqueue_style( 'theme', get_stylesheet_uri(), array(), time() );
}