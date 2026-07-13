<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="w-full max-w-screen overflow-x-hidden flex flex-col items-center">
        <?php get_template_part('39th-event-page/hero-section'); ?>
    </div>
    <?php get_template_part('39th-event-page/about-section'); ?>
    <?php get_template_part('39th-event-page/speakers-section'); ?>
    <?php wp_footer(); ?>
</body>
</html>