<?php

/**
 * Enqueue scripts
 */
function wordpress_drones_scripts() {

    wp_enqueue_script( 'vendor-scripts', THEMEURI . '/js/vendor.min.js', [], '0.1.0', true );
    wp_enqueue_script( 'scripts', THEMEURI . '/js/main.js', ['vendor-scripts'], '0.1.0+261-1512132331273', true );

}
add_action( 'wp_enqueue_scripts', 'wordpress_drones_scripts' );

/**
 * Enqueue styles
 */
function wordpress_drones_styles() {

    wp_enqueue_style( 'styles', get_stylesheet_uri(), [], '0.1.0+526-1512132331272');

}
add_action( 'wp_enqueue_scripts', 'wordpress_drones_styles' );