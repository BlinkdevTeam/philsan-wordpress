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

$slugs_to_hide = ['login', 'signup', 'verify-email']; // include CPT slugs too
$post_types_to_check = ['page', '38th-convention']; // 'convention' is your CPT name

$current_template = get_page_template_slug();
$hide_by_template = in_array($current_template, $templates_to_hide);

// Get slug and post type
$current_post = get_post();
$current_slug = get_post_field('post_name', $current_post);
$current_type = get_post_type($current_post);

// Match if post type is in list and slug is in hidden list
$hide_by_slug_and_type = in_array($current_type, $post_types_to_check) && in_array($current_slug, $slugs_to_hide);

// Final condition
$should_hide_nav_or_footer = $hide_by_template || $hide_by_slug_and_type;

if (!$should_hide_nav_or_footer) :
?>
  <footer class="bg-gray-200 mt-16 py-6 text-center text-gray-600">
    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
