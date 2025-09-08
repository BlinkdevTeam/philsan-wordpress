<?php if ($upcoming_events->have_posts()) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php while ($upcoming_events->have_posts()) : $upcoming_events->the_post(); ?>
            <?php
                $image       = get_field("image");
                $description = get_field("description");
                $date        = get_field("date");
                $categories  = get_the_terms(get_the_ID(), 'category-filters');

                $desc_limit   = 40;
                $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "...");

                // Reformat the date (your ACF date format may differ)
                if ($date) {
                    $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                } else {
                    $formatted_date = '';
                }
            ?>
            
            <div class="">
                <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                <div class="pt-[20px]">
                    <?php include locate_template('events-page/category-element.php'); ?>
                    <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                        <p class="text-[16px]"><?php echo esc_html($formatted_date); ?></p>
                    </div>
                    <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                    <p class="text-[18px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                </div>
                <div class="flex pt-[30px]">
                    <?php echo theme_button("View More", "/"); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
