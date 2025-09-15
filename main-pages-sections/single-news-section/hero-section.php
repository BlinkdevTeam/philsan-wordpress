<div class="single-event-hero-section h-[580px]">
    <?php if ( have_rows('hero_section') ): ?>
        <?php while ( have_rows('hero_section') ): the_row(); ?>
            <div class="flex space-between h-full w-full relative y-thumbnail">
                <div class="custom-container py-[100px] mx-auto z-[2]">
                    <div class="w-[40%] flex flex-col h-[100%]">
                        <h1 class="text-[48px] font-[700] pb-[20px] text-[#ffffff]"><?php the_sub_field('hero_title'); ?></h1>
                        <p class="text-[18px] text-[#ffffff]"><?php the_sub_field('hero_sub'); ?></p>
                    </div>
                    <div class="w-60%">
                        <div class="swiper singleEvents w-[100%]">
                            <div class="swiper-wrapper">
                                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                                    <?php
                                        $image       = get_field("image");
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
                                        <div class="flex gap-[20px] p-[40px] rounded-xl bg-[#FCFCF0]">
                                            <div class="w-[40%]">
                                                <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
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
                </div>
                <div class="bg-gradient-to-b from-[rgba(11,83,4,0.3)] to-[rgba(11,83,4,1)] w-full h-full absolute top-0 left-0 z-[1]"></div>
                <img class="absolute w-full h-full object-cover" src="<?php echo get_sub_field('hero_image'); ?>" alt="hero-image">
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
