<?php
/**
 * Enqueue styles for child theme.
 */
function agroland_child_enqueue_styles() {
    wp_enqueue_style( 'agroland-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'agroland-child-style', get_stylesheet_uri(), array( 'agroland-style' ), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'agroland_child_enqueue_styles' );
