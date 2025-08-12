<div class="home-figures-section">
    <div class="flex justify-between gap-[20px] w-[720px] lg:w-[1080px] mx-auto py-[50px]">
        <?php if ( have_rows('figures_section') ): ?>
            <?php while ( have_rows('figures_section') ): the_row(); ?>
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-[48px] text-[#1F773A] font-[700] text-center"><?php the_sub_field("figures") ?><?php the_sub_field("figures_unit") ?></h2>
                    <p class="text-[24px] font-[600]"><?php the_sub_field("figures_description") ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>