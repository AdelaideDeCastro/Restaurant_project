<?php 
//Register menu
require_once( 'includes/nav-menu.php' );

//Register widget footer
require_once( 'includes/register_sidebar.php' );

//Register post-types
require_once( 'includes/post-types.php' );

// Register all the CSS and JS
require_once( 'includes/plugin_styles.php' );

// Register custom WPBakery
require_once( 'includes/vc_includes.php' );


// Check plugins
$js_composer = activate_plugin( 'js_composer/js_composer.php' );
if ( is_wp_error( $js_composer ) ) {
    // Process Error
    echo $js_composer->error_data;
}


function restaurant_enqueue_script() {

	// add custom css file	
	wp_enqueue_style( 'main-css', get_template_directory_uri(). '/assets/css/main.css' );

	// add custom js file
	wp_enqueue_script( 'main-js', get_template_directory_uri(). '/assets/js/main.min.js', array(), null, true );

}

add_action( 'wp_enqueue_scripts', 'restaurant_enqueue_script' );


// Add theme support
add_theme_support( 'html5' );

add_theme_support( 'post-thumbnails' );