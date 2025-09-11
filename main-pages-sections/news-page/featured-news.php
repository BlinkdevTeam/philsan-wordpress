<div class="custom-container pt-[200px]">
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
        <h2 class="text-[42px] font-[700] pb-[20px] text-[#1F773A]">Featured News</h2>
    </div>
    <?php if ($featured->have_posts()) : ?>
        <div class="swiper featuredNews mt-[-200px]"> <!-- keep or remove negative margin if needed -->
            <div class="swiper-wrapper">
                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <?php
                    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $description        = get_the_content();
                    $date               = get_field("date");
                    if ($date) {
                        $dt = DateTime::createFromFormat('m/d/Y', $date);
                        $formatted_date = $dt ? $dt->format('F j, Y') : '';
                    } else {
                        $formatted_date = '';
                    }
                ?>
                <div class="swiper-slide">
                    <div class="slide-content">
                    <div class="slide-image">
                        <?php if ($featured_image_url) : ?>
                        <img src="<?php echo esc_url($featured_image_url); ?>"
                            alt="<?php echo esc_attr(get_the_title()); ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="slide-body">
                        <div class="flex justify-between items-center">
                        <?php include locate_template('main-pages-sections/news-page/category-element.php'); ?>
                        <div class="px-[20px] border border-black rounded-full w-fit">
                            <p class="text-[16px]"><?php echo esc_html($formatted_date); ?></p>
                        </div>
                        </div>

                        <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                        <p class="text-[16px] font-[400]"><?php echo esc_html(wp_strip_all_tags($description)); ?></p>

                        <div class="flex pt-[30px] mt-auto"> <!-- mt-auto keeps button at bottom -->
                        <?php echo theme_button("View More", get_permalink()); ?>
                        </div>
                    </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <!-- pagination -->
            <div class="swiper-pagination"></div>
            </div>



    <?php endif; ?>
</div>