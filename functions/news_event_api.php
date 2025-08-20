<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Register global REST API endpoint
add_action('rest_api_init', function () {
    register_rest_route('global/v1', '/search', array(
        'methods' => 'GET',
        'callback' => 'global_search_handler',
        'permission_callback' => '__return_true',
    ));
});

function global_search_handler($request) {
    global $wpdb;

    $keyword = sanitize_text_field($request['keyword'] ?? '');
    $date    = sanitize_text_field($request['date'] ?? '');
    $author  = sanitize_text_field($request['author'] ?? '');
    $category_filters = sanitize_text_field($request['category_filters'] ?? '');

    $args = array(
        'post_type'      => array('event', 'news'),
        'posts_per_page' => 10,
        's'              => $keyword, // still needed for relevance
        'meta_query'     => array(),
        'tax_query'      => array('relation' => 'AND'),
    );

    // --- CUSTOM PARTIAL SEARCH HOOK ---
    if ($keyword) {
        add_filter('posts_where', function($where) use ($keyword, $wpdb) {
            // Escape LIKE special chars
            $like = '%' . $wpdb->esc_like($keyword) . '%';
            $where .= $wpdb->prepare(
                " OR {$wpdb->posts}.post_title LIKE %s OR {$wpdb->posts}.post_content LIKE %s ",
                $like, $like
            );
            return $where;
        });
    }

    // Search in custom fields (ACF)
    if ($keyword) {
        $args['meta_query'][] = array(
            'relation' => 'OR',
            array(
                'key'     => 'description',
                'value'   => $keyword,
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'author',
                'value'   => $keyword,
                'compare' => 'LIKE',
            ),
        );
    }

    // Filter by date
    if ($date) {
        $args['meta_query'][] = array(
            'key'     => 'date',
            'value'   => $date,
            'compare' => '='
        );
    }

    // Filter by author
    if ($author) {
        $args['meta_query'][] = array(
            'key'     => 'author',
            'value'   => $author,
            'compare' => '='
        );
    }

    // Filter by taxonomy
    if ($category_filters) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category-filters',
            'field'    => 'slug',
            'terms'    => explode(',', $category_filters),
        );
    }

    $query = new WP_Query($args);

    $results = [];
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = [
                'id'         => get_the_ID(),
                'title'      => get_the_title(),
                'link'       => get_permalink(),
                'date'       => get_field('date'),
                'author'     => get_field('author'),
                'categories' => wp_get_post_terms(get_the_ID(), 'category-filters', ['fields' => 'names']),
            ];
        }
    }
    wp_reset_postdata();

    // Remove the filter after query so it doesn’t affect others
    if ($keyword) {
        remove_all_filters('posts_where');
    }

    return $results;
}
