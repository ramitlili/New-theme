<?php
/**
 * Plugin Name: Agroland Core
 * Plugin URI:  https://example.com/agroland-core
 * Description: Provides custom post types and functionality for the Agroland theme. This plugin adds non‑presentation features such as Projects, Crops, Services, Team, Testimonials and Events post types.
 * Version:     1.0.0
 * Author:      Your Name or Company
 * Author URI:  https://example.com
 * Text Domain: agroland-core
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Load plugin textdomain for translations.
 */
function agroland_core_load_textdomain() {
    load_plugin_textdomain( 'agroland-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'agroland_core_load_textdomain' );

/**
 * Register custom post types used by Agroland.
 */
function agroland_core_register_cpts() {
    $cpts = array(
        'project' => array(
            'name'          => __( 'Projects', 'agroland-core' ),
            'singular_name' => __( 'Project', 'agroland-core' ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'menu_icon'     => 'dashicons-portfolio',
        ),
        'crop' => array(
            'name'          => __( 'Crops', 'agroland-core' ),
            'singular_name' => __( 'Crop', 'agroland-core' ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'menu_icon'     => 'dashicons-carrot',
        ),
        'service' => array(
            'name'          => __( 'Services', 'agroland-core' ),
            'singular_name' => __( 'Service', 'agroland-core' ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'menu_icon'     => 'dashicons-hammer',
        ),
        'team' => array(
            'name'          => __( 'Team Members', 'agroland-core' ),
            'singular_name' => __( 'Team Member', 'agroland-core' ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'menu_icon'     => 'dashicons-groups',
        ),
        'testimonial' => array(
            'name'          => __( 'Testimonials', 'agroland-core' ),
            'singular_name' => __( 'Testimonial', 'agroland-core' ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'menu_icon'     => 'dashicons-format-quote',
        ),
        'event' => array(
            'name'          => __( 'Events', 'agroland-core' ),
            'singular_name' => __( 'Event', 'agroland-core' ),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
            'menu_icon'     => 'dashicons-calendar',
        ),
    );

    foreach ( $cpts as $slug => $args ) {
        $labels = array(
            'name'               => $args['name'],
            'singular_name'      => $args['singular_name'],
            'add_new'            => __( 'Add New', 'agroland-core' ),
            'add_new_item'       => __( 'Add New ' . $args['singular_name'], 'agroland-core' ),
            'edit_item'          => __( 'Edit ' . $args['singular_name'], 'agroland-core' ),
            'new_item'           => __( 'New ' . $args['singular_name'], 'agroland-core' ),
            'view_item'          => __( 'View ' . $args['singular_name'], 'agroland-core' ),
            'search_items'       => __( 'Search ' . $args['name'], 'agroland-core' ),
            'not_found'          => __( 'No ' . strtolower( $args['name'] ) . ' found.', 'agroland-core' ),
            'not_found_in_trash' => __( 'No ' . strtolower( $args['name'] ) . ' found in Trash.', 'agroland-core' ),
            'parent_item_colon'  => __( 'Parent ' . $args['singular_name'] . ':', 'agroland-core' ),
            'all_items'          => __( 'All ' . $args['name'], 'agroland-core' ),
            'menu_name'          => $args['name'],
        );
        $post_type_args = array(
            'labels'       => $labels,
            'public'       => true,
            'has_archive'  => true,
            'show_in_rest' => true,
            'supports'     => $args['supports'],
            'menu_icon'    => $args['menu_icon'],
        );
        register_post_type( $slug, $post_type_args );
    }
}
add_action( 'init', 'agroland_core_register_cpts' );

/**
 * Activate the plugin by registering post types and flushing rewrite rules.
 */
function agroland_core_activate() {
    agroland_core_register_cpts();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'agroland_core_activate' );

/**
 * Deactivate the plugin by flushing rewrite rules.
 */
function agroland_core_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'agroland_core_deactivate' );
