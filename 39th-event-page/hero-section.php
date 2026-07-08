<div class="w-full">
    <?php $bg_url = wp_get_attachment_url(1183); ?>
    <div>
        <?php if ($bg_url) : ?>
            <img src="<?php echo esc_url($bg_url); ?>" alt="" class="w-full h-auto object-cover rounded-lg">
        <?php endif; ?>
    </div>
    <div class="flex flex-col justify-center items-start text-start px-8 gap-6">
    </div>
</div>