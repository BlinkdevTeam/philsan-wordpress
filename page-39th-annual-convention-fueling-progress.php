<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="w-full max-w-screen overflow-x-hidden min-h-screen flex flex-col items-center">
        <?php get_template_part('39th-event-page/hero-section'); ?>
    </div>
    <?php wp_footer(); ?>
</body>
</html>