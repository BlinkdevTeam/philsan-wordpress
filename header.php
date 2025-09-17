<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ✅ Open Graph Meta Tags -->
  <meta property="og:title" content="PHILSAN 38th Annual Convention" />
  <meta property="og:description" content="Register now for the PHILSAN 38th Annual Convention! Join us in Innovating for a Sustainable Future." />
  <meta property="og:image" content="https://philsan.org/wp-content/uploads/2024/06/philsan-logo.png" />
  <meta property="og:url" content="<?php echo get_permalink(); ?>" />
  <meta property="og:type" content="website" />

  <!-- ✅ Your Swiper CSS (keep this if you need it) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>


<body <?php body_class('bg-gray-100 text-gray-900 min-h-screen flex flex-col'); ?>>

<?php

$parent_ids_to_hide = [214]; // Parent pages whose children AND themselves should hide header/footer

$templates_to_hide = [
  'template-complete-registration.php',
  'template-email-verification.php',
  'template-invalid-email.php',
  'template-register-by-sponsor.php',
  'template-registration-successful.php',
  'template-session-expired.php',
  'template-visit-email.php',
  'template-38th-convention'
];

$slugs_to_hide = [
  'login', 'signup', 'registration', 'registration-successful',
  'invalid-email', 'session-expired', 'visit-email', 'complete-registration', '38th-convention-test-page',
  '38th-annual-convention',
];

$post_types_to_check = ['page', '38th-convention'];

$current_post = get_post();
$current_id = $current_post->ID ?? 0;
$current_template = get_page_template_slug();
$current_slug = get_post_field('post_name', $current_post);
$current_type = get_post_type($current_post);
$current_parent_id = $current_post->post_parent ?? 0;

// ✅ Matches if current page is a parent in the list OR a child of that parent
$hide_by_parent_or_child = in_array($current_id, $parent_ids_to_hide) || in_array($current_parent_id, $parent_ids_to_hide);

// ✅ Template match
$hide_by_template = in_array($current_template, $templates_to_hide);

// ✅ Slug + type match
$hide_by_slug_and_type = in_array($current_type, $post_types_to_check) && in_array($current_slug, $slugs_to_hide);

// ✅ Final condition
$should_hide_nav_or_footer = $hide_by_template || $hide_by_slug_and_type || $hide_by_parent_or_child;
?>

<?php
if (!$should_hide_nav_or_footer) :
?>
  <header id="header" class="bg-white shadow-md top-0 z-[999] fixed w-[100%] transition-all duration-200 ease">
    <div class="custom-container mx-auto flex items-center justify-between px-4 py-4">

      <!-- Logo -->
      <div class="flex-shrink-0">
        <div class="cursor-pointer flex justify-center w-[180px]">
          <?php the_custom_logo(); ?>
        </div>
      </div>

      <!-- Navigation Menu -->
      <div class="nav-menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class' => 'flex space-x-6 text-black text-[16px] md:text-[18px] ',
          'container' => false,
          'fallback_cb' => false,
        ));
        ?>
      </div>
      
      <div class="cursor-pointer md:hidden">
        <svg width="29" height="18" viewBox="0 0 29 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.5625C0 0.975697 0.540989 0.5 1.20833 0.5H27.7917C28.459 0.5 29 0.975697 29 1.5625C29 2.1493 28.459 2.625 27.7917 2.625H1.20833C0.540989 2.625 0 2.1493 0 1.5625ZM0 9C0 8.4132 0.540989 7.9375 1.20833 7.9375H27.7917C28.459 7.9375 29 8.4132 29 9C29 9.5868 28.459 10.0625 27.7917 10.0625H1.20833C0.540989 10.0625 0 9.5868 0 9ZM13.2917 16.4375C13.2917 15.8507 13.8327 15.375 14.5 15.375H27.7917C28.459 15.375 29 15.8507 29 16.4375C29 17.0243 28.459 17.5 27.7917 17.5H14.5C13.8327 17.5 13.2917 17.0243 13.2917 16.4375Z" fill="#096936"/>
        </svg>
      </div>
    </div>
  </header>

  <header id="mobile-nav" class="bg-white shadow-md top-0 z-[999] fixed w-[100%] mobile-nav-menu hide-mobile-nav transition-all duration-200 ease">
    <!-- Mobile Menu -->
      <div class="top-[0px] w-[100%] bg-[#ffffff]">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class' => 'flex flex-col space-x-6 text-black text-[16px] md:text-[18px] ',
          'container' => false,
          'fallback_cb' => false,
        ));
        ?>
      </div>
  </header>
<?php endif; ?>


