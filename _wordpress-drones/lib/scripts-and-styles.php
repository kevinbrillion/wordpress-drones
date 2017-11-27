<?php

/**
 * Enqueue scripts
 */
function wordpress_drones_scripts() {

    wp_enqueue_script( 'scripts', THEMEURI . '/js/main.js', [], '0.1.0+65-1511789237725', true );

}
add_action( 'wp_enqueue_scripts', 'wordpress_drones_scripts' );

/**
 * Enqueue styles
 */
function wordpress_drones_styles() {

    wp_enqueue_style( 'styles', get_stylesheet_uri(), [], '0.1.0+243-1511789237724');

}
add_action( 'wp_enqueue_scripts', 'wordpress_drones_styles' );