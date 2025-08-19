<div class="pt-[50px] pb-[100px]">
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
        <h2 class="leading-[normal] text-[34px] xl:text-[72px] font-[700] pb-[20px] text-[#1F773A]">All News</h2>
    </div>
    <div class="flex flex-col gap-[50px] pt-[50px]">
        <?php if ($all_news->have_posts()) : ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php while ($all_news->have_posts()) : $all_news->the_post(); ?>
                    <?php
                        $image       = get_field("image");
                        $description = get_field("description");
                    ?>
                    <div class="">
                        <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                        <div class="pt-[20px]">
                            <h2 class="text-[24px] leading-[normal] font-[400] text-[#000000]"><?php the_title(); ?></h2>
                        </div>
                        <a href="https://philsan.org/38th-annual-convention/registration/" class="flex w-fit mt-[20px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl">
                            <span class="text-[#ffffff] text-bold text-[18px]">View More</span>
                        </a>
                        <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

