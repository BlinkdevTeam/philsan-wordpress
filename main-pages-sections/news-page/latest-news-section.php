<div class="flex flex-col gap-[50px] pt-[50px]">
    <!-- FEATURED NEWS BUT MIGHT NOT BE THE LATEST -->
    <?php if ($featured->have_posts()) : ?>
        <div class="flex">
            <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <?php
                    $gallery       = get_field("image");
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
                <!-- FEATURED NEWS -->
                <div class="flex gap-[20px] p-[40px] rounded-xl bg-[#FCFCF0]">
                    <div class="w-[40%]">
                        <!-- <img class="w-full h-auto object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo //esc_url($image); ?>" alt=""> -->
                         <!-- <?php// if ($gallery) : ?>
                            <div class="swiper aboutSwiper">
                                <div class="swiper-wrapper">
                                    <?php //foreach ($gallery as $image) : ?>
                                        <div class="swiper-slide">
                                            <img 
                                                src="<?php //echo esc_url($image['url']); ?>" 
                                                alt="<?php //echo esc_attr($image['alt']); ?>" 
                                                class="w-full h-auto object-cover rounded-xl"
                                            />
                                        </div>
                                    <?php //endforeach; ?>
                                </div>
                            </div>
                        <?php //endif; ?> -->

                    </div>
                    <div class="flex flex-col gap-[10px] w-[60%]">
                        <div class="flex justify-between items-center">
                            <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>

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
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
    
    <!-- NON FEATURED BUT LATEST NEWS -->
    <?php if ($non_featured->have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ($non_featured->have_posts()) : $non_featured->the_post(); ?>
                <?php
                    $gallery       = get_field("image");
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
                <!-- NON-FEATURED NEWS -->
                <div class="">
                    <!-- <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php //echo esc_url($image); ?>" alt=""> -->
                     <!-- <?php //if ($gallery) : ?>
                        <div class="swiper aboutSwiper">
                            <div class="swiper-wrapper">
                                <?php //foreach ($gallery as $image) : ?>
                                    <div class="swiper-slide">
                                        <img 
                                            src="<?php //echo esc_url($image['url']); ?>" 
                                            alt="<?php //echo esc_attr($image['alt']); ?>" 
                                            class="w-full h-auto object-cover rounded-xl"
                                        />
                                    </div>
                                <?php// endforeach; ?>
                            </div>
                        </div>
                    <?php// endif; ?> -->

                    <div class="pt-[20px]">
                        <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>
                        <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                            <p class="text-[16px]"><?php echo esc_html($formatted_date); ?></p>
                        </div>
                        <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                        <p class="text-[18px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                    </div>
                    <div class="flex pt-[30px]">
                        <?php echo theme_button("View More", "/"); ?>
                    </div>
                    <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
</div>
