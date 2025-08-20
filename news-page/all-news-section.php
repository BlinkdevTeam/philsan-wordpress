<div class="py-[100px]">
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
        <h2 class="leading-[normal] text-[34px] xl:text-[72px] font-[700] pb-[20px] text-[#1F773A]">All News</h2>
    </div>
    <div class="flex flex-col gap-[50px] pt-[50px]">
        <?php if ($all_news->have_posts()) : ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px]">
                <?php while ($all_news->have_posts()) : $all_news->the_post(); ?>
                    <?php
                        $image       = get_field("image");
                        $description = get_field("description");
                        $date        = get_field("date");
                        $categories = get_the_terms( get_the_ID(), 'category-filters' );

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
                            <?php include locate_template('news-page/all-news-section.php'); ?>
                            <div class="px-[20px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                <p class="text-[18px]"><?php echo esc_html($formatted_date); ?></p>
                            </div>
                            <h2 class="text-[24px] leading-[normal] font-[400] text-[#000000]"><?php the_title(); ?></h2>
                        </div>
                        <a href="https://philsan.org/38th-annual-convention/registration/" class="flex w-fit mt-[20px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-[40px] rounded-br-[40px]">
                            <span class="text-[#ffffff] text-bold text-[18px]">View More</span>
                        </a>
                        <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="flex justify-center space-x-2 mt-6">
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

