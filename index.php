<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-10 text-blue-700">My Custom Theme is Working!</h1>

    <?php if ( have_posts() ) : ?>
        <div class="space-y-10">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="bg-white p-6 shadow-md hover:shadow-lg transition-shadow mx-auto max-w-3xl text-center">
                    <h2 class="text-2xl font-semibold text-blue-600 mb-2"><?php the_title(); ?></h2>

                    <?php
                    $subtitle = get_field('subtitle');
                    if ($subtitle) : ?>
                        <h3 class="text-lg text-gray-600 mb-4 italic"><?php echo esc_html($subtitle); ?></h3>
                    <?php endif; ?>

                    <div class="prose max-w-none mx-auto">
                        <?php the_content(); ?>
                    </div>
                </article>

            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p class="text-center text-gray-500 mt-4">No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
