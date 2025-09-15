<?php if ($past_events->have_posts()) : ?>
    <div class="py-[100px]">
        <div class="flex flex-col gap-[50px]">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-[30px]">
                <?php while ($past_events->have_posts()) : $past_events->the_post(); ?>
                    <?php
                        $image       = get_field("image");
                        $description = the_content();
                        $date        = get_field("date");
                        $categories = get_the_terms( get_the_ID(), 'category-filters' );
                        
                        $desc_limit = 200;
                        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
                        // Reformat the date
                        if ($date) {
                            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                            $date_obj = new DateTime($date);

                            // Format parts separately
                            $month = $date_obj->format('M'); // short month name: Jan, Feb, Mar
                            $year  = $date_obj->format('Y'); // year: 2025
                        } else {
                            $formatted_date = '';
                        }
                    ?>
                    <div class="flex justify-between gap-[20px] border-b-[1px] border-[#cccccc] pb-[30px]">
                        <div class="bg-[#1f773a] rounded-md">
                            <div class="flex flex-col items-center pt-[30px] px-[10px]">
                                <p class="text-[24px] text-[#ffffff]"><?php echo $month ?></p>
                                <h6 class="text-[16px] text-[#ffffff]"><?php echo $year ?></h6>
                            </div>
                        </div>
                        <div class="w-[50%] pl-[20px]">
                            <div class="pt-[20px] w-[80%]">
                                <?php include locate_template('main-pages-sections/events-page/category-element.php'); ?>
                                <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                                <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                                <div class="text-[16px] font-[400]"><?php echo esc_html($desc_trimmed); ?></div>
                            </div>
                            <div class="flex pt-[30px]">
                                <?php echo theme_button("View More", "/"); ?>
                            </div>
                            <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
                        </div>
                        <div class="w-[50%]">
                            <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="flex justify-center space-x-2 mt-6">
        <?php
            echo paginate_links(array(
                'total'   => $past_events->max_num_pages,
                'current' => $paged,
                'prev_text' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">«</span>',
                'next_text' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">»</span>',
                'before_page_number' => '<span class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">',
                'after_page_number'  => '</span>',
            ));
            ?>
        </div>
    </div>
<?php endif; ?>

