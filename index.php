<?php get_header(); ?>

<div class="w-screen mx-auto px-4 pb-8">

    <?php
    // Custom Query for 'home' post type
    $homes_query = new WP_Query([
        'post_type' => 'home',
        'posts_per_page' => 10,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    ]);

    if ( $homes_query->have_posts() ) : ?>
        <div class="space-y-10">
            <?php while ( $homes_query->have_posts() ) : $homes_query->the_post(); ?>
                <article class="p-6 bg-red-600 shadow rounded-lg transition hover:shadow-lg">

                    <!-- Hero Section -->
                    <?php if ( get_field('hero-header') || get_field('hero-header-details') || get_field('her-background') ) : ?>
                        <div class="relative mb-4 rounded-lg overflow-hidden">
                            <?php
                            $hero_image = get_field('hero-background');
                            if ( $hero_image ) :
                            ?>
                                <img src="<?php echo esc_url($hero_image['url']); ?>"
                                    alt="<?php echo esc_attr($hero_image['alt']); ?>"
                                    class="w-full h-auto object-cover">
                            <?php endif; ?>

                            <!-- Absolute content over image -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 bg-black/40">
                                <?php if ( get_field('hero-header') ) : ?>
                                    <h3 class="text-3xl font-bold text-white drop-shadow">
                                        <?php the_field('hero-header'); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ( get_field('hero-header-details') ) : ?>
                                    <p class="mt-2 text-white text-lg drop-shadow">
                                        <?php the_field('hero-header-details'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="text-gray-700">
                        <?php the_excerpt(); ?>
                    </div>

                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8 text-center">
            <?php
            echo paginate_links([
                'total' => $homes_query->max_num_pages
            ]);
            ?>
        </div>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p class="text-center text-gray-500">No homes found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
