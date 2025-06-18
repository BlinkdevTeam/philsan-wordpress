<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-100 text-gray-900 min-h-screen flex flex-col'); ?>>


<?php
$templates_to_hide = [
  'template-complete-registration.php',
  'template-email-verification.php',
  'template-invalid-email.php',
  'template-register-by-sponsor.php',
  'template-registration-successful.php',
  'template-session-expired.php',
  'template-visit-email.php'
];

// Optional: Slugs where nav/footer should also be hidden (only for pages)
$slugs_to_hide = ['login', 'signup'];

// Get current template slug
$current_template = get_page_template_slug();

// Check if current template is in the list
$hide_by_template = in_array($current_template, $templates_to_hide);

// Check if it's a page and its slug matches
$hide_by_slug = is_page() && in_array(get_post_field('post_name', get_post()), $slugs_to_hide);

// FINAL condition
$should_hide_nav_or_footer = $hide_by_template || $hide_by_slug;


if (!$should_hide_nav_or_footer) :
?>
  <header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-4 py-4">

      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto">
        </a>
      </div>

      <!-- Navigation Menu -->
      <nav>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class' => 'flex space-x-6 text-black font-medium',
          'container' => false,
          'fallback_cb' => false,
        ));
        ?>
      </nav>

    </div>
  </header>
<?php endif; ?>


