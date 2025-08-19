<div class="py-[50px]">
    <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
        <h2 class="leading-[normal] text-[34px] xl:text-[72px] font-[700] pb-[20px] text-[#1F773A]">All News</h2>
    </div>
    <div class="flex flex-col gap-[50px] pt-[50px]">
        <?php if ($all_news->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($all_news->have_posts()) : $all_news->the_post(); ?>
                    <?php
                        $image       = get_field("image");
                        $description = get_field("description");
                    ?>
                    <div class="p-[40px] bg-white rounded-lg shadow">
                        <img class="w-full h-[200px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                        <h2 class="text-[24px] font-[600] text-[#1f773a] mb-2"><?php the_title(); ?></h2>
                        <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

