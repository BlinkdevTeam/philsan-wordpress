<?php 
    $group = get_field('mission_section');
?>
<!-- desktop -->
<div class="hidden md:block bg-[#ffffff]">
    <div class="mission-section pt-[100px] pb-[50px]">
        <div class="flex custom-container mx-auto gap-[50px]">
            <div class="w-[40%]">
                <?php if (!empty($group['title'])) : ?>
                    <h2 class="text-[18px] text-[#1F773A] font-[800]"><?php echo esc_html($group['title']) ?></h2>
                <?php endif; ?>
                <div class="pt-[10px]">
                    <?php if (!empty($group['description'])) : ?>
                        <p class="text-[22px] font-[400]"><?php echo esc_html($group['description']) ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($group['button_title'])) : ?>
                    <div class="flex pt-[30px]">
                        <?php echo theme_button(esc_html($group['button_title']), "/"); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-[60%]">
                <div class="w-[100%] image-container">
                    <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-2xl overflow-hidden">
                        <img class="w-full h-full object-cover" src="<?php echo esc_html($group['image']) ?>" alt="<?php echo esc_attr($alt); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- mobile -->
<div class="block md:hidden bg-[#ffffff]">
    <div class="mission-section pt-[50px] pb-[50px]">
        <div class="flex custom-container mx-auto gap-[50px]">
            <div class="w-[100%]">
                <?php if (!empty($group['title'])) : ?>
                    <h2 class="text-[18px] text-[#1F773A] font-[800]"><?php echo esc_html($group['title']) ?></h2>
                <?php endif; ?>
                <div class="w-[100%] image-container">
                    <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-2xl overflow-hidden">
                        <img class="w-full h-full object-cover" src="<?php echo esc_html($group['image']) ?>" alt="<?php echo esc_attr($alt); ?>">
                    </div>
                </div>
                <div class="pt-[10px]">
                    <?php if (!empty($group['description'])) : ?>
                        <p class="text-[16px] md:text-[22px] font-[300]"><?php echo esc_html($group['description']) ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($group['button_title'])) : ?>
                    <div class="flex pt-[10px]">
                        <?php echo theme_button(esc_html($group['button_title']), "/"); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>