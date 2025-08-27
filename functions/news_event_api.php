<?php

add_action('rest_api_init', function () {
    register_rest_route('global/v1', '/search', [
        'methods'  => 'GET',
        'callback' => 'global_news_search',
        'args'     => [
            'keyword' => [
                'required' => false,
                'sanitize_callback' => 'sanitize_text_field',
            ],
            'taxonomies' => [
                'required' => false,
            ],
            'meta' => [
                'required' => false,
            ],
        ],
        'permission_callback' => '__return_true',
    ]);
});

function global_news_search(WP_REST_Request $request) {
    $keyword    = $request->get_param('keyword');
    $taxonomies = $request->get_param('taxonomies');
    $meta       = $request->get_param('meta');

    // Decode JSON params if they exist
    $taxonomies = $taxonomies ? json_decode($taxonomies, true) : [];
    $meta       = $meta ? json_decode($meta, true) : [];

    $args = [
        'post_type'      => 'news',
        'posts_per_page' => 20,
        's'              => $keyword ?: '',
        'tax_query'      => [],
        'meta_query'     => [],
    ];

    // Add taxonomy filters if provided
    if (!empty($taxonomies)) {
        foreach ($taxonomies as $taxonomy => $terms) {
            $args['tax_query'][] = [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $terms,
            ];
        }
    }

    // Add meta filters if provided
    if (!empty($meta)) {
        foreach ($meta as $key => $value) {
            if (is_array($value)) {
                $args['meta_query'][] = [
                    'key'     => $key,
                    'value'   => $value,
                    'compare' => 'IN',
                ];
            } else {
                $args['meta_query'][] = [
                    'key'   => $key,
                    'value' => $value,
                ];
            }
        }
    }

    // Ensure multiple conditions play nicely
    if (count($args['tax_query']) > 1) {
        $args['tax_query']['relation'] = 'AND';
    }
    if (count($args['meta_query']) > 1) {
        $args['meta_query']['relation'] = 'AND';
    }

    $query = new WP_Query($args);
    $results = [];

    foreach ($query->posts as $post) {
        $results[] = [
            'id'      => $post->ID,
            'title'   => get_the_title($post),
            'excerpt' => get_the_excerpt($post),
            'date'    => get_the_date('', $post),
            'link'    => get_permalink($post),
        ];
    }

    return $results;
}

