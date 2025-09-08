<?php     var_dump($past_events); if ($past_events->have_posts()) : ?>
    <div class="py-[100px]">
        <div class="w-[100%] flex flex-col justify-center items-center h-[100%] pt-[10px] pb-[50px]">
            <h2 class="text-[42px] font-[700] pb-[20px] text-[#1F773A]">Past Events</h2>
        </div>
        <div class="flex flex-col gap-[50px] pt-[50px]">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px]">
                <?php while ($past_events->have_posts()) : ?>
                    <?php
                        $image       = get_field("image");
                        $description = get_field("description");
                        $date        = get_field("date");
                        $categories = get_the_terms( get_the_ID(), 'category-filters' );
                        
                        $desc_limit = 40;
                        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
                        // Reformat the date
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
                                <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                            </div>
                            <h2 class="text-[18px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                            <p class="text-[14px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                        </div>
                        <div class="flex pt-[30px]">
                            <?php echo theme_button("View More", "/"); ?>
                        </div>
                        <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
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

