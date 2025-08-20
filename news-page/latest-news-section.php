<div class="flex flex-col gap-[50px] pt-[50px]">
    <?php if ($featured->have_posts()) : ?>
        <div class="flex">
            <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <?php
                    $image       = get_field("image");
                    $description = get_field("description");
                    $date        = get_field("date");
                    $categories = get_the_terms( get_the_ID(), 'category-filters' );

                    // Reformat the date
                    if ($date) {
                        $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                    } else {
                        $formatted_date = '';
                    }
                ?>
                <!-- FEATURED NEWS -->
                <div class="flex gap-[20px] p-[40px] rounded-xl bg-[#FCFCF0]">
                    <div class="w-[40%]">
                        <img class="w-full h-auto object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                    </div>
                    <div class="w-[60%]">
                        <div class="flex justify-between items-center">
                            <?php include locate_template('news-page/category-element.php'); ?>

                            <div class="px-[20px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                <p class="text-[18px]"><?php echo esc_html($formatted_date); ?></p>
                            </div>
                        </div>
                        <h2 class="text-[34px] font-[600] text-[#1f773a]"><?php the_title(); ?> </h2>
                        <p class="text-[24px] font-[400] leading-normal mt-[20px]"><?php echo esc_html($description); ?></p>
                        <a href="https://philsan.org/38th-annual-convention/registration/" class="flex w-fit mt-[20px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-[40px] rounded-br-[40px]">
                            <span class="text-[#ffffff] text-bold text-[18px]">View More</span>
                        </a>
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
                    $date        = get_field("date");

                    // Reformat the date
                    if ($date) {
                        $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                    } else {
                        $formatted_date = '';
                    }
                ?>
                <!-- NON-FEATURED NEWS -->
                <div class="">
                    <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                    <div class="pt-[20px]">
                        <div class="px-[20px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                            <p class="text-[18px]"><?php echo esc_html($formatted_date); ?></p>
                        </div>
                        <h2 class="text-[24px] leading-[normal] font-[400] text-[#000000]"><?php the_title(); ?></h2>
                    </div>
                    <a href="https://philsan.org/38th-annual-convention/registration/" class="flex w-fit mt-[20px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-[40px] rounded-br-[40px]">
                        <span class="text-[#ffffff] text-bold text-[18px]">View More</span>
                    </a>
                    <!-- <p class="text-[18px] leading-normal mt-4"><?php //echo esc_html($description); ?></p> -->
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
</div>
