<div class="custom-container pt-[150px]">
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
        <h2 class="text-[32px] md:text-[42px] font-[700] text-[#1F773A]">Featured News</h2>
    </div>
    <?php if ($featured->have_posts()) : ?>
        <!-- DESKTOP -->
        <div class="hidden md:block">
            <div class="swiper featuredNews mt-[-200px] w-[100%]">
                <div class="swiper-wrapper">
                    <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                        <?php
                            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $description = get_the_content();
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
                        <!-- FEATURED NEWS -->
                        <div class="swiper-slide justify-start">
                            <div class="flex gap-[20px] p-[40px] rounded-xl bg-[#FCFCF0]">
                                <div class="w-[40%]">
                                    <img class="w-full h-full object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                                </div>
                                <div class="flex flex-col gap-[10px] w-[60%]">
                                    <div class="flex justify-between items-center">
                                        <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>

                                        <div class="px-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                            <p class="text-[16px]"><?php echo esc_html($formatted_date); ?></p>
                                        </div>
                                    </div>
                                    <h2 class="text-left text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?> </h2>
                                    <p class="text-left text-[16px] font-[400]"><?php echo esc_html($description); ?></p>
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
                                    <div class="flex pt-[8px]">
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
            </div>
        </div>


        <!-- MOBILE -->
        <div class="md:hidden">
            <div class="swiper featuredNews mt-[-200px] w-[100%]">
                <div class="swiper-wrapper">
                    <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                        <?php
                            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $description = get_the_content();
                            $desc_limit = 200;
                            $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
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
                        <!-- FEATURED NEWS -->
                        <div class="swiper-slide justify-start">
                            <div class="flex gap-[20px] px-[20px] py-[40px] rounded-xl bg-[#FCFCF0]">
                                <div class="flex flex-col gap-[10px] w-[100%]">
                                    <div class="flex flex-col items-baseline justify-between items-center">
                                         <div class="px-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                            <p class="text-[12px]"><?php echo esc_html($formatted_date); ?></p>
                                        </div>
                                        <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>
                                    </div>
                                    <h2 class="text-left text-[18px] md:text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?> </h2>
                                    <div class="w-[100%] h-[200px]">
                                        <img class="w-full h-full object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                                    </div>
                                    <p class="text-left text-[14px] md:text-[16px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
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
                                    <div class="flex pt-[8px]">
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
            </div>
        </div>
    <?php endif; ?>
</div>