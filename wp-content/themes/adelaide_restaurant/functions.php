<?php 
//Register menu
require_once( 'includes/setup.php' );

//Register admin page
require_once( 'includes/function-admin.php' );

//Register widget footer
require_once( 'includes/register_sidebar.php' );

//Register post-types
require_once( 'includes/post-types.php' );

// Register all the CSS and JS
require_once( 'includes/plugin_styles.php' );

// Register custom WPBakery
require_once( 'includes/vc_includes.php' );

//Remove JQuery migrate
function remove_jquery_migrate( $scripts ) {
   if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];

   		if ( $script->deps ) { 
		// Check whether the script has any dependencies
        $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
 		}
 	}
 }

add_action( 'wp_default_scripts', 'remove_jquery_migrate' );


// function mg_news_pagination_rewrite() {
//   add_rewrite_rule('restaurant_project/news/page/?([0-9])', 'home.php?pagename=news&paged=$matches[1]', 'top');
// 	// flush_rewrite_rules( false );
// }

// add_action('init', 'mg_news_pagination_rewrite');


