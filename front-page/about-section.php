<?php 
    $group = get_field('about_section');
?>
<div class="about-section h-[500px] lg:h-[720px]">
    <?php if (!empty($group['title'])) : ?>
        <h2><?php echo esc_html($group['title']) ?></h2>
    <?php endif; ?>
</div>
