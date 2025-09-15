<div class="speaker-section custom-container pt-[80px] pb-[50px]">
    <?php if ( have_rows('repeater_repeater') ): ?>
        <?php while ( have_rows('repeater_repeater') ): the_row(); ?>
            
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-[42px] text-[#1F773A] font-[700] text-center">Speakers</h2>
                <p class="text-[24px] text-center font-[600]">At PHILSAN, you will find inspiring speakers, exciting activities, and unique experiences that are sure to leave a lasting impression. We invite you to join us in our mission of connecting people and fostering meaningful conversations.</p>
            </div>

            <?php if ( have_rows('member') ): ?> 
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[50px] mt-8">
                    <?php 
                        // define your pool of background colors
                        $colors = [
                            "#ebf5f7ff", // light cyan
                            "#ecdfcaff", // light orange
                            "#ecf6edff", // light green
                            "#f6e9ecff", // light red/pink
                        ];
                    ?>
                    <?php while ( have_rows('member') ): the_row(); ?>
                        <?php 
                            $image_url = get_sub_field('image');
                            $name = get_sub_field('name');
                            $position = get_sub_field('position');
                            
                            // pick a random color from the list
                            $bg_color = $colors[array_rand($colors)];
                        ?>
                        <div class="flex gap-[20px] items-start justify-start">
                            <!-- Perfect circle image with random background -->
                            <div class="aspect-square w-[150px] rounded-full overflow-hidden pt-[15px]">
                                <img class="w-full h-auto object-cover" 
                                    src="<?php echo esc_url($image_url); ?>" 
                                    alt="member image">
                            </div>
                            <div class="flex flex-col pt-[20px]">
                                <p class="text-[24px] font-[600]"><?php echo esc_html($name); ?></p>
                                <p class="text-[18px] text-gray-600"><?php echo esc_html($job_title); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?> 
                </div>
            <?php endif; ?>


        <?php endwhile; ?>
    <?php endif; ?>
</div>
