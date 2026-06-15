<?php 
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
    $description = get_the_content();
    $description = wp_strip_all_tags($description);    
    $date        = get_field("date");
    $categories = get_the_terms( get_the_ID(), 'category-filters' );
    $button_link = get_field("button_link");
    $permalink = get_permalink();
    $location =  get_field("location");

    $desc_limit = 200;
    $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly

    // Reformat the date
    if ($date) {
        $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
    } else {
        $formatted_date = '';
    }

    // CTA falls back to the post's own permalink if no button link is set
    $cta_link = $button_link ? $button_link : $permalink;
?>

<div class="single-event-hero-section bg-white py-[60px] md:py-[100px]">
    <div class="custom-container mx-auto">
        <div class="flex flex-col md:flex-row items-start justify-between gap-[40px] md:gap-[50px]">

            <!-- Text column -->
            <div class="w-full <?php echo $featured_image_url ? 'md:w-[50%]' : ''; ?> flex flex-col h-full">

                <?php if ($location) : ?>
                    <p class="flex items-center gap-[6px] text-[14px] md:text-[16px] text-[#5f5e5a] font-[300] mb-[10px]">
                        <i class="ti ti-map-pin text-[16px]"></i>
                        <?php echo esc_html($location); ?>
                    </p>
                <?php endif; ?>

                <h1 class="text-[28px] md:text-[clamp(28px,4.5vw,48px)] font-[700] leading-[1.25] text-[#1F5C35] mb-[15px] max-w-[95%] md:max-w-[90%]">
                    <?php the_title(); ?>
                </h1>

                <?php if ($desc_trimmed) : ?>
                    <p class="text-[15px] md:text-[18px] text-[#5f5e5a] font-[400] leading-[1.6] max-w-[40ch] line-clamp-3 mb-[10px]">
                        <?php echo esc_html($desc_trimmed); ?>
                    </p>

                    <?php if (mb_strlen($description) > $desc_limit) : ?>
                        <a href="<?php echo esc_url($permalink); ?>" class="inline-flex items-center gap-[4px] text-[13px] md:text-[14px] font-[500] text-[#1F5C35] mb-[20px]">
                            Read more
                            <i class="ti ti-chevron-down text-[14px]"></i>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="mt-auto flex items-center gap-[12px] flex-wrap pt-[10px]">

                    <?php if ($formatted_date) : ?>
                        <div class="rounded-full py-[8px] px-[18px] bg-[#FAEEDA] flex items-center gap-[6px]">
                            <i class="ti ti-calendar-event text-[14px] text-[#854F0B]"></i>
                            <p class="text-[13px] md:text-[14px] text-[#854F0B] font-[500] m-0"><?php echo esc_html($formatted_date); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($cta_link) : ?>
                        <a href="<?php echo esc_url($cta_link); ?>" class="inline-flex items-center gap-[6px] bg-[#1F5C35] text-white px-[18px] py-[10px] rounded-md text-[13px] md:text-[14px] font-[500] hover:bg-[#17452A] transition-colors">
                            View details
                            <i class="ti ti-arrow-right text-[14px]"></i>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Image column -->
            <?php if ($featured_image_url) : ?>
                <div class="w-full md:w-[50%]">
                    <div class="rounded-tl-2xl rounded-br-2xl overflow-hidden border border-[#e5e3da] h-[280px] md:h-[420px]">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($featured_image_url); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>