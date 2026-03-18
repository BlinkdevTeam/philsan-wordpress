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
        <button
          id="philsan-search-trigger"
          aria-label="Open search"
          class="flex items-center justify-center w-9 h-9 rounded-full hover:bg-green-50 transition-colors duration-200 group"
        >
          <svg
            width="20" height="20" viewBox="0 0 24 24"
            fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="text-gray-600 group-hover:text-[#096936] transition-colors duration-200"
          >
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
  <div
    id="philsan-search-panel"
    aria-hidden="true"
    class="fixed inset-0 z-[99999] pointer-events-none opacity-0 transition-opacity duration-200"
  >
    <!-- Backdrop -->
    <div id="philsan-search-backdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    <!-- Box -->
    <div class="absolute top-[72px] left-1/2 -translate-x-1/2 -translate-y-3
                w-[min(680px,calc(100vw-32px))]
                bg-white rounded-2xl shadow-2xl overflow-hidden
                transition-transform duration-[220ms] ease-[cubic-bezier(.34,1.56,.64,1)]
                philsan-search-box">

      <!-- Input row -->
      <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
          <circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input
          id="philsan-search-input"
          type="text"
          placeholder="Search pages, posts, articles…"
          autocomplete="off"
          spellcheck="false"
          aria-label="Search"
          class="flex-1 bg-transparent text-gray-800 text-base outline-none placeholder-gray-300 font-[inherit]"
        />
        <button
          id="philsan-search-close"
          aria-label="Close search"
          class="text-gray-400 hover:text-gray-700 transition-colors p-1"
        >
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <line x1="1" y1="1" x2="13" y2="13"/><line x1="13" y1="1" x2="1" y2="13"/>
          </svg>
        </button>
      </div>

      <!-- Live results -->
      <div
        id="philsan-search-results"
        role="listbox"
        aria-live="polite"
        class="max-h-[400px] overflow-y-auto py-2"
      ></div>

      <!-- Footer -->
      <div id="philsan-search-footer" class="hidden flex items-center justify-between px-5 py-3 border-t border-gray-100 bg-gray-50">
        <span id="philsan-search-count" class="text-xs text-gray-400"></span>
        <a id="philsan-search-all-link" href="#"
           class="text-xs font-semibold text-[#096936] hover:text-[#07582c] transition-colors">
          View all results →
        </a>
      </div>

    </div><!-- /box -->
  </div><!-- /search panel -->


  <!-- ═══════════════════════════════════════════════════════════ SEARCH STYLES -->
  <style>
    /* Open state */
    #philsan-search-panel.is-open {
      pointer-events: auto;
      opacity: 1;
    }
    #philsan-search-panel.is-open .philsan-search-box {
      transform: translateX(-50%) translateY(0);
    }
    #philsan-search-panel:not(.is-open) .philsan-search-box {
      transform: translateX(-50%) translateY(-12px);
    }

    /* Body scroll lock */
    body.philsan-search-open { overflow: hidden; }

    /* Result item */
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
    .philsan-result-excerpt {
      font-size: 12.5px; color: #666; line-height: 1.5;
      display: -webkit-box;
      -webkit-line-clamp: 2; -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .philsan-result-url {
      font-size: 11px; color: #bbb; margin-top: 3px;
      white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    mark.philsan-hl {
      background: #fef08a; color: #78350f;
      border-radius: 2px; padding: 0 2px;
    }

    /* States */
    .philsan-state {
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      gap: 10px; padding: 40px 20px;
      color: #aaa; font-size: 14px; text-align: center;
    }
    .philsan-spinner {
      width: 22px; height: 22px;
      border: 2.5px solid #e0e0e0;
      border-top-color: #096936;
      border-radius: 50%;
      animation: philsan-spin .7s linear infinite;
    }
    @keyframes philsan-spin { to { transform: rotate(360deg); } }

    /* Scrollbar */
    #philsan-search-results::-webkit-scrollbar { width: 5px; }
    #philsan-search-results::-webkit-scrollbar-track { background: transparent; }
    #philsan-search-results::-webkit-scrollbar-thumb { background: #ddd; border-radius: 99px; }

    /* Mobile: full-width, top flush */
    @media (max-width: 640px) {
      .philsan-search-box {
        top: 0 !important; border-radius: 0 0 16px 16px;
        width: 100vw !important;
      }
    }
  </style>


  <!-- ═══════════════════════════════════════════════════════════ SEARCH SCRIPT -->
  <script>
  (function () {
    const AJAX_URL    = '<?php echo esc_js(admin_url("admin-ajax.php")); ?>';
    const SEARCH_PAGE = '<?php echo esc_js(home_url("/?s=")); ?>';
    const NONCE       = '<?php echo esc_js(wp_create_nonce("philsan_search_nonce")); ?>';

    const $trigger  = document.getElementById('philsan-search-trigger');
    const $panel    = document.getElementById('philsan-search-panel');
    const $backdrop = document.getElementById('philsan-search-backdrop');
    const $input    = document.getElementById('philsan-search-input');
    const $close    = document.getElementById('philsan-search-close');
    const $results  = document.getElementById('philsan-search-results');
    const $footer   = document.getElementById('philsan-search-footer');
    const $count    = document.getElementById('philsan-search-count');
    const $allLink  = document.getElementById('philsan-search-all-link');

    let timer        = null;
    let activeIndex  = -1;
    let liveResults  = [];

    // ── Open / Close ──────────────────────────────────────────────────────────
    function openSearch() {
      $panel.classList.add('is-open');
      $panel.setAttribute('aria-hidden', 'false');
      document.body.classList.add('philsan-search-open');
      setTimeout(() => $input.focus(), 80);
    }

    function closeSearch() {
      $panel.classList.remove('is-open');
      $panel.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('philsan-search-open');
      setTimeout(() => { $input.value = ''; renderEmpty(); }, 250);
    }

    $trigger.addEventListener('click', openSearch);
    $close.addEventListener('click', closeSearch);
    $backdrop.addEventListener('click', closeSearch);
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeSearch(); });

    // ── Typing ────────────────────────────────────────────────────────────────
    $input.addEventListener('input', function () {
      const kw = this.value.trim();
      activeIndex = -1;
      clearTimeout(timer);
      if (kw.length < 2) { renderEmpty(); return; }
      renderLoading();
      timer = setTimeout(() => doSearch(kw), 320);
    });

    // ── Keyboard nav ──────────────────────────────────────────────────────────
    $input.addEventListener('keydown', function (e) {
      const items = $results.querySelectorAll('.philsan-result-item');
      if (!items.length) return;
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        activeIndex = Math.min(activeIndex + 1, items.length - 1);
        updateActive(items);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        activeIndex = Math.max(activeIndex - 1, 0);
        updateActive(items);
      } else if (e.key === 'Enter') {
        if (activeIndex >= 0 && liveResults[activeIndex]) {
          window.location.href = liveResults[activeIndex].url;
        } else {
          goFull(this.value.trim());
        }
      }
    });

    $allLink.addEventListener('click', function (e) {
      e.preventDefault();
      goFull($input.value.trim());
    });

    $results.addEventListener('click', function (e) {
      const item = e.target.closest('.philsan-result-item');
      if (item) window.location.href = item.dataset.url;
    });

    function goFull(kw) {
      if (kw) window.location.href = SEARCH_PAGE + encodeURIComponent(kw);
    }

    // ── AJAX ──────────────────────────────────────────────────────────────────
    function doSearch(kw) {
      const fd = new FormData();
      fd.append('action',  'philsan_live_search');
      fd.append('keyword', kw);
      fd.append('nonce',   NONCE);

      fetch(AJAX_URL, { method: 'POST', body: fd })
        .then(r => r.json())
        .then(res => {
          if (res.success) {
            liveResults = res.data.results;
            renderResults(res.data.results, res.data.total, kw);
          } else { renderError(); }
        })
        .catch(renderError);
    }

    // ── Renderers ─────────────────────────────────────────────────────────────
    function renderEmpty() {
      $results.innerHTML = '';
      $footer.classList.add('hidden');
      liveResults = [];
    }

    function renderLoading() {
      $results.innerHTML = `
        <div class="philsan-state">
          <div class="philsan-spinner"></div>
          <span>Searching…</span>
        </div>`;
      $footer.classList.add('hidden');
    }

    function renderError() {
      $results.innerHTML = `
        <div class="philsan-state" style="color:#e55">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/>
            <line x1="12" y1="16" x2="12.01" y2="16"/>
          </svg>
          <span>Something went wrong. Please try again.</span>
        </div>`;
      $footer.classList.add('hidden');
    }

    function renderResults(results, total, kw) {
      if (!results.length) {
        $results.innerHTML = `
          <div class="philsan-state">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
              <circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <span>No results for <strong>${esc(kw)}</strong></span>
          </div>`;
        $footer.classList.add('hidden');
        return;
      }

      $results.innerHTML = results.map((r, i) => `
        <div class="philsan-result-item" role="option" tabindex="-1"
             data-url="${esc(r.url)}" data-index="${i}">
          <div><span class="philsan-result-type">${esc(r.type)}</span></div>
          <div class="philsan-result-title">${esc(r.title)}</div>
          <div class="philsan-result-excerpt">${r.excerpt}</div>
          <div class="philsan-result-url">${esc(r.url)}</div>
        </div>`
      ).join('');

      $count.textContent = `Showing ${results.length} of ${total} result${total !== 1 ? 's' : ''}`;
      $allLink.href = SEARCH_PAGE + encodeURIComponent(kw);
      $footer.classList.remove('hidden');
      activeIndex = -1;
    }

    function updateActive(items) {
      items.forEach(el => el.classList.remove('is-active'));
      if (activeIndex >= 0) {
        items[activeIndex].classList.add('is-active');
        items[activeIndex].scrollIntoView({ block: 'nearest' });
      }
    }

    function esc(s) {
      return String(s)
        .replace(/&/g,'&amp;').replace(/</g,'&lt;')
        .replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }
  }());
  </script>

<?php endif; ?>
