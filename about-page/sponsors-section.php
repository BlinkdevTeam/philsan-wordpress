<?php 
    $group = get_field('sponsor_section');
?>
<div class="sponsors-section custom-container py-[50px]">
    <?php if (!empty($group['title'])) : ?>
        <h2 class="text-[32px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
    <?php endif; ?>
    <div class="pt-[10px]">
        <?php if (!empty($group['sub'])) : ?>
            <div class="text-[24px] leading-[34px] flex flex-col gap-[20px]"><?php echo ($group['sub']) ?></div>
        <?php endif; ?>
    </div>
    
    <?php if ( have_rows('sponsor_speaker') ): ?> 
        <div class="flex gap-[20px]">
            <?php while ( have_rows('sponsor_speaker') ): the_row(); ?>
                <?php 
                    $image_url = get_sub_field('image');
                    $name = get_sub_field('name');
                    $descipriotn = get_sub_field('description');
                ?>
                <div class="flex gap-[20px] items-start justify-start">
                    <!-- Perfect circle image with random background -->
                    <div class="w-[200px]">
                        <img class="w-full h-auto object-cover" 
                            src="<?php echo esc_url($image_url); ?>" 
                            alt="member image">
                    </div>
                    <div class="flex flex-col pt-[20px]">
                        <p class="text-[24px] font-[600]"><?php echo esc_html($name); ?></p>
                        <p class="text-[18px] text-gray-600"><?php echo esc_html($descipriotn); ?></p>
                    </div>
                </div>
            <?php endwhile; ?> 
        </div>
    <?php endif; ?>

</div>
