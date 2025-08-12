<div class="home-figures-section">
    <div class="flex justify-between">
        <?php if ( have_rows('figures_section') ): ?>
            <?php while ( have_rows('figures_section') ): the_row(); ?>
                <div class="">
                    <h2><?php the_sub_field("figures") ?></h2>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>