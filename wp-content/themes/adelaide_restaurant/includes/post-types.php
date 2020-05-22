<?php
function restaurant_register_post_types() {

	//Post-type Employee
	register_post_type( 'emprloyee', [
		'labels'	=> [
			'name'			=> __( 'Employees', 'restaurant_project' ),
			'singular_name'	=> __( 'Employee', 'restaurant_project' ),
			'add_new'		=> 'Add new employee',
			'add_new_item'	=> 'New employee',
			'edit_item'		=> 'Edit employee',
		],
		'menu_icon'           => 'dashicons-groups',
		'public'              => true,
		'publicly_queryable'  => true,
		'has_archive'         => false,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'exclude_from_search' => false,
		'rewrite'             => [ 'with_front' => true ],
		'supports'            => [ 'title', 'thumbnail', 'editor' ],
	]);
}

add_action( 'init', 'restaurant_register_post_types' );