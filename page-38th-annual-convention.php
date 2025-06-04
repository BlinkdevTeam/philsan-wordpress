<?php
/* Template Name: 38th Annual Convention */
$home_page = get_page_by_title('38th Annual Convention');
if ($home_page) :
    $page_id = $home_page->ID;
    $footer = get_field('footer', $page_id);

    if ($footer) :
        $logo = $footer['logo'];
        $details = $footer['details'];
        $header = $footer['header'];
        $phrase = $footer['phrase'];
        $phone_number = $footer['phone_number'];
        $email = $footer['email'];
        $social_media = $footer['social_media'];
        $contact_information = $footer['contact_information'];
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
<footer class="w-full flex flex-col justify-center mt-[100px]">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="flex flex-col justify-center items-start px-4 md:px-20 gap-8">
      <div class="max-w-[400px] h-auto">
        <?php if ( $logo ) : ?>
          <img src="<?php echo esc_url($logo['url']); ?>" alt="" class="w-full h-auto object-cover">
          <?php endif; ?>
      </div>
      <?php if ( $details ) : ?>
        <div class="text-md text-[#535353]">
          <?php echo wpautop(wp_kses_post($details)); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="flex flex-col justify-center items-start bg-gradient-to-r from-[#176524] via-[#269739] to-[#91DF47] text-white p-4 rounded-bl-[120px] py-16 pl-8 gap-2">
      <?php if ( $header ) : ?>
        <h1 class="text-4xl font-bold">
          <?php echo wpautop(wp_kses_post($header)); ?>
        </h1>
      <?php endif; ?>
      <?php if ( $phrase ) : ?>
        <p class="text-md">
          <?php echo wpautop(wp_kses_post($phrase)); ?>
        </p>
      <?php endif; ?>
      <?php 
      $contact_information = $footer['contact_information'];
      if ( $contact_information ) : ?>
        <div class="flex flex-col gap-6 justify-center py-4">
          <?php foreach ( $contact_information as $row ) :
            $img = $row['icon'];
            $contact_details = $row['contact_details']; // Text field
            $link = $row['link']; // Optional URL field
          ?>
            <div class="flex items-center gap-4">
              <?php if ( $img ) : ?>
                <img src="<?php echo esc_url($img['link']); ?>" alt=""
                    class="w-[30px] h-auto object-cover">
              <?php endif; ?>
              
              <?php if ( $contact_details ) : ?>
                <?php if ( $link ) : ?>
                  <a href="<?php echo esc_url($link); ?>" 
                    class="text-sm hover:text-white transition" 
                    target="_blank" rel="noopener noreferrer">
                    <?php echo esc_html($contact_details); ?>
                  </a>
                <?php else : ?>
                  <p class="text-sm"><?php echo esc_html($contact_details); ?></p>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="py-12 flex flex-col justify-center items-center text-[#535353]">
    <h3 class="">PHILSAN © 2023. All rights reserved.</h3>
    <a href="https://blinkcreativestudio.com" target="_blank" rel="noopener noreferrer">
      Powered by <span class="font-bold">BLINK</span> CREATIVE STUDIO.
    </a>
  </div>
</footer>
</html>
<?php
    endif;
endif;
?>