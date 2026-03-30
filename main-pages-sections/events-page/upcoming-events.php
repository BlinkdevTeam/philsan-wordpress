<?php if ($upcoming_events->have_posts()) : ?>
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%] pt-[100px] pb-[50px]">
        <h2 class="text-[24px] font-[700] text-[#1F773A]">Upcoming Events</h2>
    </div>

    <div class="pt-[30px] pb-[100px] md:py-[100px]">

        <!-- DESKTOP -->
        <div class="hidden md:block flex flex-col gap-[50px]">
            <div id="upcoming-events-grid" class="grid grid-cols-1 gap-[30px]">
                <?php while ($upcoming_events->have_posts()) : $upcoming_events->the_post(); ?>
                    <?php
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description        = get_the_content();
                        $description        = wp_strip_all_tags($description);
                        $date               = get_field("date");
                        $categories         = get_the_terms(get_the_ID(), 'category-filters');
                        $button_link        = get_field("button_link");
                        $permalink          = get_permalink();

                        $desc_limit   = 200;
                        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "...");

                        if ($date) {
                            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                            $date_obj       = new DateTime($date);
                            $month          = $date_obj->format('M');
                            $year           = $date_obj->format('Y');
                        } else {
                            $formatted_date = '';
                            $month          = '';
                            $year           = '';
                        }
                    ?>
                    <div class="flex justify-between gap-[20px] border-b-[1px] border-[#cccccc] pb-[30px]">
                        <div class="bg-[#1f773a] rounded-md">
                            <div class="flex flex-col items-center pt-[30px] px-[10px]">
                                <p class="text-[24px] text-[#ffffff]"><?php echo $month; ?></p>
                                <h6 class="text-[16px] text-[#ffffff]"><?php echo $year; ?></h6>
                            </div>
                        </div>
                        <div class="w-[50%] pl-[20px]">
                            <div class="pt-[20px] w-[80%]">
                                <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                                <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                                <div class="text-[16px] font-[400]"><?php echo esc_html($desc_trimmed); ?></div>
                                <?php if (have_rows('social_media')) : ?>
                                    <div class="flex gap-[20px] pt-[20px]">
                                        <?php while (have_rows('social_media')) : the_row(); ?>
                                            <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>" class="cursor-pointer p-[8px] rounded-full bg-[#dfdfdf]">
                                                <img class="w-[20px] h-[20px] object-cover" src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" alt="">
                                            </a>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex pt-[30px]">
                                <?php if ($button_link) : ?>
                                    <?php echo theme_button("View More", $button_link); ?>
                                <?php else : ?>
                                    <?php echo theme_button("View More", $permalink); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="w-[50%]">
                            <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>

        <!-- MOBILE -->
        <div class="md:hidden flex flex-col gap-[50px]">
            <div id="upcoming-events-grid-mobile" class="grid grid-cols-1 gap-[30px]">
                <?php while ($upcoming_events->have_posts()) : $upcoming_events->the_post(); ?>
                    <?php
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description        = get_the_content();
                        $description        = wp_strip_all_tags($description);
                        $date               = get_field("date");
                        $categories         = get_the_terms(get_the_ID(), 'category-filters');
                        $button_link        = get_field("button_link");
                        $permalink          = get_permalink();

                        $desc_limit   = 200;
                        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "...");

                        if ($date) {
                            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                            $date_obj       = new DateTime($date);
                            $month          = $date_obj->format('M');
                            $year           = $date_obj->format('Y');
                        } else {
                            $formatted_date = '';
                            $month          = '';
                            $year           = '';
                        }
                    ?>
                    <div class="flex justify-between gap-[20px] border-b-[1px] border-[#cccccc]">
                        <div class="w-[100%]">
                            <div class="pt-[20px] w-[100%]">
                                <div class="px-[20px] my-[10px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[12px] md:text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                                <h2 class="text-[18px] md:text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                                <div class="w-[100%] pb-[10px] pt-[5px]">
                                    <img class="w-full h-[150px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                                </div>
                                <div class="text-[14px] md:text-[16px] font-[400]"><?php echo esc_html($desc_trimmed); ?></div>
                                <?php if (have_rows('social_media')) : ?>
                                    <div class="flex gap-[20px] pt-[20px]">
                                        <?php while (have_rows('social_media')) : the_row(); ?>
                                            <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>" class="cursor-pointer p-[8px] rounded-full bg-[#dfdfdf]">
                                                <img class="w-[20px] h-[20px] object-cover" src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" alt="">
                                            </a>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex py-[20px]">
                                <?php if ($button_link) : ?>
                                    <?php echo theme_button("View More", $button_link); ?>
                                <?php else : ?>
                                    <?php echo theme_button("View More", $permalink); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>

        <div id="upcoming-events-pagination" class="flex justify-center space-x-2 mt-6">
            <?php
                echo paginate_links(array(
                    'total'              => $upcoming_events->max_num_pages,
                    'current'            => $paged,
                    'prev_text'          => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</span>',
                    'next_text'          => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</span>',
                    'before_page_number' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">',
                    'after_page_number'  => '</span>',
                ));
            ?>
        </div>

    </div>
<?php endif; ?>