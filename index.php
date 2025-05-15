<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-100 text-gray-900'); ?>>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-10 text-blue-700">My Custom Theme is Working!</h1>

        <?php if ( have_posts() ) : ?>
            <div class="space-y-10">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        <h2 class="text-2xl font-semibold text-blue-600 mb-4"><?php the_title(); ?></h2>
                        <div class="prose max-w-none">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="text-center text-gray-500 mt-4">No posts found.</p>
        <?php endif; ?>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
