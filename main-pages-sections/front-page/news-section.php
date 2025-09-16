<?php
    $news = new WP_Query(array(
        "post_type" => "news",
        "posts_per_page" => 2,
        'order' => 'ASC',     
    ));
?>
<div class="bg-[#F3F3F3]">
    <div class="custom-container mx-auto news-section pt-[100px] pb-[50px]">
        <div>
            <div class="flex flex-col md:flex-row justify-between items-start">
                    <div>
                        <h2 class="text-[24px] md:text-[48px] text-[#1F773A] font-[700]">Our Latest News</h2>
                        <p class="text-[18px] md:text-[24px] font-[400] text-left md:text-center">Find stories through a selection of our key strategic topics</p>
                    </div>
                    <div class="flex pt-[30px]">
                        <?php echo theme_button("More Topics", "/"); ?>
                    </div>
            </div>

            <!-- desktop -->
            <div class="hidden md:flex gap-[50px] pt-[50px]">
                <?php if ($news->have_posts()) : ?>
                    <?php while ($news->have_posts()) : $news->the_post(); ?>
                        <?php
                            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $description  = get_field("description");
                            $date         = get_field("date");

                            // Reformat the date
                            if ($date) {
                                $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                            } else {
                                $formatted_date = '';
                            }
                        ?>

                        <div class="p-[40px] rounded-xl bg-[#FCFCF0]">
                            <div class="flex flex-col gap-[20px]">
                                <div class="flex justify-between items-center pb-[20px]">
                                    <div class="w-[60%]">
                                        <h2 class="text-[24px] font-[700] text-[#1f773a]"><?php the_title(); ?></h2>
                                    </div>
                                    <div class="flex">
                                        <?php echo theme_button("Learn More", "/"); ?>
                                    </div>
                                </div>
                                <div class="relative w-full h-[200px] md:h-[280px] lg:h-[350px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                    <div class="bg-[#000000] opacity-[0.4] w-full h-full absolute top-0 left-0 z-[1]"></div>
                                    <img class="w-full h-full object-cover" src="<?php echo esc_url($featured_image_url); ?>" alt="event image">
                                </div>
                                <div class="flex items-center gap-[10px] w-fit py-[10px] px-[20px] rounded-full bg-[#F3F3F3]">
                                    <div class="w-fit">
                                        <svg width="22" height="23" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.22222 1V3.2M3.77778 1V3.2M1 5.4H11M2.11111 2.1H9.88889C10.5025 2.1 11 2.59249 11 3.2V10.9C11 11.5075 10.5025 12 9.88889 12H2.11111C1.49746 12 1 11.5075 1 10.9V3.2C1 2.59249 1.49746 2.1 2.11111 2.1Z" stroke="#646464" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p class="text-[16px] font-[300] text-[#646464]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                                <div class="flex flex-col gap-[10px]">
                                    <p class="text-[24px] font-[300]"><?php echo esc_html($description); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

            <!-- mobile -->
            <div class="block md:hidden gap-[50px] pt-[50px]">
                <?php if ($news->have_posts()) : ?>
                    <div class="swiper mobile-swiper">
                        <div class="swiper-wrapper">
                            <?php while ($news->have_posts()) : $news->the_post(); ?>
                                <?php
                                    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    $description  = get_field("description");
                                    $date         = get_field("date");

                                    // Reformat the date
                                    if ($date) {
                                        $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                                    } else {
                                        $formatted_date = '';
                                    }
                                ?>
                                <div class="swiper-slide">
                                    <div class="py-[40px] px-[20px] rounded-xl bg-[#FCFCF0]">
                                        <div class="flex flex-col gap-[20px]">
                                            <div class="w-[100%]">
                                                <h2 class="text-[18px] md:text-[24px] font-[700] text-[#1f773a] text-left md:text-center"><?php the_title(); ?></h2>
                                            </div>
                                            <div class="relative w-full h-[200px] md:h-[280px] lg:h-[350px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                                <div class="bg-[#000000] opacity-[0.4] w-full h-full absolute top-0 left-0 z-[1]"></div>
                                                <img class="w-full h-[200px] object-cover" src="<?php echo esc_url($featured_image_url); ?>" alt="event image">
                                            </div>
                                            <div class="flex items-center gap-[10px] w-fit py-[10px] px-[20px] rounded-full bg-[#F3F3F3]">
                                                <div class="w-fit">
                                                    <svg width="20" height="21" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.22222 1V3.2M3.77778 1V3.2M1 5.4H11M2.11111 2.1H9.88889C10.5025 2.1 11 2.59249 11 3.2V10.9C11 11.5075 10.5025 12 9.88889 12H2.11111C1.49746 12 1 11.5075 1 10.9V3.2C1 2.59249 1.49746 2.1 2.11111 2.1Z" stroke="#646464" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <p class="text-[14px] md:text-[16px] font-[300] text-[#646464]"><?php echo esc_html($formatted_date); ?></p>
                                            </div>
                                            <div class="flex flex-col gap-[10px]">
                                                <p class="text-[16px] md:text-[24px] font-[300] text-left md:text-center"><?php echo esc_html($description); ?></p>
                                            </div>
                                            <div class="flex pt-[20px]">
                                                <?php echo theme_button("Learn More", "/"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
      </div>
    </div>
</div>


    
