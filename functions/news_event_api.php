<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register custom REST API endpoint
add_action('rest_api_init', function () {
    register_rest_route('global/v1', '/search', array(
        'methods' => 'GET',
        'callback' => 'global_search_handler',
        'permission_callback' => '__return_true'
    ));
});

function global_search_handler($request) {
    $args = array(
        'post_type' => array('post', 'event'), // You can extend globally
        's' => sanitize_text_field($request['keyword'] ?? ''), // Keyword search
        'posts_per_page' => 10,
    );

    // Filters
    if (!empty($request['date'])) {
        $args['meta_query'][] = array(
            'key' => 'date',
            'value' => sanitize_text_field($request['date']),
            'compare' => '='
        );
    }

    // if (!empty($request['author'])) {
    //     $args['tax_query'][] = array(
    //         'taxonomy' => 'author',
    //         'field' => 'slug',
    //         'terms' => sanitize_text_field($request['author']),
    //     );
    // }

    if (!empty($request['category_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category-filters',
            'field' => 'slug',
            'terms' => explode(',', sanitize_text_field($request['category_filters'])),
        );
    }

    $query = new WP_Query($args);

    $results = [];
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = [
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'link'  => get_permalink(),
                'date'  => get_field('date'),
                // 'author'=> wp_get_post_terms(get_the_ID(), 'author', ['fields' => 'names']),
                'categories' => wp_get_post_terms(get_the_ID(), 'category-filters', ['fields' => 'names']),
            ];
        }
    }
    wp_reset_postdata();

    return $results;
}
