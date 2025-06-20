<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-100 text-gray-900 min-h-screen flex flex-col'); ?>>

<?php

$parent_ids_to_hide = [214]; // Add parent page IDs whose children should also hide header/footer

$templates_to_hide = [
  'template-complete-registration.php',
  'template-email-verification.php',
  'template-invalid-email.php',
  'template-register-by-sponsor.php',
  'template-registration-successful.php',
  'template-session-expired.php',
  'template-visit-email.php'
];

$slugs_to_hide = [
  'login', 'signup', 'register', 'registration-successful',
  'invalid-email', 'session-expired', 'visit-email', 'complete-registration'
];

$post_types_to_check = ['page', '38th-convention']; // e.g., CPT slug

$current_post = get_post();
$current_template = get_page_template_slug();
$current_slug = get_post_field('post_name', $current_post);
$current_type = get_post_type($current_post);
$current_parent_id = $current_post->post_parent ?? 0;

$hide_by_template = in_array($current_template, $templates_to_hide);
$hide_by_slug_and_type = in_array($current_type, $post_types_to_check) && in_array($current_slug, $slugs_to_hide);
$hide_by_parent = in_array($current_parent_id, $parent_ids_to_hide);

$should_hide_nav_or_footer = $hide_by_template || $hide_by_slug_and_type || $hide_by_parent;
?>

<?php
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


