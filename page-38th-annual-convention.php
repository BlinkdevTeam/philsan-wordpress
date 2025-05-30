<?php
/* Template Name: 38th Annual Convention */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body >
    <div class="w-full max-w-screen overflow-x-hidden min-h-screen flex flex-col gap-20 -mt-8">
        <?php get_template_part('current-event-page/hero-section'); ?>
        <?php get_template_part('current-event-page/about-section'); ?>
        <?php get_template_part('current-event-page/speaker-section'); ?>
        <?php get_template_part('current-event-page/sponsors-section'); ?>
    </div>
</body>
</html>
