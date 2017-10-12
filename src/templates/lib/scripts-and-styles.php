<?php

/**
 * Enqueue scripts
 */
function @@theme_name_scripts() {
@@vendor_scripts
    wp_enqueue_script( 'scripts', THEMEURI . '/js/main.js', [@@vendor_script_dependencies], @@script_version, true );

}
add_action( 'wp_enqueue_scripts', '@@theme_name_scripts' );

/**
 * Enqueue styles
 */
function @@theme_name_styles() {
@@vendor_styles
    wp_enqueue_style( 'styles', get_stylesheet_uri(), [@@vendor_styles_dependencies], @@styles_version);

}
add_action( 'wp_enqueue_scripts', '@@theme_name_styles' );