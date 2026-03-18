<?php 
$filter_group = array(
    array( 'key' => 'Date', 'value' => 'date', 'type' => 'meta', 'index' => 0),
    array( 'key' => 'Category', 'value' => 'category-filters', 'type' => 'taxonomy', 'index' => 1)
);
?>

<!-- ═══════════════════════════════════════════════════════════ FILTER SIDEBAR -->
<div id="sidebar" class="fixed top-0 right-0 h-screen bg-white z-[9999] flex flex-col" style="width: 360px; transform: translateX(100%); transition: transform .3s cubic-bezier(.4,0,.2,1); box-shadow: -8px 0 40px rgba(0,0,0,.12);">

  <!-- Header -->
  <div style="padding: 24px 24px 20px; border-bottom: 1px solid #f0f0f0; flex-shrink: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between;">
      <div style="display: flex; align-items: center; gap: 10px;">
        <div style="width: 4px; height: 24px; background: #096936; border-radius: 99px;"></div>
        <h2 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0;">Filter</h2>
      </div>
      <button id="closeFilter" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border: none; background: #f5f5f5; border-radius: 99px; cursor: pointer; color: #666; transition: background .2s, color .2s;" onmouseover="this.style.background='#fee2e2';this.style.color='#ef4444'" onmouseout="this.style.background='#f5f5f5';this.style.color='#666'">
        <svg width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <line x1="1" y1="1" x2="13" y2="13"/><line x1="13" y1="1" x2="1" y2="13"/>
        </svg>
      </button>
    </div>

    <!-- Active filter count badge -->
    <div id="active-filter-summary" style="display: none; margin-top: 12px; padding: 8px 12px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px;">
      <span style="font-size: 12px; color: #096936; font-weight: 600;" id="active-filter-text">0 filters active</span>
    </div>
  </div>

  <!-- Scrollable filter groups -->
  <div style="flex: 1; overflow-y: auto; padding: 8px 0;">

    <?php foreach ($filter_group as $filter): ?>
      <div class="filter-group" style="border-bottom: 1px solid #f5f5f5;">

        <!-- Accordion toggle -->
        <button
          id="side-filter-head-<?php echo $filter['index']; ?>"
          onclick="toggleFilterGroup(<?php echo $filter['index']; ?>)"
          style="width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 16px 24px; background: none; border: none; cursor: pointer; text-align: left;"
        >
          <div style="display: flex; align-items: center; gap: 10px;">
            <?php if ($filter['value'] === 'date'): ?>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
              </svg>
            <?php else: ?>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M7 12h10M10 18h4"/>
              </svg>
            <?php endif; ?>
            <span style="font-size: 14px; font-weight: 600; color: #1a1a1a;"><?php echo $filter['key']; ?></span>
            <span id="filter-badge-<?php echo $filter['index']; ?>" style="display: none; font-size: 10px; font-weight: 700; background: #096936; color: white; border-radius: 99px; padding: 1px 7px;">0</span>
          </div>
          <svg id="filter-chevron-<?php echo $filter['index']; ?>" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="transition: transform .2s; transform: rotate(0deg);">
            <polyline points="6 9 12 15 18 9"/>
          </svg>
        </button>

        <!-- Filter options -->
        <div id="filter-content-<?php echo $filter['index']; ?>" style="overflow: hidden; max-height: 0; transition: max-height .3s ease;">
          <ul style="list-style: none; margin: 0; padding: 0 24px 16px;">

            <?php if ($filter['type'] === 'taxonomy'): ?>
              <?php 
                $terms = get_categories(array(
                  'taxonomy'   => $filter['value'], 
                  'hide_empty' => true,
                ));
              ?>
              <?php if (!is_wp_error($terms)) : ?>
                <?php foreach ($terms as $term) : ?>
                  <li style="margin-bottom: 2px;">
                    <label style="display: flex; align-items: center; gap: 10px; padding: 8px 10px; border-radius: 8px; cursor: pointer; transition: background .15s;" onmouseover="this.style.background='#f6fbf8'" onmouseout="this.style.background='transparent'">
                      <input 
                        type="checkbox" 
                        class="taxonomy-filter-checkbox filter-checkbox"
                        data-taxonomy="<?php echo esc_attr($filter['value']); ?>"
                        data-group="<?php echo $filter['index']; ?>"
                        value="<?php echo esc_attr($term->slug); ?>"
                        id="<?php echo esc_attr($filter['value'] . '-' . $term->slug); ?>"
                        style="display: none;"
                      >
                      <span class="custom-checkbox" style="width: 18px; height: 18px; flex-shrink: 0; border: 2px solid #d1d5db; border-radius: 5px; display: flex; align-items: center; justify-content: center; transition: border-color .15s, background .15s;">
                        <svg width="10" height="8" viewBox="0 0 10 8" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0; transition: opacity .15s;">
                          <polyline points="1 4 4 7 9 1"/>
                        </svg>
                      </span>
                      <span style="font-size: 13px; color: #374151;"><?php echo esc_html($term->name); ?></span>
                    </label>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>

            <?php elseif ($filter['type'] === 'meta' && $filter['value'] === 'date'): ?>
              <?php
                global $wpdb;
                $results = $wpdb->get_col("
                  SELECT DISTINCT meta_value 
                  FROM {$wpdb->postmeta} 
                  WHERE meta_key = 'date' 
                  ORDER BY meta_value DESC
                ");
              ?>
              <?php foreach ($results as $date_val) : ?>
                <li style="margin-bottom: 2px;">
                  <label style="display: flex; align-items: center; gap: 10px; padding: 8px 10px; border-radius: 8px; cursor: pointer; transition: background .15s;" onmouseover="this.style.background='#f6fbf8'" onmouseout="this.style.background='transparent'">
                    <input 
                      type="checkbox" 
                      class="date-filter-checkbox filter-checkbox"
                      data-meta="date"
                      data-group="<?php echo $filter['index']; ?>"
                      value="<?php echo esc_attr($date_val); ?>"
                      id="date-<?php echo esc_attr($date_val); ?>"
                      style="display: none;"
                    >
                    <span class="custom-checkbox" style="width: 18px; height: 18px; flex-shrink: 0; border: 2px solid #d1d5db; border-radius: 5px; display: flex; align-items: center; justify-content: center; transition: border-color .15s, background .15s;">
                      <svg width="10" height="8" viewBox="0 0 10 8" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0; transition: opacity .15s;">
                        <polyline points="1 4 4 7 9 1"/>
                      </svg>
                    </span>
                    <span style="font-size: 13px; color: #374151;"><?php echo esc_html($date_val); ?></span>
                  </label>
                </li>
              <?php endforeach; ?>

            <?php endif; ?>
          </ul>
        </div>

      </div>
    <?php endforeach; ?>

  </div>

  <!-- Footer actions -->
  <div style="padding: 16px 24px; border-top: 1px solid #f0f0f0; flex-shrink: 0; display: flex; gap: 10px;">
    <button id="clearFilterBtn" style="flex: 1; padding: 10px; background: #f5f5f5; color: #374151; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background .2s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f5f5f5'">
      Clear All
    </button>
    <button id="applyFilterBtn" style="flex: 2; padding: 10px; background: #096936; color: white; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background .2s;" onmouseover="this.style.background='#07582c'" onmouseout="this.style.background='#096936'">
      Apply Filters
    </button>
  </div>

</div>

<!-- BACKDROP -->
<div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- ═══════════════════════════════════════════════════════════ FILTER STYLES -->
<style>
  /* Custom checkbox checked state */
  .filter-checkbox:checked + .custom-checkbox {
    background: #096936;
    border-color: #096936;
  }
  .filter-checkbox:checked + .custom-checkbox svg {
    opacity: 1;
  }

  /* Sidebar open state */
  #sidebar.is-open {
    transform: translateX(0) !important;
  }

  /* Scrollbar */
  #sidebar > div:nth-child(2)::-webkit-scrollbar { width: 4px; }
  #sidebar > div:nth-child(2)::-webkit-scrollbar-track { background: transparent; }
  #sidebar > div:nth-child(2)::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 99px; }
</style>

<!-- ═══════════════════════════════════════════════════════════ FILTER SCRIPT -->
<script>
  // ── Accordion toggle ──────────────────────────────────────────────────────
  function toggleFilterGroup(index) {
    const content  = document.getElementById('filter-content-' + index);
    const chevron  = document.getElementById('filter-chevron-' + index);
    const isOpen   = content.style.maxHeight !== '0px' && content.style.maxHeight !== '';

    if (isOpen) {
      content.style.maxHeight = '0px';
      chevron.style.transform = 'rotate(0deg)';
    } else {
      content.style.maxHeight = content.scrollHeight + 'px';
      chevron.style.transform = 'rotate(180deg)';
    }
  }

  // Open first group by default
  document.addEventListener('DOMContentLoaded', function () {
    const first = document.getElementById('filter-content-0');
    const chevron = document.getElementById('filter-chevron-0');
    if (first) {
      first.style.maxHeight = first.scrollHeight + 'px';
      chevron.style.transform = 'rotate(180deg)';
    }

    // ── Custom checkbox toggle ──────────────────────────────────────────────
    document.querySelectorAll('.filter-checkbox').forEach(function (checkbox) {
      const label      = checkbox.closest('label');
      const customBox  = label.querySelector('.custom-checkbox');

      label.addEventListener('click', function (e) {
        e.preventDefault();
        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
          customBox.style.background    = '#096936';
          customBox.style.borderColor   = '#096936';
          customBox.querySelector('svg').style.opacity = '1';
        } else {
          customBox.style.background    = 'transparent';
          customBox.style.borderColor   = '#d1d5db';
          customBox.querySelector('svg').style.opacity = '0';
        }

        updateBadges();
      });
    });

    // ── Clear all ───────────────────────────────────────────────────────────
    document.getElementById('clearFilterBtn').addEventListener('click', function () {
      document.querySelectorAll('.filter-checkbox').forEach(function (cb) {
        cb.checked = false;
        const customBox = cb.closest('label').querySelector('.custom-checkbox');
        customBox.style.background  = 'transparent';
        customBox.style.borderColor = '#d1d5db';
        customBox.querySelector('svg').style.opacity = '0';
      });
      updateBadges();
    });
  });

  // ── Badge counter ─────────────────────────────────────────────────────────
  function updateBadges() {
    let total = 0;

    document.querySelectorAll('.filter-group').forEach(function (group, i) {
      const checked = group.querySelectorAll('.filter-checkbox:checked').length;
      const badge   = document.getElementById('filter-badge-' + i);

      if (badge) {
        badge.textContent   = checked;
        badge.style.display = checked > 0 ? 'inline' : 'none';
      }
      total += checked;
    });

    const summary = document.getElementById('active-filter-summary');
    const text    = document.getElementById('active-filter-text');
    if (summary && text) {
      summary.style.display = total > 0 ? 'block' : 'none';
      text.textContent      = total + ' filter' + (total !== 1 ? 's' : '') + ' active';
    }
  }
</script>