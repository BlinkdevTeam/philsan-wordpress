<div class="home-hero-section h-[500px] lg:h-[650px]">
    <?php if ( have_rows('hero_section') ): ?>
        <?php while ( have_rows('hero_section') ): the_row(); ?>

            <?php if ( get_row_layout() == 'hero_item_group' ): ?>
                <div class="flex space-between h-full w-full relative y-thumbnail">
                    <div class="w-[80%] mb-[100px] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto z-[2]">
                        <div class="">
                            <h1><?php the_sub_field('hero_title'); ?></h1>
                            <p><?php the_sub_field('hero_sub'); ?></p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-b from-[rgba(0,0,0,0.2)] to-[rgba(0,0,0,0.7)] w-full h-full absolute top-0 left-0 z-[1]"></div>
                    <img class="absolute w-full h-full object-cover" src="<?php echo get_sub_field('hero_image'); ?>" alt="hero-image">
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</div>
