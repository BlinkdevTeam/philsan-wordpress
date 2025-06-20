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
// $hide_by_parent = in_array($current_parent_id, $parent_ids_to_hide);
$hide_by_child_of_parent = $current_parent_id && in_array($current_parent_id, $parent_ids_to_hide); // ✅ only hide child

$should_hide_nav_or_footer = $hide_by_template || $hide_by_slug_and_type || $hide_by_child_of_parent;

if (!$should_hide_nav_or_footer) :
?>
  <footer class="bg-gray-200 mt-16 py-6 text-center text-gray-600">
    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
