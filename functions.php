<?php
/**
 * Theme Functions
 * Setup styles, scripts, menus, and other theme features.
 */

// Enqueue styles including Tailwind CSS
function philsan_enqueue_styles() {
    // Enqueue main theme stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Correct path and URL for Tailwind output.css
    $tailwind_path = get_template_directory() . '/public/css/output.css';
    $tailwind_url  = get_template_directory_uri() . '/public/css/output.css';

    if (file_exists($tailwind_path)) {
        wp_enqueue_style('tailwind', $tailwind_url, array(), filemtime($tailwind_path));
    } else {
        error_log('Tailwind CSS file not found at: ' . $tailwind_path);
    }
}
add_action('wp_enqueue_scripts', 'philsan_enqueue_styles');

// Register navigation menus
function philsan_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'philsan'),
    ));
}
add_action('after_setup_theme', 'philsan_register_menus');

// Optional: Add theme supports
function philsan_theme_setup() {
    // Enable support for featured images
    add_theme_support('post-thumbnails');

    // Enable title tag
    add_theme_support('title-tag');

    // Enable custom logo support
    add_theme_support('custom-logo');

    // Enable support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'philsan_theme_setup');
