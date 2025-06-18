<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-100 text-gray-900 min-h-screen flex flex-col'); ?>>


<?php
// List of page templates where you want to HIDE the nav/header
$templates_to_hide_nav = [
  'template-complete-registration.php',
  'template-email-verification.php',
  'template-invalid-email.php',
  'template-register-by-sponsor.php',
  'template-registration-successful.php',
  'template-session-expired.php',
  'template-visit-email.php'
];

$hide_nav = false;
foreach ($templates_to_hide_nav as $template) {
  if (is_page_template($template)) {
    $hide_nav = true;
    break;
  }
}

if (!$hide_nav) :
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


