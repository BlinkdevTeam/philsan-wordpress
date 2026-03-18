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

    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';

    $args = array(
        'post_type'      => 'news',
        'post_status'    => 'publish',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if (!empty($keyword)) {
        $args['s'] = $keyword;
    }

    $all_news = new WP_Query($args);

    ob_start();

    if ($all_news->have_posts()) :
        while ($all_news->have_posts()) : $all_news->the_post();

            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $description        = wp_strip_all_tags(get_the_content());
            $date               = get_field('date');
            $categories         = get_the_terms(get_the_ID(), 'category-filters');
            $title              = get_the_title();
            $button_link        = get_field('button_link');
            $permalink          = get_permalink();

            $desc_trimmed  = mb_strimwidth($description, 0, 60, '...');
            $title_trimmed = mb_strimwidth($description, 0, 60, '...');

            $formatted_date = '';
            if ($date) {
                $dt = DateTime::createFromFormat('m/d/Y', $date);
                if ($dt) $formatted_date = $dt->format('F j, Y');
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
                    <?php if ($button_link) : ?>
                        <?php echo theme_button('View More', $button_link); ?>
                    <?php else : ?>
                        <?php echo theme_button('View More', $permalink); ?>
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
                    <?php if ($button_link) : ?>
                        <?php echo theme_button('View More', $button_link); ?>
                    <?php else : ?>
                        <?php echo theme_button('View More', $permalink); ?>
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

// Expose nonce to JS via the already-enqueued react-modal handle
add_action('wp_enqueue_scripts', function () {
    wp_localize_script('react-modal', 'NewsSearchData', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('news_search_nonce'),
    ]);
});