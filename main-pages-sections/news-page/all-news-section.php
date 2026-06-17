<div class="py-[50px]">
    <div class="flex flex-col gap-[50px] pt-[50px]">
        <?php if ($all_news->have_posts()) : ?>
            <div id="news-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
                <?php while ($all_news->have_posts()) : $all_news->the_post(); ?>
                    <?php
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description = get_the_content();
                        $description = wp_strip_all_tags($description);
                        $date        = get_field("date");
                        $date_to     = get_field("date_to");
                        $categories = get_the_terms( get_the_ID(), 'category-filters' );
                        $title = get_the_title();
                        $button_link = get_field("button_link");
                        $permalink = get_permalink();

                        $title_limit = 60;
                        $desc_limit = 60;
                        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "...");
                        $title_trimmed = mb_strimwidth($description, 0, $title_limit, "...");

                        // Reformat the date
                        if ($date) {
                            $date_obj       = DateTime::createFromFormat('m/d/Y', $date);
                            $formatted_date = $date_obj ? $date_obj->format('F j, Y') : '';
                            $day            = $date_obj ? $date_obj->format('j') : '';
                            $month          = $date_obj ? $date_obj->format('M') : '';
                            $year           = $date_obj ? $date_obj->format('Y') : '';
                        } else {
                            $formatted_date = '';
                            $month          = '';
                            $year           = '';
                        }

                        if ($date_to) {
                            $date_to_obj       = DateTime::createFromFormat('m/d/Y', $date_to);
                            $formatted_date_to = $date_to_obj ? $date_to_obj->format('F j, Y') : '';
                            $day_to            = $date_to_obj ? $date_to_obj->format('d') : '';
                            $month_to          = $date_to_obj ? $date_to_obj->format('M') : '';
                            $year_to           = $date_to_obj ? $date_to_obj->format('Y') : '';
                        } else {
                            $formatted_date_to = '';
                            $day_to            = '';
                            $month_to          = '';
                            $year_to           = '';
                        }
                    ?>

                    <!-- DESKTOP -->
                    <div class="hidden md:block">
                        <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                        <div class="pt-[20px]">
                            <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>

                            <?php if($date_to) : ?>
                                <div class="flex gap-[5px] px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[14px]"><?php echo esc_html($day); ?></p>
                                    <span>-</span>
                                    <p class="text-[14px]"><?php echo esc_html($day_to); ?>,</p>
                                    <p class="text-[14px]"><?php echo esc_html($month); ?></p>
                                    <p class="text-[14px]"><?php echo esc_html($year); ?></p>
                                </div>
                            <?php else : ?>
                                <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                            <?php endif; ?>


                            <h2 class="text-[18px] font-[600] text-[#1f773a]"><?php echo esc_html($title_trimmed); ?></h2>
                            <p class="text-[14px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                        </div>
                        <div class="flex pt-[30px]">
                            <?php if($button_link) : ?>
                                <?php echo theme_button("View More", $button_link); ?>
                            <?php else : ?>
                                <?php echo theme_button("View More", $permalink); ?>
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

                            <?php if($date_to) : ?>
                                <div class="flex gap-[5px] px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[12px] md:text-[14px]"><?php echo esc_html($day); ?></p>
                                    <span>-</span>
                                    <p class="text-[12px] md:text-[14px]"><?php echo esc_html($day_to); ?>,</p>
                                    <p class="text-[12px] md:text-[14px]"><?php echo esc_html($month); ?></p>
                                    <p class="text-[12px] md:text-[14px]"><?php echo esc_html($year); ?></p>
                                </div>
                            <?php else : ?>
                                <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[12px] md:text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                            <?php endif; ?>

                            <h2 class="text-[16px] md:text-[18px] font-[600] text-[#1f773a]"><?php echo esc_html($title_trimmed); ?></h2>
                            <div class="py-[10px]">
                                <img class="w-full h-[200px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                            </div>
                            <p class="text-[14px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                        </div>
                        <div class="flex pt-[30px]">
                            <?php if($button_link) : ?>
                                <?php echo theme_button("View More", $button_link); ?>
                            <?php else : ?>
                                <?php echo theme_button("View More", $permalink); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination — hidden during search -->
    <div id="news-pagination" class="flex justify-center space-x-2 mt-6">
        <?php
            echo paginate_links(array(
                'total'   => $all_news->max_num_pages,
                'current' => $paged,
                'prev_text' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</span>',
                'next_text' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</span>',
                'before_page_number' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">',
                'after_page_number'  => '</span>',
            ));
        ?>
    </div>
</div>