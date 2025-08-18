<?php 
    $group = get_field('misson-section');
?>
<div class="mission-section custom-container">
    <div class="flex space-between">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['sub'])) : ?>
                    <div class="text-[34px] text-[500] leading-[normal]"><?php echo esc_html($group['sub']) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
