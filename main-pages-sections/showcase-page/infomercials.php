<div class="py-[50px]">
    <div class="flex flex-col gap-[50px] pt-[50px]">
        <?php if ( have_rows('showcase_repeater') ): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
                <?php while ( have_rows('showcase_repeater') ): the_row(); ?>
                    <?php
                        $featured_image_url = get_sub_field("featured_image");
                        $description = ge_sub_field("description");
                        $description = wp_strip_all_tags($description);
                        $sponsor        = get_sub_field("sponsor");
                        $date        = get_sub_field("published_date");
                        $title = get_sub_field("title");

                        $title_limit = 60;
                        $desc_limit = 60;
                        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
                        $title_trimmed = mb_strimwidth($description, 0, $title_limit, "...");
                        // Reformat the date
                        if ($date) {
                            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                        } else {
                            $formatted_date = '';
                        }
                    ?>

                    <!-- DESKTOP -->
                    <div class="block">
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
                            <?php echo theme_button("Watch Video", "/"); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

