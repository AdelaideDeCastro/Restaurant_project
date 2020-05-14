<?php 
function restaurant_enqueue_script() {

	// add custom css file	
	wp_enqueue_style( 'main-css', get_template_directory_uri(). '/assets/css/main.css' );

	// add custom js file
	wp_enqueue_script( 'main-js', get_template_directory_uri(). '/assets/js/main.min.js', array(), null, true );

}

add_action( 'wp_enqueue_scripts', 'restaurant_enqueue_script' );