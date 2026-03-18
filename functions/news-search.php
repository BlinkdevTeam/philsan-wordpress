<?php
/**
 * News Search AJAX Handler
 * Include in functions.php:
 *   include(get_stylesheet_directory() . '/functions/news-search.php');
 */

add_action('wp_ajax_news_search',        'news_search_handler');
add_action('wp_ajax_nopriv_news_search', 'news_search_handler');

function news_search_handler() {
    check_ajax_referer('news_search_nonce', 'nonce');

    $keyword    = isset($_POST['keyword'])    ? sanitize_text_field($_POST['keyword'])    : '';
    $taxonomies = isset($_POST['taxonomies']) ? json_decode(stripslashes($_POST['taxonomies']), true) : array();
    $meta       = isset($_POST['meta'])       ? json_decode(stripslashes($_POST['meta']), true)       : array();

    $args = array(
        'post_type'      => 'news',
        'post_status'    => 'publish',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    // Keyword search
    if (!empty($keyword)) {
        $args['s'] = $keyword;
    }

    // Taxonomy filters
    if (!empty($taxonomies)) {
        $tax_query = array('relation' => 'AND');
        foreach ($taxonomies as $taxonomy => $terms) {
            $tax_query[] = array(
                'taxonomy' => sanitize_key($taxonomy),
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $terms),
            );
        }
        $args['tax_query'] = $tax_query;
    }

    // Meta filters (date)
    if (!empty($meta)) {
        $meta_query = array('relation' => 'OR');
        foreach ($meta as $meta_key => $meta_values) {
            foreach ($meta_values as $meta_value) {
                $meta_query[] = array(
                    'key'     => sanitize_key($meta_key),
                    'value'   => sanitize_text_field($meta_value),
                    'compare' => '=',
                );
            }
        }
        $args['meta_query'] = $meta_query;
    }

    $all_news = new WP_Query($args);

    ob_start();

    if ($all_news->have_posts()) :
        while ($all_news->have_posts()) : $all_news->the_post();

            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $description        = get_the_content();
            $description        = wp_strip_all_tags($description);
            $date               = get_field("date");
            $categories         = get_the_terms(get_the_ID(), 'category-filters');
            $title              = get_the_title();
            $button_link        = get_field("button_link");
            $permalink          = get_permalink();

            $desc_trimmed  = mb_strimwidth($description, 0, 60, "...");
            $title_trimmed = mb_strimwidth($description, 0, 60, "...");

            if ($date) {
                $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
            } else {
                $formatted_date = '';
            }
        ?>

            <!-- DESKTOP -->
            <div class="hidden md:block">
                <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                <div class="pt-[20px]">
                    <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>
                    <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                        <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                    </div>
                    <h2 class="text-[18px] font-[600] text-[#1f773a]"><?php echo esc_html($title_trimmed); ?></h2>
                    <p class="text-[14px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                </div>
                <div class="flex pt-[30px]">
                    <?php if($button_link) : ?>
                        <?php echo theme_button("View More", $button_link); ?>
                    <?php else : ?>
                        <?php echo theme_button("View More", $permalink); ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- MOBILE -->
            <div class="md:hidden">
                <div class="pt-[20px]">
                    <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>
                    <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                        <p class="text-[12px] md:text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                    </div>
                    <h2 class="text-[16px] md:text-[18px] font-[600] text-[#1f773a]"><?php echo esc_html($title_trimmed); ?></h2>
                    <div class="py-[10px]">
                        <img class="w-full h-[200px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                    </div>
                    <p class="text-[14px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                </div>
                <div class="flex pt-[30px]">
                    <?php if($button_link) : ?>
                        <?php echo theme_button("View More", $button_link); ?>
                    <?php else : ?>
                        <?php echo theme_button("View More", $permalink); ?>
                    <?php endif; ?>
                </div>
            </div>

        <?php
        endwhile;
        wp_reset_postdata();

    else : ?>
        <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 12px; color: #9ca3af;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <p style="font-size: 15px; font-weight: 600; color: #374151;">
                No results found<?php echo $keyword ? ' for "' . esc_html($keyword) . '"' : ''; ?>
            </p>
            <p style="font-size: 13px;">Try a different keyword</p>
        </div>
    <?php endif;

    $html = ob_get_clean();
    wp_send_json_success(['html' => $html]);
}

// Expose nonce to JS
add_action('wp_enqueue_scripts', function () {
    wp_localize_script('react-modal', 'NewsSearchData', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('news_search_nonce'),
    ]);
});


// ── Event Search AJAX Handler ─────────────────────────────────────────────────
add_action('wp_ajax_event_search',        'event_search_handler');
add_action('wp_ajax_nopriv_event_search', 'event_search_handler');

function event_search_handler() {
    check_ajax_referer('news_search_nonce', 'nonce');

    $keyword    = isset($_POST['keyword'])    ? sanitize_text_field($_POST['keyword'])    : '';
    $taxonomies = isset($_POST['taxonomies']) ? json_decode(stripslashes($_POST['taxonomies']), true) : array();
    $meta       = isset($_POST['meta'])       ? json_decode(stripslashes($_POST['meta']), true)       : array();

    $args = array(
        'post_type'      => 'event',
        'post_status'    => 'publish',
        'posts_per_page' => 20,
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'meta_key'       => 'date',
    );

    if (!empty($keyword)) $args['s'] = $keyword;

    if (!empty($taxonomies)) {
        $tax_query = array('relation' => 'AND');
        foreach ($taxonomies as $taxonomy => $terms) {
            $tax_query[] = array(
                'taxonomy' => sanitize_key($taxonomy),
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $terms),
            );
        }
        $args['tax_query'] = $tax_query;
    }

    if (!empty($meta)) {
        $meta_query = array('relation' => 'OR');
        foreach ($meta as $meta_key => $meta_values) {
            foreach ($meta_values as $meta_value) {
                $meta_query[] = array(
                    'key'     => sanitize_key($meta_key),
                    'value'   => sanitize_text_field($meta_value),
                    'compare' => '=',
                );
            }
        }
        $args['meta_query'] = $meta_query;
    }

    $past_events = new WP_Query($args);

    ob_start();

    if ($past_events->have_posts()) :
        while ($past_events->have_posts()) : $past_events->the_post();

            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $description        = wp_strip_all_tags(get_the_content());
            $date               = get_field("date");
            $button_link        = get_field("button_link");
            $permalink          = get_permalink();
            $desc_trimmed       = mb_strimwidth($description, 0, 200, "...");

            $formatted_date = $month = $year = '';
            if ($date) {
                $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                $date_obj       = new DateTime($date);
                $month          = $date_obj->format('M');
                $year           = $date_obj->format('Y');
            }
        ?>

            <!-- DESKTOP -->
            <div class="flex justify-between gap-[20px] border-b-[1px] border-[#cccccc] pb-[30px] hidden md:flex">
                <div class="bg-[#1f773a] rounded-md">
                    <div class="flex flex-col items-center pt-[30px] px-[10px]">
                        <p class="text-[24px] text-[#ffffff]"><?php echo $month; ?></p>
                        <h6 class="text-[16px] text-[#ffffff]"><?php echo $year; ?></h6>
                    </div>
                </div>
                <div class="w-[50%] pl-[20px]">
                    <div class="pt-[20px] w-[80%]">
                        <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                            <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                        </div>
                        <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                        <div class="text-[16px] font-[400]"><?php echo esc_html($desc_trimmed); ?></div>
                        <?php if (have_rows('social_media')) : ?>
                            <div class="flex gap-[20px] pt-[20px]">
                                <?php while (have_rows('social_media')) : the_row(); ?>
                                    <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>" class="cursor-pointer p-[8px] rounded-full bg-[#dfdfdf]">
                                        <img class="w-[20px] h-[20px] object-cover" src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" alt="">
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex pt-[30px]">
                        <?php if($button_link) : ?>
                            <?php echo theme_button("View More", $button_link); ?>
                        <?php else : ?>
                            <?php echo theme_button("View More", $permalink); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="w-[50%]">
                    <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                </div>
            </div>

            <!-- MOBILE -->
            <div class="md:hidden flex justify-between gap-[20px] border-b-[1px] border-[#cccccc]">
                <div class="w-[100%]">
                    <div class="pt-[20px] w-[100%]">
                        <div class="px-[20px] my-[10px] border-[1px] border-[#000000] rounded-full w-fit">
                            <p class="text-[12px] md:text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                        </div>
                        <h2 class="text-[18px] md:text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                        <div class="w-[100%] pb-[10px] pt-[5px]">
                            <img class="w-full h-[150px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                        </div>
                        <div class="text-[14px] md:text-[16px] font-[400]"><?php echo esc_html($desc_trimmed); ?></div>
                    </div>
                    <div class="flex py-[20px]">
                        <?php if($button_link) : ?>
                            <?php echo theme_button("View More", $button_link); ?>
                        <?php else : ?>
                            <?php echo theme_button("View More", $permalink); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php
        endwhile;
        wp_reset_postdata();

    else : ?>
        <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 12px; color: #9ca3af;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <p style="font-size: 15px; font-weight: 600; color: #374151;">
                No results found<?php echo $keyword ? ' for "' . esc_html($keyword) . '"' : ''; ?>
            </p>
            <p style="font-size: 13px;">Try a different keyword</p>
        </div>
    <?php endif;

    $html = ob_get_clean();
    wp_send_json_success(['html' => $html]);
}