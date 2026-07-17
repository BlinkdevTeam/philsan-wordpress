<div class="w-full py-[40px] md:py-[80px] bg-[#E4F4D7]">
    <div class="flex flex-col gap-[20px] w-[90%] xl:w-[1240px] mx-auto">
        <div class="flex flex-col gap-[10px] md:gap-[40px]">
            <div class="flex justify-between items-center">
                <div class="flex flex-col items-left gap-[10px] md:gap-[20px]">
                    <!-- Heading with icon -->
                    <div class="flex items-center gap-[10px]">
                        <?php
                        $title_icon = wp_get_attachment_url(1220);
                        if ( $title_icon ) : ?>
                            <img src="<?php echo esc_url($title_icon); ?>" alt="" class="w-[36px] h-auto object-contain flex-shrink-0">
                        <?php endif; ?>
                        <h2 class="text-[24px] md:text-[32px] font-[700] text-[#1F773A] leading-snug">
                            Sponsors
                        </h2>
                    </div>
                    <p class="w-[100%] md:w-[70%] text-[12px] md:text-[16px]">Many thanks to our partners and supporters. PHILSAN continues to be a beacon of knowledge and expertise in animal nutrition and production.</p>
                </div>

                <div class="hidden md:flex flex-col items-end gap-[10px]">
                    <!-- Group title — updates as slider changes -->
                    <p id="sponsorGroupTitle" class="text-[24px] font-[700] text-[#1F773A]"></p>

                    <!-- Prev / pagination / next -->
                    <div class="flex items-center gap-[12px] min-w-max">
                        <button id="sponsorPrev" class="flex text-[14px] items-center justify-center">&#8249;</button>
                        <span id="sponsorPagination" class="text-[14px] text-[#1F773A] font-[500]">1 of 1</span>
                        <button id="sponsorNext" class="flex text-[14px] items-center justify-center">&#8250;</button>
                    </div>
                </div>
            </div>

            <!-- Swiper -->
            <?php if (have_rows('sponsor_group')) : ?>

                <?php
                // Collect all groups first so we can pass titles to JS
                $sponsor_groups = [];
                while (have_rows('sponsor_group')) : the_row();
                    $sponsor_groups[] = [
                        'title' => get_sub_field('sponsor_group_title'),
                        'logos' => get_sub_field('sponsor_logo') ?: [],
                    ];
                endwhile;
                $total_groups = count($sponsor_groups);
                ?>

                <div class="swiper sponsorSwiper39 w-full">
                    <div class="swiper-wrapper">
                        <?php foreach ($sponsor_groups as $group) : ?>
                            <div class="swiper-slide w-full">
                                <?php if (!empty($group['logos'])) : ?>
                                    <div class="flex flex-wrap gap-[20px] items-center justify-start">
                                        <?php foreach ($group['logos'] as $logo) : ?>
                                            <img
                                                src="<?php echo esc_url($logo['url']); ?>"
                                                alt="<?php echo esc_attr($logo['alt']); ?>"
                                                class="h-[80px] w-auto object-contain"
                                            >
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="flex md:hidden flex-col justify-center items-end gap-[10px]">
                    <!-- Group title — updates as slider changes -->
                    <p id="sponsorGroupTitlemd" class="text-[16px] font-[700] text-[#1F773A]"></p>

                    <!-- Prev / pagination / next -->
                    <div class="flex items-center gap-[12px] min-w-max">
                        <button id="sponsorPrev" class="flex text-[12px] items-center justify-center">&#8249;</button>
                        <span id="sponsorPagination" class="text-[12px] text-[#1F773A] font-[500]">1 of 1</span>
                        <button id="sponsorNext" class="flex text-[12px] items-center justify-center">&#8250;</button>
                    </div>
                </div>

                <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Group titles passed from PHP
                    const groupTitles = <?php echo json_encode(array_column($sponsor_groups, 'title')); ?>;
                    const total       = <?php echo $total_groups; ?>;

                    const titleEl      = document.getElementById('sponsorGroupTitle');
                    const titleElmd      = document.getElementById('sponsorGroupTitlemd');
                    const paginationEl = document.getElementById('sponsorPagination');
                    const prevBtn      = document.getElementById('sponsorPrev');
                    const nextBtn      = document.getElementById('sponsorNext');

                    function updateUI(index) {
                        titleEl.textContent      = groupTitles[index] || '';
                        titleElmd.textContent      = groupTitles[index] || '';
                        paginationEl.textContent = (index + 1) + ' of ' + total;
                    }

                    const swiper = new Swiper('.sponsorSwiper39', {
                        slidesPerView: 1,
                        loop: true,
                         autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        on: {
                            init: function () {
                                updateUI(this.realIndex);
                            },
                            slideChange: function () {
                                updateUI(this.realIndex);
                            },
                        },
                    });

                    // Wire up custom prev/next buttons
                    prevBtn.addEventListener('click', () => swiper.slidePrev());
                    nextBtn.addEventListener('click', () => swiper.slideNext());

                    // Init UI on load
                    updateUI(0);
                });
                </script>

            <?php endif; ?>
        </div>
    </div>
</div>