<?php
/**
 * Theme Functions
 * Setup styles, scripts, menus, and other theme features.
 */

// Enqueue styles including Tailwind CSS
function philsan_enqueue_styles() {
    // Enqueue main theme stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_style("corben", "https://fonts.googleapis.com/css2?family=Corben:wght@400;700&display=swap" );
    wp_enqueue_style("poppins", "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" );
    wp_enqueue_style("fraunces", "https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&display=swap" );
    wp_enqueue_style("ibm-flex-sans", "https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" );
    wp_enqueue_style("raleway", "https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" );
    wp_enqueue_style("inter", "https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" );

    wp_enqueue_script('react-modal',get_template_directory_uri() . '/build/index.js',[],filemtime(get_template_directory() . '/build/index.js'),true);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);

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

//INCLUDES 
include(get_stylesheet_directory() . '/functions/news_event_api.php');

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


add_action('admin_head', function () {
    echo '<style>
        /* Target entire field group */
        #acf-group_685cdba81ccc2 {
            background-color: #CAD1E0;
        }

        .acf-accordion-title {
            background-color: #dee6ee;
        }

        .acf-accordion-content {
            background-color: #e6e6e6;
        }
    </style>';
});

require_once get_template_directory() . '/functions/theme_button.php';

if (function_exists('theme_button')) {
    error_log('theme_button is loaded ✅');
}

function philsan_swiper_init_script() {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 1 },
                    1024: { slidesPerView: 1 }
                }
            });

            new Swiper(".aboutSwiper", {
                slidesPerView: 4,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 4 }
                }
            });

            new Swiper(".sponsorSwiper", {
                slidesPerView: 4,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 4 }
                }
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'philsan_swiper_init_script', 100);

