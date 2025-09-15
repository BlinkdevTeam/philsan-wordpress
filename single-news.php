<?php get_header(); ?>
    <?php 
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $gallery = get_field("image");
        $description = get_the_content();
        $date        = get_field("date");
        $categories = get_the_terms( get_the_ID(), 'category-filters' );
        $title = get_the_title();

        // Reformat the date
        if ($date) {
            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
        } else {
            $formatted_date = '';
        }
    ?>
    <div class="custom-container py-[100px]">
        <div class="flex flex-col gap-[20px]">
            <div class="flex flex-col gap-[10px]">
                <h2 class="text-left text-[32px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                <div class="px-[30px] py-[15px] border-[1px] border-[#5d5d5d]">
                    <p class="text-[18px] text-[#5d5d5d]"><?php echo $formatted_date ?></p>
                </div>
            </div>
            <div class="flex gap-[20px]">
                <?php if ($gallery) : ?>
                    <div class="w-[70%]">
                        <img class="w-full h-[600px] object-cover rounded-xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                    </div>
                <?php else:  ?>
                    <div class="w-[100%]">
                        <img class="w-full h-[600px] object-cover rounded-xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php if ($gallery) : ?>
                    <div class="w-[30%]">
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
                <?php endif; ?>
            </div>
            
            <p class="text-left text-[18px] font-[300] text-[#5d5d5d]"><?php echo esc_html($description); ?></p>
            <?php if (have_rows('social_media')) : ?>
               <div class="flex gap-[20px]">
                    <?php while (have_rows('social_media')) : the_row(); ?>
                        <!-- Loop through each row in the 'about_description' repeater -->
                       <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>" class="cursor-pointer">
                            <img class="w-[30px] h-[30px] object-cover" 
                                src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" 
                                alt="">
                        </a>
                    <?php endwhile; ?>
               </div>
            <?php endif; ?> 
        </div>
    </div>
<?php get_footer(); ?>