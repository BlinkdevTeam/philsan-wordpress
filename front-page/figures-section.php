<div class="home-figures-section">
    <div class="flex justify-between container mx-auto py-[50px]">
        <?php if ( have_rows('figures_section') ): ?>
            <?php while ( have_rows('figures_section') ): the_row(); ?>
                <div class="flex flex-col items-center justify-center">
                    <div class="flex gap-[10px]">
                        <h2 class="text-[24px] text-[#1F773A] font-[700] text-center"><?php the_sub_field("figures") ?></h2>
                        <h2 class="text-[18px] font-[600] text-center"><?php the_sub_field("figures_unit") ?></h2>
                    </div>
                    <div>
                        <p><?php the_sub_field("figures_description") ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>