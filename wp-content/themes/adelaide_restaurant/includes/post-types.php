<?php
function restaurant_register_post_types() {

	//Post-type Employee
	register_post_type( 'employee', [
		'labels'				=> [
			'name'			=> __( 'Employees', 'restaurant_project' ),
			'singular_name'	=> __( 'Employee', 'restaurant_project' ),
			'add_new'		=> 'Add new employee',
			'add_new_item'	=> 'New employee',
			'edit_item'		=> 'Edit employee',
		],
		'menu_icon'           	=> 'dashicons-groups',
		'public'              	=> true,
		'publicly_queryable'	=> true,
		'has_archive'         	=> false,
		'show_in_menu'        	=> true,
		'show_in_nav_menus'   	=> false,
		'exclude_from_search' 	=> false,
		'rewrite'             	=> [ 'with_front' => true ],
		'supports'            	=> [ 'title', 'thumbnail', 'editor' ],
	] );

	//Post type News
	register_post_type( 'last_news', [
		'labels'				=> [
			'name'			=> __( 'News', 'restaurant_project' ),
			'singular_name'	=> __( 'News', 'restaurant_project' ),
			'add_new'		=> 'Add new News',
			'add_new_item'	=> 'New news',
			'edit_item'		=> 'Edit news',		
		],
		'menu_icon'				=> 'dashicons-megaphone',
		'public'				=> true,
		'publicly_queryable'	=> true,
		'has_archive'			=> false,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> false,
		'exclude_from_search'	=> false,
		// 'rewrite'				=> [ 'with_front' => true ],
		'supports'            	=> [ 'title', 'thumbnail', 'editor' ],
	] );
}

add_action( 'init', 'restaurant_register_post_types' );