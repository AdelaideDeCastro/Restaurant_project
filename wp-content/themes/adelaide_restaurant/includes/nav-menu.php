<?php
// Function to create menu
add_action( 'after_setup_theme', 'restaurant_theme_setup' );

function restaurant_theme_setup()
{
    register_nav_menus( array (
                            'header_menu' => 'Header Menu',
                        ) );

    // Add theme support
    add_theme_support( 'html5' );

    add_theme_support( 'post-thumbnails' );


}