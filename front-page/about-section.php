<?php 
    $group = get_field('about_section');
?>
<div class="about-section h-[500px] lg:h-[720px]">
    <div class="container mx-auto">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] font-[600]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <?php if (!empty($group['description'])) : ?>
                <p class="text-[48px] text-[#1F773A] font-[700] text-center"><?php echo esc_html($group['description']) ?></p>
            <?php endif; ?>
            <?php if (!empty($group['button_title'])) : ?>
                <a href="https://philsan.org/38th-annual-convention/registration/" class=""><?php echo esc_html($group['button_title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
