<?php 

    $sponsors = new WP_Query(array(
        "post_type"      => "sponsor",
        "posts_per_page" => -1,
    ));
?>
<div class="custom-container">
    <div class="pt-[20px] md:pt-[50px]">
        <?php if ( $sponsors->have_posts() ) : ?> 
            <div class="pb-[20px]">
                <h2 class="text-[24px] md:text-[42px] text-[#1F773A] font-[700] text-center">Our Sponsors</h2>
            </div>
            <div class="swiper sponsorSwiper w-[100%]">
                <div class="swiper-wrapper items-center">
                    <?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
                        <?php 
                            // Get featured image (you can also use a custom field if you have one)
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
                            $name = get_the_title();
                            $description = get_the_excerpt(); // or get_field('description') if using ACF
                        ?>
                        <div class="swiper-slide justify-center">
                            <div class="flex flex-col items-center">
                                <?php if ( $image_url ) : ?>
                                    <img class="w-full h-auto object-cover" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($name); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php else : ?>
            <p class="text-center">No sponsors found.</p>
        <?php endif; ?>
    </div>
</div>

