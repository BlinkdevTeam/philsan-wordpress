<?php $form_shortcode = get_field('contact_form'); ?>

<?php get_header(); ?>
    <?php if($form_shortcode): ?>
        <?php echo do_shortcode($form_shortcode); ?>
    <?php endif; ?>
<?php get_footer(); ?>