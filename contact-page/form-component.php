<?php $form_shortcode = get_field('contact_form'); ?>

<div class="w-[500px] mx-auto">
    <div class="p-[50px] rounded-2xl bg-[#FCFCF0]">
        <?php if($form_shortcode): ?>
            <?php echo do_shortcode($form_shortcode); ?>
        <?php endif; ?>
    </div>
</div>