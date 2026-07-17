<?php
    $about      = get_field('about_section');
    $header     = $about['header'] ?? '';
    $content    = $about['content'] ?? '';
    $collection = get_field('about_image_group') ?? [];
    $video_url  = get_field('about_video'); // ACF URL field
    
    // Collect up to 3 images
    $images = [];
    foreach ( $collection as $img ) {
        if ( count($images) >= 3 ) break;
        $images[] = $img;
    }

    
?>

<div class="w-full pt-[40px] pb-[40px] md:pt-[80px] md:pb-[80px] bg-[#FFF9E6]">
    <div class="flex w-[90%] xl:w-[1240px] mx-auto">
        <div class="flex flex-col lg:flex-row gap-[60px] items-start w-full">

            <!-- LEFT: Media -->
            <div class="w-full lg:w-[50%] flex flex-col gap-[12px]">

                <!-- Video (autoplay, muted required for autoplay to work in browsers) -->
                <?php if ( $video_url ) : ?>
                    <div class="w-full rounded-xl overflow-hidden shadow-md aspect-video">
                        <video
                            autoplay
                            muted
                            loop
                            playsinline
                            class="w-full h-full object-cover"
                        >
                            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php else : ?>
                    <div class="w-full rounded-xl overflow-hidden shadow-md aspect-video bg-[#1F773A] flex items-center justify-center">
                        <p class="text-white/50 text-[14px]">No video available</p>
                    </div>
                <?php endif; ?>

                <!-- Image slider (Swiper, shows 3 at a time, slides 1 at a time) -->
                <?php if ( !empty($collection) ) : ?>
                    <div class="swiper aboutImageSlider w-full">
                        <div class="swiper-wrapper">
                            <?php foreach ( $collection as $img ) : ?>
                                <div class="swiper-slide">
                                    <div class="aspect-square rounded-lg overflow-hidden shadow bg-[#1F773A]">
                                        <img
                                            src="<?php echo esc_url($img['url']); ?>"
                                            alt=""
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <!-- RIGHT: Text -->
            <div class="w-full lg:w-[50%] flex flex-col gap-[20px]">

                <!-- Label -->
                <span class="text-[12px] font-[500] text-[#1F773A] bg-[#EAF3DE] px-[12px] py-[4px] rounded-full w-fit">
                    39th Annual Convention
                </span>

                <!-- Heading with optional icon -->
                <div class="flex items-center gap-[10px]">
                    <?php
                    $title_icon = wp_get_attachment_url(1220);
                    if ( $title_icon ) : ?>
                        <img src="<?php echo esc_url($title_icon); ?>" alt="" class="w-[36px] h-auto object-contain flex-shrink-0">
                    <?php endif; ?>
                    <h2 class="text-[24px] md:text-[32px] font-[700] text-[#1F773A] leading-snug">
                        About the Conference
                    </h2>
                </div>

                <!-- Body content -->
                <div class="flex flex-col gap-[12px] text-[12px] md:text-[14px] text-[#444444] leading-[1.75]">
                    <p>The Philippine Society of Animal Nutritionists will hold its <strong class="text-[#1F773A]">38th Annual Convention</strong> on September 30, 2025, from 8:00am to 6:00pm at Okada Manila, Parañaque City, Metro Manila.</p>
                    <p>Theme: <span class="text-[#0A8E3D] italic">"Innovating for a Sustainable Future: Harnessing Technologies and Alternative Solutions in Animal Nutrition and Health."</span></p>
                    <p>This year's theme focuses on continuous innovation tied with sustainability, cutting-edge technologies and alternative approaches to improve animal nutrition and health — attended by nutritionists, agriculturists, academicians, veterinarians, and stakeholders in livestock, poultry, ruminants, pets and aquatic industries.</p>
                </div>

                <!-- Stats -->
                <div class="flex flex-wrap gap-[12px] pt-[4px]">
                    <div class="flex flex-col gap-[4px] px-[20px] py-[10px] rounded-lg bg-[#70AC45] justify-center">
                        <p class="text-[22px] font-[700] text-white leading-none">16+</p>
                        <p class="text-[16px] text-white/80">Speakers</p>
                    </div>
                    <div class="flex flex-col gap-[4px] px-[20px] py-[10px] rounded-lg bg-[#70AC45] justify-center">
                        <p class="text-[22px] font-[700] text-white leading-none">1 Day</p>
                        <p class="text-[16px] text-white/80">Event</p>
                    </div>
                    <div class="flex flex-col gap-[4px] px-[20px] py-[10px] rounded-lg bg-[#D3AF36] max-w-[260px] justify-center">
                        <div class="flex items-center gap-[6px]">
                            <svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 11.25C9.61875 11.25 10.1484 11.0297 10.5891 10.5891C11.0297 10.1484 11.25 9.61875 11.25 9C11.25 8.38125 11.0297 7.85156 10.5891 7.41094C10.1484 6.97031 9.61875 6.75 9 6.75C8.38125 6.75 7.85156 6.97031 7.41094 7.41094C6.97031 7.85156 6.75 8.38125 6.75 9C6.75 9.61875 6.97031 10.1484 7.41094 10.5891C7.85156 11.0297 8.38125 11.25 9 11.25ZM9 22.5C5.98125 19.9312 3.72656 17.5453 2.23594 15.3422C0.745313 13.1391 0 11.1 0 9.225C0 6.4125 0.904688 4.17188 2.71406 2.50313C4.52344 0.834375 6.61875 0 9 0C11.3812 0 13.4766 0.834375 15.2859 2.50313C17.0953 4.17188 18 6.4125 18 9.225C18 11.1 17.2547 13.1391 15.7641 15.3422C14.2734 17.5453 12.0188 19.9312 9 22.5Z" fill="#F8F4E8"/>
                            </svg>
                            <p class="text-[13px] font-[600] text-white">Okada Manila</p>
                        </div>
                        <p class="text-[11px] text-white/80 leading-[1.5]">New Seaside Drive, Entertainment City, Parañaque City, Metro Manila, Philippines</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.aboutImageSlider', {
            slidesPerView: 3,
            spaceBetween: 10,
            slidesPerGroup: 1,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
            },
        });
    });
</script>