<div class="text-icon-section custom-container py-[50px]">
    <?php if ( have_rows('organizaiton_repeater') ): ?>
        <?php while ( have_rows('organizaiton_repeater') ): the_row(); ?>
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-[48px] text-[#1F773A] font-[700] text-center"><?php the_sub_field("figures") ?><?php the_sub_field("figures_unit") ?></h2>
                <p class="text-[24px] text-center font-[600]"><?php the_sub_field("figures_description") ?></p>
            </div>

            
        <?php endif; ?>
    <?php endwhile; ?>
</div>
