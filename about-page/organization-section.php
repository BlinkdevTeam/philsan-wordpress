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
                <?php while ( have_rows('member') ): the_row(); ?>
                    <?php 
                        $image_url = get_sub_field('image');
                        $name = get_sub_field('name');
                        $job_title = get_sub_field('job_title');
                    ?>
                    <div class="image-container">
                        <div class="w-[350px] h-[200px] md:h-[320px] lg:h-[450px] rounded-tl-2xl rounded-br-2xl overflow-hidden">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($image_url); ?>" alt="member image">
                        </div>
                        <p class="text-[20px] font-[600] mt-2"><?php echo esc_html($name); ?></p>
                        <p class="text-[16px] text-gray-600"><?php echo esc_html($job_title); ?></p>
                    </div>
                <?php endwhile; ?> 
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</div>
