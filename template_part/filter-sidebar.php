<?php 
    $filter_group = array(
        array( 'key' => 'Date', 'value' => 'date', 'index' => 0),
        array( 'key' => 'category-filters', 'value' => 'category-filters', 'index' => 1)
    );
?>

<!-- SIDEBAR -->
<div id="sidebar" class="fixed top-0 right-0 w-80 h-screen bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
  <div class="flex items-center justify-between p-4 border-b">
    <h2 class="text-xl font-bold">Filters</h2>
    <button id="closeFilter" class="text-gray-500 hover:text-black">&times;</button>
  </div>
  
  
  <?php foreach ($filter_group as $filter): ?>
    <div>
      <div 
        id="news-side-filter-head-<?php echo $filter['index']; ?>"
        class="flex gap-[20px] justify-between items-center text-[14px] xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
      >
        <p class="text-[16px]"><?php echo $filter['key']; ?></p>
        <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <?php
          $taxonomy = $filter['value'];
          $terms = get_categories(array(
              'taxonomy'   => $taxonomy, 
              'hide_empty' => true,
          ));
      ?>
      <ul id="news-filter-content-<?php echo $filter['index']; ?>" class="type-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
          <?php if (!is_wp_error($terms)) : ?>
            <?php foreach ($terms as $term) : ?>
              <div 
                  class="flex items-center"  
                  id="filter-item-<?php echo esc_attr($term->term_id); ?>"
                  data-name="<?php echo esc_attr($term->name); ?>" 
                  data-value="<?php echo esc_attr($term->term_id); ?>"
              >
                  <li 
                      class="w-[200px] flex gap-[10px] font-[200] hover:font-[600] text-[#000000] text-[14px] py-[2px] cursor-pointer" 
                      data-name="<?php echo esc_attr($term->name); ?>" 
                      data-value="<?php echo esc_attr($term->term_id); ?>"
                      data-taxonomy="<?php echo $filter['value']; ?>[]"
                  >
                      <div class="selection-box">
                          <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                          </svg>
                          <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" fill="#DFF8EA"/>
                              <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#096936"/>
                              <path d="M13.5 5.625L7.3125 11.8125L4.5 9" stroke="#096936" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                      </div>
                      <?php echo esc_html($term->name); ?>
                  </li>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
      </ul>
    </div>
  <?php endforeach; ?>

  <div class="p-4 border-t">
    <button class="w-full py-2 bg-green-600 text-white rounded">Apply Filters</button>
  </div>
</div>

<!-- BACKDROP -->
<div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
