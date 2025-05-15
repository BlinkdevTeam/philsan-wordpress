<?php
/* Template Name: About Page */

get_header();
?>

<div class="container mx-auto px-4 py-12 bg-white rounded-lg shadow-md">
  <h1 class="text-4xl font-bold mb-6 text-red-400"><?php the_title(); ?></h1>
  
  <div class="prose max-w-none text-gray-700">
    <?php
    while (have_posts()) : the_post();
      the_content();
    endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>
