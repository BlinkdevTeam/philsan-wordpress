<?php if ($featured->have_posts()) : ?>
    <!-- FEATURED  EVENTS BUT MIGHT NOT BE THE LATEST -->
    <div class="mt-[-200px] custom-container">
        <div class="swiper featuredEvents mt-[-200px] w-[100%]">
            <div class="swiper-wrapper">
                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                    <?php
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description = get_the_content();
                        $description = wp_strip_all_tags($description);
                        $date        = get_field("date");
                        $categories = get_the_terms( get_the_ID(), 'category-filters' );
                        $button_link = get_field("button_link");
                        $permalink = get_permalink();

                        // Reformat the date
                        if ($date) {
                            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                        } else {
                            $formatted_date = '';
                        }
                    ?>
                    <!-- FEATURED EVENTS -->
                    <div class="swiper-slide">
                        <div class="flex gap-[20px] py-[50px] px-[40px] rounded-xl bg-[#FCFCF0]">
                            <div class="w-[40%]">
                                <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                            </div>
                            <div class="flex flex-col gap-[10px] w-[60%]">
                                <div class="flex justify-between items-center">
                                    <?php include locate_template('main-pages-sections/events-page/category-element.php'); ?>
                                    <div class="px-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                        <p class="text-[16px]"><?php echo esc_html($formatted_date); ?></p>
                                    </div>
                                </div>
                                <h2 class="text-[24px] text-left font-[600] text-[#1f773a] text-left"><?php the_title(); ?> </h2>
                                <div class="text-[18px] text-left font-[400]"><?php echo esc_html($description); ?></div>
                                <?php if (have_rows('social_media')) : ?>
                                    <div class="flex gap-[20px] pt-[20px]">
                                        <?php while (have_rows('social_media')) : the_row(); ?>
                                            <!-- Loop through each row in the 'about_description' repeater -->
                                        <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>" class="cursor-pointer p-[8px] rounded-full bg-[#e6fcdc]">
                                                <img class="w-[20px] h-[20px] object-cover" src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" alt="">
                                            </a>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?> 
                                <div class="flex pt-[30px]">
                                    <?php if($button_link) : ?>
                                        <?php echo theme_button("View More", $button_link); ?>
                                    <?php else : ?>
                                        <?php echo theme_button("View More", $permalink); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
<?php endif; ?>