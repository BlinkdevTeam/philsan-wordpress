<?php 
$filter_group = array(
    array( 'key' => 'Date', 'value' => 'date', 'type' => 'meta', 'index' => 0), // meta field
    array( 'key' => 'Category', 'value' => 'category-filters', 'type' => 'taxonomy', 'index' => 1) // taxonomy
);
?>


<!-- SIDEBAR -->
<div id="sidebar" class="fixed top-0 right-0 w-80 p-[20px] h-screen bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
  <div class="flex items-center justify-between">
    <h2 class="text-xl font-bold">Filters</h2>
    <button id="closeFilter" class="text-gray-500 hover:text-black">&times;</button>
  </div>
  
  <?php foreach ($filter_group as $filter): ?>
    <div>
      <div 
        id="side-filter-head-<?php echo $filter['index']; ?>"
        class="flex gap-[20px] justify-between items-center text-[14px] xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
      >
        <p class="text-[16px]"><?php echo $filter['key']; ?></p>
      </div>

      <ul id="filter-content-<?php echo $filter['index']; ?>" class="relative py-[10px] z-[99] w-[100%] flex flex-col">
        
        <?php if ($filter['type'] === 'taxonomy'): ?>
          <?php 
            $terms = get_categories(array(
              'taxonomy'   => $filter['value'], 
              'hide_empty' => true,
            ));
          ?>
          <?php if (!is_wp_error($terms)) : ?>
            <?php foreach ($terms as $term) : ?>
              <li class="flex items-center cursor-pointer gap-2">
                <input 
                  type="checkbox" 
                  class="taxonomy-filter-checkbox"
                  data-taxonomy="<?php echo esc_attr($filter['value']); ?>"
                  value="<?php echo esc_attr($term->slug); ?>"
                  id="<?php echo esc_attr($filter['value'] . '-' . $term->slug); ?>"
                >
                <label for="<?php echo esc_attr($filter['value'] . '-' . $term->slug); ?>">
                  <?php echo esc_html($term->name); ?>
                </label>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        
        <?php elseif ($filter['type'] === 'meta' && $filter['value'] === 'date'): ?>
          <?php
            // Get unique dates from posts with ACF 'date'
            global $wpdb;
            $results = $wpdb->get_col("
              SELECT DISTINCT meta_value 
              FROM {$wpdb->postmeta} 
              WHERE meta_key = 'date' 
              ORDER BY meta_value DESC
            ");
          ?>
          <?php foreach ($results as $date_val) : ?>
            <li class="flex items-center cursor-pointer gap-2">
              <input 
                type="checkbox" 
                class="date-filter-checkbox"
                data-meta="date"
                value="<?php echo esc_attr($date_val); ?>"
                id="date-<?php echo esc_attr($date_val); ?>"
              >
              <label for="date-<?php echo esc_attr($date_val); ?>">
                <?php echo esc_html($date_val); ?>
              </label>
            </li>
          <?php endforeach; ?>
        
        <?php endif; ?>

      </ul>
    </div>
  <?php endforeach; ?>

  <div class="border-t">
    <button id="applyFilterBtn" class="w-full py-2 bg-green-600 text-white rounded">Apply Filters</button>
  </div>
</div>

<!-- BACKDROP -->
<div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
