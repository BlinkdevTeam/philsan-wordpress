<?php 
    $group = get_field('about_section');
?>
<div class="about-section h-[500px] lg:h-[720px] py-[20px]">
    <div class="flex container mx-auto">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] font-[600]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <?php if (!empty($group['description'])) : ?>
                <p class="text-[48px] text-[#1F773A] font-[700] leading-[normal]"><?php echo esc_html($group['description']) ?></p>
            <?php endif; ?>
            <?php if (!empty($group['button_title'])) : ?>
                <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold bg-[#FFC200] p-[20px] rounded-tl-[80px] rounded-br-[80px]"><?php echo esc_html($group['button_title']) ?></a>
            <?php endif; ?>
        </div>
        <div>
            
        </div>
    </div>
</div>
