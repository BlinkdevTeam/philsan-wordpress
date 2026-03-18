<?php
/**
 * Add this inside your existing wp_enqueue_scripts action in functions.php
 * (or search-functions.php if you're using require_once).
 *
 * This exposes philsanData to your bundled JS so GlobalSearch can read it.
 */
add_action('wp_enqueue_scripts', function () {

    // ── Enqueue your compiled bundle ──────────────────────────────────────────
    // Adjust the handle and path to match whatever your build outputs.
    wp_enqueue_script(
        'philsan-bundle',
        get_template_directory_uri() . '/dist/bundle.js', // ← your build output
        [],       // no jQuery dependency — using vanilla fetch
        '1.0.0',
        true      // load in footer
    );

    // ── Pass PHP values to JS as window.philsanData ───────────────────────────
    wp_localize_script('philsan-bundle', 'philsanData', [
        'ajax_url'    => admin_url('admin-ajax.php'),
        'search_page' => home_url('/?s='),
        'nonce'       => wp_create_nonce('philsan_search_nonce'),
    ]);
});


// ── AJAX handler (logged-in + guests) ─────────────────────────────────────────
add_action('wp_ajax_philsan_live_search',        'philsan_live_search_handler');
add_action('wp_ajax_nopriv_philsan_live_search', 'philsan_live_search_handler');

function philsan_live_search_handler() {
    check_ajax_referer('philsan_search_nonce', 'nonce');

    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';

    if (strlen($keyword) < 2) {
        wp_send_json_success(['results' => [], 'total' => 0]);
    }

    $all_types = get_post_types(['public' => true], 'names');
    unset($all_types['attachment']);

    $query = new WP_Query([
        'post_type'      => array_values($all_types),
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        's'              => $keyword,
    ]);

    $results = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $plain   = wp_strip_all_tags(get_the_content());
            $excerpt = philsan_search_excerpt($plain, $keyword, 120);

            $pt_obj  = get_post_type_object(get_post_type());

            $results[] = [
                'id'      => get_the_ID(),
                'title'   => get_the_title(),
                'url'     => get_permalink(),
                'excerpt' => $excerpt,
                'type'    => $pt_obj ? $pt_obj->labels->singular_name : get_post_type(),
            ];
        }
        wp_reset_postdata();
    }

    wp_send_json_success([
        'results' => $results,
        'total'   => $query->found_posts,
    ]);
}

function philsan_search_excerpt($text, $keyword, $length = 120) {
    $text = preg_replace('/\s+/', ' ', trim($text));
    $pos  = stripos($text, $keyword);

    if ($pos !== false) {
        $start = max(0, $pos - 40);
        $chunk = ($start > 0 ? '…' : '') . substr($text, $start, $length);
        if (($start + $length) < strlen($text)) $chunk .= '…';
    } else {
        $chunk = substr($text, 0, $length) . (strlen($text) > $length ? '…' : '');
    }

    $safe_kw = preg_quote(esc_html($keyword), '/');
    $chunk   = preg_replace(
        '/(' . $safe_kw . ')/i',
        '<mark class="philsan-hl">$1</mark>',
        esc_html($chunk)
    );

    return $chunk;
}

// ── Widen the native WP search to all public post types ───────────────────────
add_filter('pre_get_posts', function ($query) {
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $all_types = get_post_types(['public' => true], 'names');
        unset($all_types['attachment']);
        $query->set('post_type', array_values($all_types));
        $query->set('posts_per_page', 12);
    }
    return $query;
});