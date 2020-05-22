<?php
// Function to create menu
add_action( 'after_setup_theme', 'restaurant_register_nav_menu' );

function restaurant_register_nav_menu() {
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
	) );
}