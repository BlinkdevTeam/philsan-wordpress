<div class="home-figures-section container">
    <div class="flex justify-between">
        <?php if ( have_rows('figures_section') ): ?>
            <?php while ( have_rows('figures_section') ): the_row(); ?>
                <div class="flex flex-col items-center justify-center">
                    <div class="flex gap-[10px]">
                        <h2 class="18px font-[600]"><?php the_sub_field("figures") ?></h2>
                        <h2 class="18px font-[600]"><?php the_sub_field("figures_Unit") ?></h2>
                    </div>
                    <div>
                        <p><?php the_sub_field("figures_description") ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>