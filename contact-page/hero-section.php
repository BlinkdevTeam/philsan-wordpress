<div class="contacts-hero-section h-[580px]">
    <?php if ( have_rows('hero_section') ): ?>
        <?php while ( have_rows('hero_section') ): the_row(); ?>
            <div class="flex space-between h-full w-full relative y-thumbnail">
                <div class="custom-container py-[100px] mx-auto z-[2]">
                    <div class="w-[60%] flex flex-col justify-center h-[100%]">
                        <h1 class="text-[48px] font-[700] pb-[20px] text-[#ffc200]"><?php the_sub_field('hero_title'); ?></h1>
                        <p class="text-[18px] text-[#ffffff]"><?php the_sub_field('hero_sub'); ?></p>
                    </div>
                </div>
                <div class="bg-gradient-to-b from-[rgba(11,83,4,0.3)] to-[rgba(11,83,4,1)] w-full h-full absolute top-0 left-0 z-[1]"></div>
                <img class="absolute w-full h-full object-cover" src="<?php echo get_sub_field('hero_image'); ?>" alt="hero-image">
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
