<?php if ($featured->have_posts()) : ?>

    <!-- ═══════════════════════════════════════════════
         FEATURED EVENTS — DESKTOP
    ═══════════════════════════════════════════════ -->
    <div class="hidden md:block mt-[-200px] custom-container">
        <div class="swiper featuredEvents w-[100%]">
            <div class="swiper-wrapper">
                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                    <?php
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description        = get_the_content();
                        $description        = wp_strip_all_tags($description);
                        $desc_trimmed       = mb_strimwidth($description, 0, 250, '...');
                        $date               = get_field('date');
                        $categories         = get_the_terms(get_the_ID(), 'category-filters');
                        $button_link        = get_field('button_link');
                        $permalink          = get_permalink();

                        if ($date) {
                            $date_obj       = DateTime::createFromFormat('m/d/Y', $date);
                            $formatted_date = $date_obj ? $date_obj->format('F j, Y') : '';
                            $month          = $date_obj ? $date_obj->format('M') : '';
                            $year           = $date_obj ? $date_obj->format('Y') : '';
                        } else {
                            $formatted_date = '';
                            $month          = '';
                            $year           = '';
                        }
                    ?>
                    <div class="swiper-slide">
                        <div class="relative flex gap-[0px] rounded-2xl overflow-hidden shadow-lg bg-white min-h-[360px]">

                            <!-- Left: Image -->
                            <div class="w-[45%] relative flex-shrink-0">
                                <img
                                    class="w-full h-full object-cover"
                                    src="<?php echo esc_url($featured_image_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                />
                                <!-- Green overlay badge on image -->
                                <div class="absolute top-[20px] left-[20px] bg-[#1F773A] text-white rounded-lg px-[14px] py-[10px] text-center shadow-md">
                                    <p class="text-[18px] font-[700] leading-none"><?php echo esc_html($month); ?></p>
                                    <p class="text-[13px] font-[400] leading-tight"><?php echo esc_html($year); ?></p>
                                </div>
                                <!-- Featured ribbon -->
                                <div class="absolute top-[20px] right-[-28px] bg-[#F4C430] text-[#1a1a1a] text-[11px] font-[700] tracking-widest uppercase px-[40px] py-[6px] rotate-45 shadow">
                                    Featured
                                </div>
                            </div>

                            <!-- Right: Content -->
                            <div class="flex flex-col justify-between gap-[12px] w-[55%] px-[40px] py-[40px]">
                                <div class="flex flex-col gap-[12px]">
                                    <!-- Category + Date row -->
                                    <div class="flex justify-between items-center flex-wrap gap-[10px]">
                                        <?php include locate_template('main-pages-sections/events-page/category-element.php'); ?>
                                        <div class="px-[16px] py-[4px] border-[1px] border-[#1F773A] rounded-full w-fit">
                                            <p class="text-[13px] text-[#1F773A] font-[500]"><?php echo esc_html($formatted_date); ?></p>
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <h2 class="text-[26px] font-[700] text-[#1F773A] leading-snug">
                                        <?php the_title(); ?>
                                    </h2>

                                    <!-- Description -->
                                    <p class="text-[15px] text-[#444444] font-[400] leading-relaxed">
                                        <?php echo esc_html($desc_trimmed); ?>
                                    </p>
                                </div>

                                <div class="flex flex-col gap-[16px]">
                                    <!-- Social media -->
                                    <?php if (have_rows('social_media')) : ?>
                                        <div class="flex gap-[12px]">
                                            <?php while (have_rows('social_media')) : the_row(); ?>
                                                <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>"
                                                   class="cursor-pointer p-[8px] rounded-full bg-[#e6fcdc] hover:bg-[#1F773A] transition-colors duration-200 group">
                                                    <img class="w-[18px] h-[18px] object-cover group-hover:brightness-0 group-hover:invert"
                                                         src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" alt="">
                                                </a>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- CTA -->
                                    <div class="flex">
                                        <?php if ($button_link) : ?>
                                            <?php echo theme_button('View More', $button_link); ?>
                                        <?php else : ?>
                                            <?php echo theme_button('View More', $permalink); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="swiper-pagination mt-[16px]"></div>
        </div>
    </div>


    <!-- ═══════════════════════════════════════════════
         FEATURED EVENTS — MOBILE
    ═══════════════════════════════════════════════ -->
    <div class="md:hidden mt-[-170px] custom-container">
        <div class="swiper featuredEventsMobile w-[100%]">
            <div class="swiper-wrapper">
                <?php
                    // rewind so the mobile loop works after the desktop loop above
                    $featured->rewind_posts();
                ?>
                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                    <?php
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description        = get_the_content();
                        $description        = wp_strip_all_tags($description);
                        $desc_trimmed       = mb_strimwidth($description, 0, 180, '...');
                        $date               = get_field('date');
                        $categories         = get_the_terms(get_the_ID(), 'category-filters');
                        $button_link        = get_field('button_link');
                        $permalink          = get_permalink();

                        if ($date) {
                            $date_obj       = DateTime::createFromFormat('m/d/Y', $date);
                            $formatted_date = $date_obj ? $date_obj->format('F j, Y') : '';
                            $month          = $date_obj ? $date_obj->format('M') : '';
                            $year           = $date_obj ? $date_obj->format('Y') : '';
                        } else {
                            $formatted_date = '';
                            $month          = '';
                            $year           = '';
                        }
                    ?>
                    <div class="swiper-slide">
                        <div class="relative rounded-2xl overflow-hidden shadow-lg bg-white">

                            <!-- Image -->
                            <div class="relative w-full h-[180px]">
                                <img
                                    class="w-full h-full object-cover"
                                    src="<?php echo esc_url($featured_image_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                />
                                <!-- Date badge -->
                                <div class="absolute top-[14px] left-[14px] bg-[#1F773A] text-white rounded-lg px-[12px] py-[8px] text-center shadow-md">
                                    <p class="text-[16px] font-[700] leading-none"><?php echo esc_html($month); ?></p>
                                    <p class="text-[11px] font-[400] leading-tight"><?php echo esc_html($year); ?></p>
                                </div>
                                <!-- Featured ribbon -->
                                <div class="absolute top-[14px] right-[-24px] bg-[#F4C430] text-[#1a1a1a] text-[10px] font-[700] tracking-widest uppercase px-[34px] py-[5px] rotate-45 shadow">
                                    Featured
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex flex-col gap-[12px] px-[20px] py-[24px]">
                                <!-- Category + Date -->
                                <div class="flex justify-between items-center flex-wrap gap-[8px]">
                                    <?php include locate_template('main-pages-sections/events-page/category-element.php'); ?>
                                    <div class="px-[12px] py-[3px] border-[1px] border-[#1F773A] rounded-full w-fit">
                                        <p class="text-[11px] text-[#1F773A] font-[500]"><?php echo esc_html($formatted_date); ?></p>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h2 class="text-[18px] font-[700] text-[#1F773A] leading-snug">
                                    <?php the_title(); ?>
                                </h2>

                                <!-- Description -->
                                <p class="text-[13px] text-[#444444] font-[400] leading-relaxed">
                                    <?php echo esc_html($desc_trimmed); ?>
                                </p>

                                <!-- Social media -->
                                <?php if (have_rows('social_media')) : ?>
                                    <div class="flex gap-[10px]">
                                        <?php while (have_rows('social_media')) : the_row(); ?>
                                            <a href="<?php echo esc_url(get_sub_field('socmed_link')); ?>"
                                               class="cursor-pointer p-[7px] rounded-full bg-[#e6fcdc] hover:bg-[#1F773A] transition-colors duration-200 group">
                                                <img class="w-[16px] h-[16px] object-cover group-hover:brightness-0 group-hover:invert"
                                                     src="<?php echo esc_url(get_sub_field('socmed_icon')); ?>" alt="">
                                            </a>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- CTA -->
                                <div class="flex pb-[4px]">
                                    <?php if ($button_link) : ?>
                                        <?php echo theme_button('View More', $button_link); ?>
                                    <?php else : ?>
                                        <?php echo theme_button('View More', $permalink); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="swiper-pagination mt-[12px]"></div>
        </div>
    </div>

<?php endif; ?>
