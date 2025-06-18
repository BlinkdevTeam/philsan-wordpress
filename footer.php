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
  <footer class="bg-gray-200 mt-16 py-6 text-center text-gray-600">
    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
