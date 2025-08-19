<div class="flex flex-col gap-[50px] pt-[50px]">
    <?php if ($featured->have_posts()) : ?>
        <div class="flex">
            <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <?php
                    $image       = get_field("image");
                    $description = get_field("description");
                ?>
                <!-- FEATURED NEWS -->
                <div class="flex gap-[20px] p-[40px] rounded-xl bg-[#FCFCF0]">
                    <div>
                        <img class="w-full h-[200px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                    </div>
                    <div>
                        <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?> </h2>
                        <p class="text-[34px] font-[600] leading-normal mt-4"><?php echo esc_html($description); ?></p>
                    </div>

                    <div class="pt-[40px]">
                        <?php if (!empty($group['button_title'])) : ?>
                            <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold text-[18px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl">View More</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>

    <?php if ($non_featured->have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ($non_featured->have_posts()) : $non_featured->the_post(); ?>
                <?php
                    $image       = get_field("image");
                    $description = get_field("description");
                ?>
                <!-- NON-FEATURED NEWS -->
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
