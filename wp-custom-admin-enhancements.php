<?php
/**
 * Plugin Name: WP Custom Admin Enhancements
 * Description: Small admin-side enhancements using WordPress hooks and filters.
 * Version: 1.0.0
 * Author: Kasturi
 * License: GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Show admin notice when plugin is active
 */
add_action( 'admin_notices', function () {
    echo '<div class="notice notice-success is-dismissible">
        <p>WP Custom Admin Enhancements plugin is active.</p>
    </div>';
});

/**
 * Disable Gutenberg editor for posts only
 */
add_filter( 'use_block_editor_for_post_type', function ( $use_block_editor, $post_type ) {
    if ( $post_type === 'post' ) {
        return false;
    }
    return $use_block_editor;
}, 10, 2 );

/**
 * Add custom dashboard widget
 */
add_action( 'wp_dashboard_setup', function () {
    wp_add_dashboard_widget(
        'custom_help_widget',
        'Developer Notes',
        function () {
            echo '<p>This site uses custom WordPress admin enhancements.</p>';
        }
    );
});
