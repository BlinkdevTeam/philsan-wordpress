<?php
function philsan_enqueue_styles() {
    // Enqueue main theme stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Correct path to Tailwind output.css
    $tailwind_path = get_template_directory() . '/public/css/output.css';
    $tailwind_url  = get_template_directory_uri() . '/public/css/output.css';

    if (file_exists($tailwind_path)) {
        wp_enqueue_style('tailwind', $tailwind_url, array(), filemtime($tailwind_path));
    } else {
        error_log('Tailwind CSS file not found at: ' . $tailwind_path);
    }
}
add_action('wp_enqueue_scripts', 'philsan_enqueue_styles');
