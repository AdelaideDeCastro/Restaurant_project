<?php
// Function to create widgets
add_action( 'widgets_init', 'restaurant_widget_setup' );

function restaurant_widget_setup() {
	register_sidebar( array(
		'name'			=> __( 'Footer 1', 'restaurant' ),
		'id'			=> 'footer1',
		'description'	=> __( 'First column footer', 'restaurant' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 2', 'restaurant' ),
		'id'			=> 'footer2',
		'description'	=> __( 'Second column footer', 'restaurant' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 3', 'restaurant' ),
		'id'			=> 'footer3',
		'description'	=> __( 'Therd column footer', 'restaurant' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );
}