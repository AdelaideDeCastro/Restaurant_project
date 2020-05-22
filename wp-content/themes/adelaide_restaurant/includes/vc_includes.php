<?php
$directory = get_template_directory() . '/wp-bakery';

//get all files in specified directory
$sub_dirs = array_filter( glob( $directory . '/*' ), 'is_dir' );

foreach ( $sub_dirs as $dir ) {
    $folder_name      = basename( $dir );
    $folder_directory = $directory . '/' . $folder_name;

    if ( file_exists( $folder_directory . '/' . $folder_name . '.php' ) ) {
        require_once( $folder_directory . '/' . $folder_name . '.php' );
    }
}