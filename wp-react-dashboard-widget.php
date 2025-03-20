<?php
/*
Plugin Name: WP React Dashboard Widget
Description: A simple WordPress Dashboard Widget built with React.
Version: 1.0.0
Author: Tamanna
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register the dashboard widget
function wp_react_dashboard_widget_register() {
    wp_add_dashboard_widget('wp_react_dashboard_widget', 'React To-Do List', 'wp_react_dashboard_widget_display');
}
add_action('wp_dashboard_setup', 'wp_react_dashboard_widget_register');

// Display the widget content
function wp_react_dashboard_widget_display() {
    echo '<div id="wp-react-dashboard-widget" class="p-4 bg-blue-500 text-white rounded">Loading...</div>';
}

// Enqueue the React App and Tailwind CSS
function wp_react_dashboard_widget_assets() {
    // Enqueue Tailwind CSS from CDN
    wp_enqueue_style(
        // 'tailwindcss',
        // 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.3.5/tailwind.min.css',
        // array(),
        // null
       'tailwindcss',
        plugin_dir_url(__FILE__) . 'src/output.css',
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'src/output.css')
    );
    

    // Enqueue the React App
    wp_enqueue_script(
        'wp-react-dashboard-widget-js',
        plugin_dir_url(__FILE__) . 'assets/build/index.js',
        array('wp-element'),
        filemtime(plugin_dir_path(__FILE__) . 'assets/build/index.js'),
        true
    );
}
add_action('admin_enqueue_scripts', 'wp_react_dashboard_widget_assets');

// Load Tailwind CSS in Admin Dashboard
function wp_react_dashboard_widget_style() {
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.5/dist/tailwind.min.css" crossorigin="anonymous">';
}
add_action('admin_head', 'wp_react_dashboard_widget_style');




function wp_custom_admin_css() {
    echo '<style>
        #wp-react-dashboard-widget-container * {
            all: unset !important;
        }
    </style>';
}
add_action('admin_head', 'wp_custom_admin_css');
?>
