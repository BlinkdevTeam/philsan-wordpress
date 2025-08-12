<div class="home-hero-section">
    <?php if ( have_rows('hero_blocks') ): ?>
        <?php while ( have_rows('hero_blocks') ): the_row(); ?>

            <?php if ( get_row_layout() == 'hero_item_group' ): ?>
                <div class="hero">
                    <h1><?php the_sub_field('hero_title'); ?></h1>
                    <p><?php the_sub_field('hero_sub'); ?></p>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</div>
