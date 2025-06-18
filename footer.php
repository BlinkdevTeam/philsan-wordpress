<?php
// Templates where you want to hide the footer
$templates_to_hide_footer = [
  'template-complete-registration.php',
  'template-email-verification.php',
  'template-invalid-email.php',
  'template-register-by-sponsor.php',
  'template-registration-successful.php',
  'template-session-expired.php',
  'template-visit-email.php'
];

// Page slugs where you want to hide the footer
$page_slugs_to_hide_footer = [
  'login',
  'signup'
];

// Check if current page matches any of the templates
$hide_footer_by_template = false;
foreach ($templates_to_hide_footer as $template) {
  if (is_page_template($template)) {
    $hide_footer_by_template = true;
    break;
  }
}

// Check if current page slug matches
$hide_footer_by_slug = in_array(get_post_field('post_name', get_post()), $page_slugs_to_hide_footer);

if (!$hide_footer_by_template && !$hide_footer_by_slug) :
?>
  <footer class="bg-gray-200 mt-16 py-6 text-center text-gray-600">
    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
