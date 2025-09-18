<?php get_header(); ?>
    <?php 
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $gallery = get_field("image");
        $description = get_the_content();
        $date        = get_field("date");
        $categories = get_the_terms( get_the_ID(), 'category-filters' );
        $title = get_the_title();

        $title_limit = 60;
        $desc_limit = 60;
        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
        $title_trimmed = mb_strimwidth($description, 0, $title_limit, "...");
        // Reformat the date
        if ($date) {
            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
        } else {
            $formatted_date = '';
        }
    ?>
    <div class="custom-container py-[100px]">
        <div class="flex flex-col gap-[20px]">
            <h2 class="text-left text-[24px] lg:text-[32px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
            <div class="flex flex-col lg:flex-row gap-[20px]">
                <div class="w-[100%] lg:w-[70%]">
                    <img class="w-full h-[200px] lg:h-[600px] object-cover rounded-xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                </div>
                <?php if ($gallery) : ?>
                    <!-- DESKTOP -->
                    <div class="hidden lg:block">
                        <div class="swiper singleFeaturedNews">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $image) : ?>
                                    <div class="swiper-slide justify-start">
                                        <img 
                                            src="<?php echo esc_url($image['url']); ?>" 
                                            alt="<?php echo esc_attr($image['alt']); ?>" 
                                            class="w-full h-[285px] object-cover rounded-xl"
                                        />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- MOBILE -->
                    <div class="lg:hidden">
                        <div class="swiper singleFeaturedNewsMobile">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $image) : ?>
                                    <div class="swiper-slide justify-start">
                                        <img 
                                            src="<?php echo esc_url($image['url']); ?>" 
                                            alt="<?php echo esc_attr($image['alt']); ?>" 
                                            class="w-full h-[150px] object-cover rounded-xl"
                                        />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <p class="text-left text-[16px] md:text-[18px] font-[400]"><?php echo esc_html($description); ?></p>
        </div>
    </div>
<?php get_footer(); ?>