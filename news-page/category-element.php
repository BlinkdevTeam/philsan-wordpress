<!-- this is the category you will on every news item -->
<?php
    if ($categories) {
        $first_category = $categories[0];
        $extra_count = count($categories) - 1;
?>
        <div class="relative group inline-block">
            <!-- First Category -->
            <span class="px-2 py-1 bg-green-100 text-green-800 text-[18px] rounded">
                <?php echo esc_html($first_category->name); ?>
            </span>

            <!-- Extra count -->
            <?php if ($extra_count > 0): ?>
                <span class="ml-1 px-2 py-1 bg-green-100 text-green-800 text-[18px] rounded">
                    +<?php echo $extra_count; ?>
                </span>

                <!-- Popup with all categories -->
                <div class="absolute left-0 mt-2 hidden group-hover:block bg-white shadow-lg rounded p-3 text-[18px] w-max z-10">
                    <ul class="space-y-1">
                        <?php foreach ($categories as $cat): ?>
                            <li class="text-gray-800 "><?php echo esc_html($cat->name); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
?>