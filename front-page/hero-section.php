<div class="home-hero-section h-[700px] lg:h-[800px]">
    <?php if ( have_rows('hero_section') ): ?>
        <?php while ( have_rows('hero_section') ): the_row(); ?>

            <?php if ( get_row_layout() == 'hero_item_group' ): ?>
                <div class="flex space-between h-full w-full relative y-thumbnail">
                    <div class="custom-container py-[100px] mx-auto z-[2]">
                        <div class="w-[50%] flex flex-col justify-center h-[100%]">
                            <h1 class="leading-[normal] text-[24px] xl:text-[48px] font-[700] pb-[20px] text-[#ffc200]"><?php the_sub_field('hero_title'); ?></h1>
                            <p class="text-[16px] xl:text-[18px] text-[#ffffff]"><?php the_sub_field('hero_sub'); ?></p>
                            <?php if ( !empty($$button_name = get_sub_field('hero_button_name')) && !empty($button_link = get_sub_field('hero_button_link')) ) : ?>
                                <div class="flex">
                                    <a href="<?php echo esc_url($button_link); ?>" class="bg-[#ffc200] px-[20px] py-[10px] text-[#ffffff] inline-flex items-center gap-[10px] rounded-tl-[80px] rounded-br-[80px] hover:bg-[#e6ae00] transition">
                                        <?php echo esc_html($$button_name); ?>
                                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 7H17M17 7L11 1M17 7L11 13" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="bg-gradient-to-b from-[rgba(11,83,4,0.3)] to-[rgba(11,83,4,1)] w-full h-full absolute top-0 left-0 z-[1]"></div>
                    <img class="absolute w-full h-full object-cover" src="<?php echo get_sub_field('hero_image'); ?>" alt="hero-image">
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</div>
