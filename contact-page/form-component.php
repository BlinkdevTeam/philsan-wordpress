<?php $form_shortcode = get_field('contact_form'); ?>

<div>
    <?php if($form_shortcode): ?>
        <?php echo do_shortcode($form_shortcode); ?>
    <?php endif; ?>
</div>