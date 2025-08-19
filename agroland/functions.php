<?php
/**
 * Functions for Agroland theme.
 *
 * @package Agroland
 */

if ( ! function_exists( 'agroland_setup' ) ) {
    /**
     * Setup theme defaults and registers support for various WordPress features.
     */
    function agroland_setup() {
        // Make theme available for translation.
        load_theme_textdomain( 'agroland', get_template_directory() . '/languages' );

        // Enqueue editor styles.
        add_theme_support( 'editor-style' );
        add_editor_style( 'style.css' );
    }
}
add_action( 'after_setup_theme', 'agroland_setup' );

/**
 * Enqueue scripts and styles for front end.
 */
function agroland_scripts() {
    // Core styles are enqueued automatically for block themes.
}
add_action( 'wp_enqueue_scripts', 'agroland_scripts' );
