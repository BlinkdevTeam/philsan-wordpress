<div class="organization-section custom-container py-[50px]">
    <?php if ( have_rows('organization_repeater') ): ?>
        <?php while ( have_rows('organization_repeater') ): the_row(); ?>
            
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-[48px] text-[#1F773A] font-[700] text-center">
                    <?php the_sub_field("title") ?>
                </h2>
                <p class="text-[24px] text-center font-[600]">
                    <?php the_sub_field("sub") ?>
                </p>
            </div>

            <?php if ( have_rows('member') ): ?> 
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[20px] mt-8">
                    <?php 
                        // define your pool of background colors
                        $colors = [
                            "#E0F7FA", // light cyan
                            "#FFF3E0", // light orange
                            "#F3E5F5", // light purple
                            "#E8F5E9", // light green
                            "#FFEBEE", // light red/pink
                            "#E3F2FD"  // light blue
                        ];
                    ?>
                    <?php while ( have_rows('member') ): the_row(); ?>
                        <?php 
                            $image_url = get_sub_field('image');
                            $name = get_sub_field('name');
                            $job_title = get_sub_field('job_title');
                            
                            // pick a random color from the list
                            $bg_color = $colors[array_rand($colors)];
                        ?>
                        <div class="flex gap-[20px] items-start justify-start">
                            <!-- Perfect circle image with random background -->
                            <div class="aspect-square w-[150px] rounded-full overflow-hidden pt-[15px]" style="background-color: <?php echo $bg_color; ?>;">
                                <img class="w-full h-auto object-cover" 
                                    src="<?php echo esc_url($image_url); ?>" 
                                    alt="member image">
                            </div>
                            <div class="flex flex-col">
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
