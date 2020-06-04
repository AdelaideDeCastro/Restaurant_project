<?php
/*
*	Admin page
*/
add_action('admin_menu', 'restaurant_project_create_admin_page');

//Add Restaurant admin page to WP menu
function restaurant_project_create_admin_page()
{
    add_menu_page( 'Restaurant Theme Options', 'Restaurant', 'manage_options', 'admin_restaurant', 'restaurant_theme_create_page', get_template_directory_uri() . '/img/logo.png', 110 );

    add_submenu_page( 'admin_restaurant', 'Restaurant Theme Options', 'Social', 'manage_options', 'admin_restaurant', 'restaurant_theme_create_page' );

    //Activate custom settings
    add_action( 'admin_init', 'restaurant_custom_settings' ); 
}

//Create html
function restaurant_theme_create_page()
{
	require_once( get_template_directory() . '../templates/admin-restaurant.php' );
}

//Add fielfs to Admin page
function restaurant_custom_settings()
{
	register_setting( 'restaurant-settings-group', 'reservation_email' );
	register_setting( 'restaurant-settings-group', 'facebook_handler', 'restaurant_sanitize_facebook_handler' );
	register_setting( 'restaurant-settings-group', 'twitter_handler', 'restaurant_sanitize_twitter_handler' );
	register_setting( 'restaurant-settings-group', 'tripadvisor_handler', 'restaurant_sanitize_tripadvisor_handler' );
	register_setting( 'restaurant-settings-group', 'instagram_handler', 'restaurant_sanitize_instagram_handler' );
	register_setting( 'restaurant-settings-group', 'iens_handler', 'restaurant_sanitize_iens_handler' );


	add_settings_section( 'social-options', 'Contact email', 'restaurant_contact_email', 'admin_restaurant' );

	add_settings_field( 'email', 'Restaurant contact Email', 'restaurant_email_field', 'admin_restaurant', 'social-options' );
	add_settings_field( 'facebook', 'Facebook', 'social_facebook', 'admin_restaurant', 'social-options' );
	add_settings_field( 'twitter', 'Twitter', 'social_twitter', 'admin_restaurant', 'social-options' );
	add_settings_field( 'tripadvisor', 'Tripadvisor', 'social_tripadvisor', 'admin_restaurant', 'social-options' );
	add_settings_field( 'instagram', 'Instagram', 'social_instagram', 'admin_restaurant', 'social-options' );
	add_settings_field( 'iens', 'Iens', 'social_iens', 'admin_restaurant', 'social-options' );

}

function restaurant_contact_email()
{
	echo "PIPPO";
}

//Create HTML fields to Admin page
function restaurant_email_field()
{
	$reservationEmail = esc_attr( get_option( 'reservation_email' ) );
	echo '<input type="text" name="reservation_email" value="'. $reservationEmail .'" placeholder="restaurant@example.com" />';
}

function social_facebook()
{
	$facebookHandler = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="' . $facebookHandler . '" placeholder="Facebook link" />';
}

function social_twitter()
{
	$twitterHandler = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="' . $twitterHandler . '" placeholder="Twitter link" />';
}

function social_tripadvisor()
{
	$tripadvisorHandler = esc_attr( get_option( 'tripadvisor_handler' ) );
	echo '<input type="text" name="tripadvisor_handler" value="' . $tripadvisorHandler . '" placeholder="Tripadvisor link" />';
}

function social_instagram()
{
	$instagramHandler = esc_attr( get_option( 'instagram_handler' ) );
	echo '<input type="text" name="instagram_handler" value="' . $instagramHandler . '" placeholder="Instagram link" />';
}

function social_iens()
{
	$iensHandler = esc_attr( get_option( 'iens_handler' ) );
	echo '<input type="text" name="iens_handler" value="' . $iensHandler . '" placeholder="Iens link" />';
}


//Sanitization settings
function test_sanitization( $input )
{

}

function restaurant_sanitize_facebook_handler( $input )
{
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

function restaurant_sanitize_twitter_handler( $input )
{
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

function restaurant_sanitize_tripadvisor_handler( $input )
{
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

function restaurant_sanitize_instagram_handler( $input )
{
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

function restaurant_sanitize_iens_handler( $input )
{
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

//Store social fields value

