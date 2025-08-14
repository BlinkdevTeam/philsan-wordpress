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
  '38th-annual-convention'
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
  <footer class="bg-[#101010]">
    <div class="custom-container">
      <div class="flex gap-[50px] justify-between">
          <div class="logo-container w-[350px]">
              <img class="w-full h-full" src="https://philsan.org/wp-content/uploads/2025/08/cropped-PHILSAN-LOGO.png" alt="Philsan Logo White">
          </div>
          <div class="flex gap-[20px] justify-between text-[#ffffff]">
            <div class="flex flex-col gap-[10px]">
              <h6>Education</h6>
              <ul class="flex flex-col gap-[5px]">
                <li>Email Marketing</li>
                <li>Social Media Markeitng</li>
                <li>Search Engine Optimization</li>
              </ul>
            </div>
            <div class="flex flex-col gap-[10px]">
              <h6>Business</h6>
              <ul class="flex flex-col gap-[5px]">
                <li>Digital Marketing Agency</li>
                <li>SEO Agency</li>
                <li>PRC Agency</li>
              </ul>
            </div>
            <div class="flex flex-col gap-[10px]">
              <h6>Developer & IT</h6>
              <ul class="flex flex-col gap-[5px]">
                <li>Internet Marketing</li>
                <li>Content Markeitng</li>
                <li>Social Media</li>
              </ul>
            </div>
          </div>
      </div>
    </div>
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
