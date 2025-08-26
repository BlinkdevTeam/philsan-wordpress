<?php
// // Exit if accessed directly
// if ( ! defined( 'ABSPATH' ) ) exit;

// // Register global REST API endpoint
// add_action('rest_api_init', function () {
//     register_rest_route('global/v1', '/search', array(
//         'methods' => 'GET',
//         'callback' => 'global_search_handler',
//         'permission_callback' => '__return_true',
//     ));
// });

// function global_search_handler($request) {
//     global $wpdb;

//     $keyword = sanitize_text_field($request['keyword'] ?? '');
//     $date    = sanitize_text_field($request['date'] ?? '');
//     $author  = sanitize_text_field($request['author'] ?? '');
//     $category_filters = sanitize_text_field($request['category_filters'] ?? '');

//     // Base query (force only news)
//     $args = array(
//         'post_type'      => 'news',   // ✅ only news CPT
//         'posts_per_page' => 10,
//         's'              => $keyword, // normal WP search
//         'meta_query'     => array(),
//         'tax_query'      => array('relation' => 'AND'),
//     );

//     // Search in custom fields (ACF)
//     if ($keyword) {
//         $args['meta_query'][] = array(
//             'relation' => 'OR',
//             array(
//                 'key'     => 'description',
//                 'value'   => $keyword,
//                 'compare' => 'LIKE',
//             ),
//             array(
//                 'key'     => 'author',
//                 'value'   => $keyword,
//                 'compare' => 'LIKE',
//             ),
//         );
//     }

//     // Filter by date
//     if ($date) {
//         $args['meta_query'][] = array(
//             'key'     => 'date',
//             'value'   => $date,
//             'compare' => '='
//         );
//     }

//     // Filter by author
//     if ($author) {
//         $args['meta_query'][] = array(
//             'key'     => 'author',
//             'value'   => $author,
//             'compare' => '='
//         );
//     }

//     // Filter by taxonomy
//     if ($category_filters) {
//         $args['tax_query'][] = array(
//             'taxonomy' => 'category-filters',
//             'field'    => 'slug',
//             'terms'    => explode(',', $category_filters),
//         );
//     }

//     // Run query
//     $query = new WP_Query($args);

//     $results = [];
//     if ($query->have_posts()) {
//         while ($query->have_posts()) {
//             $query->the_post();
//             $results[] = [
//                 'id'         => get_the_ID(),
//                 'title'      => get_the_title(),
//                 'link'       => get_permalink(),
//                 'date'       => get_field('date'),
//                 'author'     => get_field('author'),
//                 'categories' => wp_get_post_terms(get_the_ID(), 'category-filters', ['fields' => 'names']),
//             ];
//         }
//     }
//     wp_reset_postdata();

//     return $results;
// }

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

