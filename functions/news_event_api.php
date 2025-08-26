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

// Register a custom REST API route for searching news
add_action('rest_api_init', function () {
    register_rest_route('global/v1', '/search', [
        'methods'  => 'GET',
        'callback' => 'global_news_search',
        'args'     => [
            'keyword' => [
                'required' => false,
                'sanitize_callback' => 'sanitize_text_field',
            ],
        ],
        'permission_callback' => '__return_true',
    ]);
});

function global_news_search(WP_REST_Request $request) {
    global $wpdb;

    $keyword = $request->get_param('keyword');
    $like    = '%' . $wpdb->esc_like($keyword) . '%';

    $results = $wpdb->get_results($wpdb->prepare("
        SELECT ID, post_title, post_excerpt, post_date, guid
        FROM $wpdb->posts
        WHERE post_type = 'news'
          AND post_status = 'publish'
          AND (post_title LIKE %s OR post_content LIKE %s)
        ORDER BY post_date DESC
        LIMIT 20
    ", $like, $like));

    // Format the response
    return array_map(function($row) {
        return [
            'id'      => $row->ID,
            'title'   => $row->post_title,
            'excerpt' => $row->post_excerpt,
            'date'    => $row->post_date,
            'link'    => get_permalink($row->ID),
        ];
    }, $results);
}

