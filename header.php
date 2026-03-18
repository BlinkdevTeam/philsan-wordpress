<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ✅ Open Graph Meta Tags -->
  <meta property="og:title" content="PHILSAN 38th Annual Convention" />
  <meta property="og:description" content="Register now for the PHILSAN 38th Annual Convention! Join us in Innovating for a Sustainable Future." />
  <meta property="og:image" content="https://philsan.org/wp-content/uploads/2024/06/philsan-logo.png" />
  <meta property="og:url" content="<?php echo get_permalink(); ?>" />
  <meta property="og:type" content="website" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-100 text-gray-900 min-h-screen flex flex-col'); ?>>

<?php
$parent_ids_to_hide = [214];

$templates_to_hide = [
  'template-complete-registration.php',
  'template-email-verification.php',
  'template-invalid-email.php',
  'template-register-by-sponsor.php',
  'template-registration-successful.php',
  'template-session-expired.php',
  'template-visit-email.php',
  'template-38th-convention'
];

$slugs_to_hide = [
  'login', 'signup', 'registration', 'registration-successful',
  'invalid-email', 'session-expired', 'visit-email', 'complete-registration', '38th-convention-test-page',
  '38th-annual-convention',
];

$post_types_to_check = ['page', '38th-convention'];

$current_post     = get_post();
$current_id       = $current_post->ID ?? 0;
$current_template = get_page_template_slug();
$current_slug     = get_post_field('post_name', $current_post);
$current_type     = get_post_type($current_post);
$current_parent_id = $current_post->post_parent ?? 0;

$hide_by_parent_or_child = in_array($current_id, $parent_ids_to_hide) || in_array($current_parent_id, $parent_ids_to_hide);
$hide_by_template        = in_array($current_template, $templates_to_hide);
$hide_by_slug_and_type   = in_array($current_type, $post_types_to_check) && in_array($current_slug, $slugs_to_hide);
$should_hide_nav_or_footer = $hide_by_template || $hide_by_slug_and_type || $hide_by_parent_or_child;
?>

<?php if (!$should_hide_nav_or_footer) : ?>

  <!-- ═══════════════════════════════════════════════════════ DESKTOP HEADER -->
  <header id="header" class="bg-white shadow-md top-0 z-[999] fixed w-full transition-all duration-200 ease">
    <div class="custom-container mx-auto flex items-center justify-between px-4 py-4">

      <!-- Logo -->
      <div class="flex-shrink-0">
        <div class="cursor-pointer flex justify-center w-[180px]">
          <?php the_custom_logo(); ?>
        </div>
      </div>

      <!-- Nav + Search + Burger (right side) -->
      <div class="flex items-center gap-4">

        <!-- Desktop Navigation -->
        <div class="nav-menu hidden md:block">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'menu_class'     => 'flex space-x-6 text-black text-[16px] md:text-[18px]',
              'container'      => false,
              'fallback_cb'    => false,
            ));
          ?>
        </div>

        <!-- Search Icon (desktop + mobile) -->
        <button id="philsan-search-trigger" aria-label="Open search" class="philsan-search-trigger-btn">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
        </button>

        <!-- Mobile Burger -->
        <div id="mobile-burger-icon" class="cursor-pointer md:hidden">
          <svg width="29" height="18" viewBox="0 0 29 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.5625C0 0.975697 0.540989 0.5 1.20833 0.5H27.7917C28.459 0.5 29 0.975697 29 1.5625C29 2.1493 28.459 2.625 27.7917 2.625H1.20833C0.540989 2.625 0 2.1493 0 1.5625ZM0 9C0 8.4132 0.540989 7.9375 1.20833 7.9375H27.7917C28.459 7.9375 29 8.4132 29 9C29 9.5868 28.459 10.0625 27.7917 10.0625H1.20833C0.540989 10.0625 0 9.5868 0 9ZM13.2917 16.4375C13.2917 15.8507 13.8327 15.375 14.5 15.375H27.7917C28.459 15.375 29 15.8507 29 16.4375C29 17.0243 28.459 17.5 27.7917 17.5H14.5C13.8327 17.5 13.2917 17.0243 13.2917 16.4375Z" fill="#096936"/>
          </svg>
        </div>

      </div><!-- /right side -->
    </div>
  </header>


  <!-- ═══════════════════════════════════════════════════════ MOBILE SIDE NAV -->
  <header id="mobile-nav" class="mobile-nav-menu hide-mobile-nav fixed top-0 right-0 w-[60%] h-screen bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-[9999] flex flex-col">
    <div class="flex gap-[20px] items-center p-[20px] border-b-[1px]">
      <div>
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 13L1 7L7 1" stroke="#007831" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M13 13L7 7L13 1" stroke="#007831" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div class="cursor-pointer flex justify-center w-[180px]">
        <?php the_custom_logo(); ?>
      </div>
    </div>
    <div class="w-full pt-[50px]">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class'     => 'flex flex-col space-x-6 text-black text-[16px] md:text-[18px]',
          'container'      => false,
          'fallback_cb'    => false,
        ));
      ?>
    </div>
  </header>

  <!-- Mobile menu backdrop -->
  <div id="mobile-nav-backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[999]"></div>


  <!-- ═══════════════════════════════════════════════════ SEARCH OVERLAY PANEL -->
  <div id="philsan-search-panel" aria-hidden="true">

    <!-- Backdrop -->
    <div id="philsan-search-backdrop"></div>

    <!-- Box -->
    <div class="philsan-search-box">

      <!-- Input row -->
      <div class="philsan-search-input-row">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input
          id="philsan-search-input"
          type="text"
          placeholder="Search pages, posts, articles…"
          autocomplete="off"
          spellcheck="false"
          aria-label="Search"
        />
        <button id="philsan-search-close" aria-label="Close search">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <line x1="1" y1="1" x2="13" y2="13"/><line x1="13" y1="1" x2="1" y2="13"/>
          </svg>
        </button>
      </div>

      <!-- Live results -->
      <div id="philsan-search-results" role="listbox" aria-live="polite"></div>

      <!-- Footer -->
      <div id="philsan-search-footer">
        <span id="philsan-search-count"></span>
        <a id="philsan-search-all-link" href="#">View all results →</a>
      </div>

    </div><!-- /box -->
  </div><!-- /search panel -->


  <!-- ═══════════════════════════════════════════════════════════ SEARCH STYLES -->
  <style>
    /* ── Trigger button ── */
    .philsan-search-trigger-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      flex-shrink: 0;
      background: none;
      border: none;
      cursor: pointer;
      border-radius: 9999px;
      padding: 0;
      color: #4b5563;
      transition: background .2s, color .2s;
    }
    .philsan-search-trigger-btn:hover {
      background: #f0fdf4;
      color: #096936;
    }

    /* ── Panel — hidden by default ── */
    #philsan-search-panel {
      position: fixed;
      inset: 0;
      z-index: 99999;
      opacity: 0;
      pointer-events: none;
      transition: opacity .2s ease;
    }
    #philsan-search-panel.is-open {
      opacity: 1;
      pointer-events: auto;
    }

    /* ── Backdrop ── */
    #philsan-search-backdrop {
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,.45);
      backdrop-filter: blur(4px);
    }

    /* ── Box ── */
    .philsan-search-box {
      position: absolute;
      top: 80px;
      left: 50%;
      transform: translateX(-50%) translateY(-12px);
      width: min(680px, calc(100vw - 32px));
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 24px 64px rgba(0,0,0,.18), 0 4px 16px rgba(0,0,0,.08);
      overflow: hidden;
      transition: transform .22s cubic-bezier(.34,1.56,.64,1);
    }
    #philsan-search-panel.is-open .philsan-search-box {
      transform: translateX(-50%) translateY(0);
    }

    /* ── Input row ── */
    .philsan-search-input-row {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 16px 20px;
      border-bottom: 1px solid #f0f0f0;
      color: #9ca3af;
    }
    #philsan-search-input {
      flex: 1;
      border: none;
      outline: none;
      font-size: 16px;
      color: #1a1a1a;
      background: transparent;
      font-family: inherit;
    }
    #philsan-search-input::placeholder { color: #d1d5db; }
    #philsan-search-close {
      background: none;
      border: none;
      cursor: pointer;
      color: #9ca3af;
      padding: 4px;
      display: flex;
      align-items: center;
      transition: color .15s;
    }
    #philsan-search-close:hover { color: #374151; }

    /* ── Results ── */
    #philsan-search-results {
      max-height: 400px;
      overflow-y: auto;
      padding: 8px 0;
    }
    #philsan-search-results::-webkit-scrollbar { width: 5px; }
    #philsan-search-results::-webkit-scrollbar-track { background: transparent; }
    #philsan-search-results::-webkit-scrollbar-thumb { background: #ddd; border-radius: 99px; }

    /* ── Result item ── */
    .philsan-result-item {
      padding: 12px 20px;
      cursor: pointer;
      border-left: 3px solid transparent;
      transition: background .12s, border-color .12s;
    }
    .philsan-result-item:hover,
    .philsan-result-item.is-active {
      background: #f6fbf8;
      border-left-color: #096936;
    }
    .philsan-result-type {
      display: inline-block;
      font-size: 10px; font-weight: 600;
      letter-spacing: .06em; text-transform: uppercase;
      color: #096936; background: #e9f5ee;
      border-radius: 999px; padding: 2px 8px; margin-bottom: 4px;
    }
    .philsan-result-title {
      font-size: 14px; font-weight: 600; color: #1a1a1a;
      white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
      margin-bottom: 3px;
    }
    .philsan-result-url {
      font-size: 11px; color: #bbb; margin-top: 3px;
      white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }

    /* ── Footer ── */
    #philsan-search-footer {
      display: none;
      align-items: center;
      justify-content: space-between;
      padding: 12px 20px;
      border-top: 1px solid #f0f0f0;
      background: #fafafa;
      font-size: 12px;
      color: #9ca3af;
    }
    #philsan-search-footer.is-visible { display: flex; }
    #philsan-search-all-link {
      color: #096936; font-weight: 600;
      text-decoration: none; font-size: 12px;
      transition: color .15s;
    }
    #philsan-search-all-link:hover { color: #07582c; }

    /* ── States (loading / empty / error) ── */
    .philsan-state {
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      gap: 10px; padding: 40px 20px;
      color: #9ca3af; font-size: 14px; text-align: center;
    }
    .philsan-state--error { color: #ef4444; }
    .philsan-spinner {
      width: 22px; height: 22px;
      border: 2.5px solid #e0e0e0;
      border-top-color: #096936;
      border-radius: 50%;
      animation: philsan-spin .7s linear infinite;
    }
    @keyframes philsan-spin { to { transform: rotate(360deg); } }

    /* ── Body scroll lock ── */
    body.philsan-search-open { overflow: hidden; }

    /* ── Mobile ── */
    @media (max-width: 640px) {
      .philsan-search-box {
        top: 0;
        border-radius: 0 0 16px 16px;
        width: 100vw;
      }
    }
  </style>

<?php endif; ?>