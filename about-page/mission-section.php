<?php 
    $group = get_field('mission_section');
?>
<div class="mission-section custom-container py-[50px]">
    <div class="flex space-between">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[32px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['sub'])) : ?>
                    <div class="text-[24px] leading-[34px] flex flex-col gap-[20px]"><?php echo ($group['sub']) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
