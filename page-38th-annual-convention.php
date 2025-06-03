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
  <style>
    body {
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/Website Background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      /* background-attachment: fixed; */
    }
  </style>
</head>
<body>
    <div class="w-full max-w-screen overflow-x-hidden min-h-screen flex flex-col justify-center items-center gap-20 -mt-8 pb-8">
        <?php get_template_part('current-event-page/hero-section'); ?>
        <div class="max-w-[1350px] flex flex-col justify-center items-center gap-20">
          <?php get_template_part('current-event-page/about-section'); ?>
          <?php get_template_part('current-event-page/speaker-section'); ?>
          <?php get_template_part('current-event-page/sponsors-section'); ?>
          <?php get_template_part('current-event-page/schedule-section'); ?>
        </div>
    </div>
</body>
<footer>
  <div class="py-12 flex flex-col justify-center items-center">
    <h3 class="text-[#535353]">PHILSAN © 2023. All rights reserved.</h3>
    <a>Powered by <span class="font-bold">BLINK</span> CREATIVE STUDIO</a>
  </div>
</footer>
</html>
