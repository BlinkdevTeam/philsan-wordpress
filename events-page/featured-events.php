<?php if ($featured->have_posts()) : ?>
    <!-- FEATURED  EVENTS BUT MIGHT NOT BE THE LATEST -->
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%] pt-[50px] pb-[150px]">
        <h2 class="text-[24px] font-[700] text-[#1F773A]">Featured Events</h2>
    </div>
    <div class="swiper featuredEvents">
        <div class="swiper-wrapper">
            <?php while ($featured->have_posts()) : $featured->the_post(); ?>
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
                <!-- FEATURED EVENTS -->
                <div class="swiper-slide">
                    <div class="flex gap-[20px] p-[40px] rounded-xl bg-[#FCFCF0]">
                        <div class="w-[40%]">
                            <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                        </div>
                        <div class="flex flex-col gap-[10px] w-[60%]">
                            <div class="flex justify-between items-center">
                                <?php include locate_template('events-page/category-element.php'); ?>

                                <div class="px-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[16px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                            </div>
                            <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?> </h2>
                            <p class="text-[18px] font-[400]"><?php echo esc_html($description); ?></p>
                            <div class="flex pt-[30px]">
                                <?php echo theme_button("View More", "/"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
<?php endif; ?>