<?php 
    $group = get_field('mission_section');
?>
<div class="mission-section custom-container py-[50px]">
    <div class="gsap-container flex space-between">
        <div class="gsap-fade-up">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[32px] md:text-[42px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['sub'])) : ?>
                    <div class="text-[16px] md:text-[18px] flex flex-col gap-[20px] font-[300]"><?php echo ($group['sub']) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


