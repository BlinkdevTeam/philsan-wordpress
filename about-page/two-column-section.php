<?php 
    $group = get_field('two-column-section');
    var_dump($group);
?>
<div class="two-col-section custom-container">
    <div class="flex space-between">
        <div class="w-[60%]">
            <div class="w-[100%] image-container">
                <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-2xl overflow-hidden">
                    <img class="w-full h-full object-cover" src="<?php echo esc_html($group['image']) ?>" alt="two col image">
                </div>
            </div>
        </div>
        <div class="w-[40%]">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['sub'])) : ?>
                    <p class="text-[34px] text-[500] leading-[normal]"><?php echo esc_html($group['sub']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
