<?php 
 /* Template Name: 38th Convention */

get_header(); 

while (have_posts()) {
    the_post();

    $page = get_page_by_title('38th convention Test Page');
?>

<div class="relative hero-section flex items-center bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] overflow-hidden">
    <div class="relative z-[1] flex flex-col md:flex-row gap-[50px] w-[90%] max-w-[1280px] mx-auto py-[120px] lg:py-[0px] pt-[60px]">
        <div class="hidden md:flex flex-col w-[50%] gap-[40px]">
            <img class="w-[80px] ml-[-15px]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226390.png" alt="">
            <div class="flex flex-col gap-[10px] pt-[50px]">
                <img class="w-[80%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226387-1.png" alt="">
                <p class="font-bold text-[#000000]">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
            </div>
            <div class="flex flex-col">
                <p class="font-bold text-[#1F773A] text-[28px]">SEPTEMBER 30, 2025</p>
                <p class="font-bold text-[#EDB221] text-[18px]">Okada Manila, Paranaque City, Philippines</p>
            </div>
            <a class="font-bold w-max bg-gradient-to-r from-[#1F773A] to-[#EDB221] text-[#ffffff] text-[24px] lg:text-[38px] py-[10px] px-[50px] rounded-tl-[40px] rounded-br-[40px]" href="">Register</a>
        </div>
        <div class="flex flex-col items-center gap-[20px] md:hidden">
            <img class="w-[70%]" src="https://philsan.org/wp-content/uploads/2025/06/Asset-2-1.png" alt="">
            <p class="font-bold text-[#000000] text-center">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
            <div class="flex flex-col text-center items-center justify-center">
                <p class="font-bold text-[#1F773A] text-[28px]">SEPTEMBER 30, 2025</p>
                <p class="font-bold text-[#EDB221] text-[18px]">Okada Manila, Paranaque City, Philippines</p>
            </div>
            <?php 
                get_template_part('2025-anual-event-template/components/count-down'); 
            ?>  
            <a class="font-bold w-max bg-gradient-to-r from-[#1F773A] to-[#EDB221] text-[#ffffff] text-[18px] py-[10px] px-[50px] rounded-tl-[40px] rounded-br-[40px]" href="">Register</a>
        </div>
        <div class="relative w-[100%] md:w-[50%] pb-[0px] md:pb-[50px]">
            <img class="hidden md:block z-[2]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
            <img class="hidden md:block absolute z-[1] bottom-[-50px] transform scale-[1.3] opacity-[0.05]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
            <div class="hidden md:block pt-[50px]">
                <?php 
                    get_template_part('2025-anual-event-template/components/count-down'); 
                ?> 
            </div> 
        </div>
    </div>
    <div class="absolute bottom-[0px] left-[0px] transform scale-[1.3] opacity-[0.3]">
        <img class="block md:hidden" src="https://philsan.org/wp-content/uploads/2025/06/Asset-3@3x-8-1-scaled.png" alt="">
    </div>
</div>

<div class="about-convention relative ">
    <div class="w-[90%] max-w-[1280px] mx-auto py-[80px] md:py-[120px]">
       <?php if ($page) : ?>
            <!--  Use $page->ID to get the ID of the page we fetched above.
            ACF requires the post ID to know where to get the custom field from.  -->
            <div class="flex flex-col gap-[20px] pb-[40px]">
                <?php if (get_field("about_title", $page->ID)) : ?> 
                    <div class="ml-[-20px]">
                        <div class="flex items-center justify-center gap-[20px]">
                            <div class="w-max">
                                <div>
                                    <svg class="animate-flipY1 transition-transform w-[33px] h-[58px]"viewBox="0 0 63 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 55C0 38.4315 13.4315 25 30 25V35C30 46.0457 21.0457 55 10 55H0Z" fill="#1F773A"/>
                                        <path d="M63 30C63 13.4315 49.5685 0 33 0V35C33 46.0457 41.9543 55 53 55H63V30Z" fill="#EDB221"/>
                                        <path d="M0 58C0 74.5685 13.4315 88 30 88V78C30 66.9543 21.0457 58 10 58H0Z" fill="#1F773A"/>
                                        <path d="M63 58C63 74.5685 49.5685 88 33 88V78C33 66.9543 41.9543 58 53 58H63Z" fill="#1F773A"/>
                                    </svg>
                                </div>
                            </div>
                            <h6 class="font-bold text-[#1F773A] text-[28px] md:text-[40px]"><?php echo get_field("about_title", $page->ID); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col gap-[10px]">
                    <?php if (have_rows('about_description', $page->ID)) : ?>
                        <?php while (have_rows('about_description', $page->ID)) : the_row(); ?>
                            <!-- Loop through each row in the 'about_description' repeater -->
                            <p class="text-center text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('description')); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>
            
            <div class="flex flex-col-reverse md:flex-row justify-between gap-[20px]">
                <?php if (get_field("about_video", $page->ID)) : ?> 
                    <video id="sde" loop autoplay muted class="w-[100%] md:w-[74.6%] h-auto shadow rounded-lg">
                        <source src="<?php echo get_field("about_video", $page->ID);; ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
                <div class="flex flex-col justify-between w-[100%] md:gap-[20px]">
                    <div class="flex flex-rpw md:flex-col md:shadow items-center justify-center gap-[5px] text-[#000000] md:text-[#ffffff] text-[16px] md:text-[32px] md:bg-[#EDB221] font-bold h-[50%] w-[100%] rounded-lg">
                        <p>+15</p>
                        <p>Speakers</p>
                    </div>
                    <div class="flex flex-rpw md:flex-col md:shadow items-center justify-center gap-[5px] text-[#000000] md:text-[#ffffff] text-[16px] md:text-[32px] md:bg-[#1F773A] font-bold h-[50%] w-[100%] rounded-lg">
                        <p>1</p>
                        <p>Day Event</p>
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <?php 
                    // Get the gallery array from the specific page
                    $gallery = get_field('about_image_group', $page->ID); 
                ?>

                <?php if ($gallery) : ?>
                    <div class="about-gallery flex justify-between mt-[20px] gap-[20px]">
                        <?php foreach ($gallery as $image) : ?>
                            <div class="shadow">
                                <img 
                                    src="<?php echo esc_url($image['url']); ?>" 
                                    alt="<?php echo esc_attr($image['alt']); ?>" 
                                    class="w-full h-auto object-cover rounded-xl"
                                />
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <img class="absolute top-[0] w-full h-full object-cover z-[-1]" src="https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png" alt="">
</div>

<div class="speaker-convention relative bg-[#ffffff]">
    <div class="w-[90%] max-w-[1280px] mx-auto pt-[80px] md:pt-[120px]">
       <?php if ($page) : ?>
            <div class="flex flex-col gap-[20px] pb-[40px]">
                <?php if (get_field("speaker_container_title", $page->ID)) : ?> 
                    <div class="ml-[-20px]">
                        <div class="flex items-center justify-center gap-[20px]">
                            <div class="w-max">
                                <svg class="animate-flipY1 transition-transform w-[33px] h-[58px]" viewBox="0 0 63 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 55C0 38.4315 13.4315 25 30 25V35C30 46.0457 21.0457 55 10 55H0Z" fill="#1F773A"/>
                                    <path d="M63 30C63 13.4315 49.5685 0 33 0V35C33 46.0457 41.9543 55 53 55H63V30Z" fill="#EDB221"/>
                                    <path d="M0 58C0 74.5685 13.4315 88 30 88V78C30 66.9543 21.0457 58 10 58H0Z" fill="#1F773A"/>
                                    <path d="M63 58C63 74.5685 49.5685 88 33 88V78C33 66.9543 41.9543 58 53 58H63Z" fill="#1F773A"/>
                                </svg>
                            </div>
                            <h6 class="font-bold text-[#1F773A] text-[28px] md:text-[40px]"><?php echo get_field("speaker_container_title", $page->ID); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="flex flex-col gap-[10px]">
                    <?php if (have_rows('speaker_container_description', $page->ID)) : ?>
                        <?php while (have_rows('speaker_container_description', $page->ID)) : the_row(); ?>
                            <div class="w-[100%] max-w-[980px] mx-auto">
                                <p class="text-center text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>

            <div class="flex flex-col gap-[10px]">
                <?php if (have_rows('speaker_group', $page->ID)) : ?>
                    <?php while (have_rows('speaker_group', $page->ID)) : the_row(); ?>
                        <div class="pt-[50px] lg:pt-[100px]">
                            <p class="text-center font-bold text-[24px] md:text-[32px]"><?php echo esc_html(get_sub_field('speaker_group_title')); ?></p>
                            <div class="flex justify-center gap-[40px] flex-wrap pt-[50px]">
                                <?php if (have_rows('speaker')) : ?>
                                    <?php while (have_rows('speaker')) : the_row(); 
                                        
                                        $description = '';
                                        
                                        if (have_rows('speaker_description')) {
                                            while (have_rows('speaker_description')) {
                                                the_row();
                                                $description .= get_sub_field('description') . '<br>'; // or add <br> if you want HTML breaks
                                            }
                                        }
                                    ?>
                                        <div 
                                            class="speaker-item relative flex flex-row md:flex-col h-[150px] md:h-[auto] items-end md:items-center justify-center w-full sm:w-[280px] lg:w-[350px] group rounded-bl-[5px] md:rounded-bl-[0px] rounded-br-[50px] overflow-hidden"
                                            data-image="<?php echo esc_attr(get_sub_field('speaker_image')); ?>"
                                            data-name="<?php echo esc_attr(get_sub_field('speaker_name')); ?>"
                                            data-title="<?php echo esc_attr(get_sub_field('speaker_title')); ?>"
                                            data-desc="<?php echo esc_attr($description); ?>"
                                        >
    
                                            <!-- Left / Top Panel: Speaker Image Wrapper -->
                                            <div class="relative pl-5 w-[30%] md:w-[100%] h-[100%] md:h-[400px] bg-gradient-to-b from-white via-white to-[#CBF9B6] overflow-hidden">
                                                <div class="absolute bottom-0 right-0 w-full h-full">
                                                    <img class="w-full h-full object-cover" src="<?php echo esc_url(get_sub_field('speaker_image')); ?>" alt="<?php the_title(); ?>">
                                                </div>
                                            </div>

                                            <!-- Right / Bottom Panel: Speaker Info -->
                                            <div class="flex-1 w-full flex flex-col items-center h-[100%] md:h-auto justify-center gap-2.5 py-5 px-5 bg-[#1F773A] group-hover:bg-[#EDB221] text-white transition-all duration-300 ease-in-out">
                                                <p class="text-center text-[18px] lg:text-[22px] font-bold">
                                                    <?php echo esc_html(get_sub_field('speaker_name')); ?>
                                                </p>
                                                <div class="w-full">
                                                    <p class="text-center font-light text-[12px] lg:text-[16px]">
                                                        <?php echo esc_html(get_sub_field('speaker_title')); ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    <?php endwhile; ?>
                                <?php endif; ?> 
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?> 
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="sponsors relative bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_10%,#CBF9B6_100%)] overflow-hidden">
    <div class="w-[90%] max-w-[1280px] mx-auto pt-[110px] md:pt-[200px] pb-[110px]">
       <?php if ($page) : ?>
            <div class="flex flex-col gap-[20px] pb-[40px]">
                <?php if (get_field("sponsor_container_title", $page->ID)) : ?> 
                    <div class="ml-[-20px]">
                        <div class="flex items-center justify-center gap-[20px]">
                            <div class="w-max">
                                <svg class="animate-flipY1 transition-transform w-[33px] h-[58px]" viewBox="0 0 63 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 55C0 38.4315 13.4315 25 30 25V35C30 46.0457 21.0457 55 10 55H0Z" fill="#1F773A"/>
                                    <path d="M63 30C63 13.4315 49.5685 0 33 0V35C33 46.0457 41.9543 55 53 55H63V30Z" fill="#EDB221"/>
                                    <path d="M0 58C0 74.5685 13.4315 88 30 88V78C30 66.9543 21.0457 58 10 58H0Z" fill="#1F773A"/>
                                    <path d="M63 58C63 74.5685 49.5685 88 33 88V78C33 66.9543 41.9543 58 53 58H63Z" fill="#1F773A"/>
                                </svg>
                            </div>
                            <h6 class="font-bold text-[#1F773A] text-[28px] md:text-[40px]"><?php echo get_field("sponsor_container_title", $page->ID); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="flex flex-col gap-[10px]">
                    <?php if (have_rows('sponsor_container_description', $page->ID)) : ?>
                        <?php while (have_rows('sponsor_container_description', $page->ID)) : the_row(); ?>
                            <p class="text-center text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('description')); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('sponsor_group', $page->ID)) : ?>
                        <?php while (have_rows('sponsor_group', $page->ID)) : the_row(); ?>
                            <div class="swiper-slide md:pt-[100px]">
                                <div class="flex flex-col items-center justify-center px-[20px] py-[10px] md:py-[15px] rounded-tl-[50px] rounded-br-[50px] bg-[#EDB221]">
                                    <p class="text-center font-bold text-[16px] md:text-[24px] text-[#ffffff]"><?php echo esc_html(get_sub_field('sponsor_group_title')); ?></p>
                                </div>
                                <div class="flex justify-center gap-[40px] flex-wrap py-[50px]">
                                    <?php 
                                        // Correct: get gallery sub field inside the loop
                                        $gallery = get_sub_field('sponsor_logo'); 
                                    ?>

                                    <?php if ($gallery) : ?>
                                        <div class="sponsor-gallery flex justify-center items-center mt-[20px] gap-[20px] flex-wrap">
                                            <?php foreach ($gallery as $image) : ?>
                                                <div class="w-[1005]">
                                                    <img 
                                                        src="<?php echo esc_url($image['url']); ?>" 
                                                        alt="<?php echo esc_attr($image['alt']); ?>" 
                                                        class="w-full h-auto object-cover rounded-xl"
                                                    />
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
                <div class="swiper-pagination"></div>
            </div>

        <?php endif; ?>
    </div>
</div>

<div class="program relative overflow-hidden">
    <div class="w-[90%] max-w-[1280px] mx-auto pt-[80px] md:pt-[110px]">
       <?php if ($page) : ?>
            <div class="flex flex-col gap-[20px] pb-[40px]">
                <?php if (get_field("program_title", $page->ID)) : ?> 
                    <div class="">
                        <div class="flex items-center justify-center gap-[20px]">
                            <div class="w-max">
                                <svg class="animate-flipY1 transition-transform w-[33px] h-[58px]" viewBox="0 0 63 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 55C0 38.4315 13.4315 25 30 25V35C30 46.0457 21.0457 55 10 55H0Z" fill="#1F773A"/>
                                    <path d="M63 30C63 13.4315 49.5685 0 33 0V35C33 46.0457 41.9543 55 53 55H63V30Z" fill="#EDB221"/>
                                    <path d="M0 58C0 74.5685 13.4315 88 30 88V78C30 66.9543 21.0457 58 10 58H0Z" fill="#1F773A"/>
                                    <path d="M63 58C63 74.5685 49.5685 88 33 88V78C33 66.9543 41.9543 58 53 58H63Z" fill="#1F773A"/>
                                </svg>
                            </div>
                            <h6 class="font-bold text-[#1F773A] text-[28px] md:text-[40px]"><?php echo get_field("program_title", $page->ID); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="flex flex-col gap-[10px]">
                    <?php if (have_rows('program_description', $page->ID)) : ?>
                        <?php while (have_rows('program_description', $page->ID)) : the_row(); ?>
                            <p class="text-center text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('description')); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>
            <?php if (have_rows('program_group', $page->ID)) : ?>
                <?php while (have_rows('program_group', $page->ID)) : the_row(); ?>
                    <div class="pt-[50px] lg:pt-[100px]">
                        <div class="flex flex-col items-center justify-center py-[15px] text-[#1f773a]">
                            <p class="text-center font-bold text-[24px]"><?php echo esc_html(get_sub_field('program_group_title')); ?></p>
                        </div>
                        <?php if (have_rows('program', $page->ID)) : ?>
                            <?php while (have_rows('program', $page->ID)) : the_row(); ?>
                                <div class="pt-[20px]">
                                    <div class="flex relative">
                                        <div class="hidden lg:block left-[20px] top-[10px] absolute z-[1] flex flex-col items-center justify-center px-[20px] py-[10px] w-max rounded-tr-[35px] rounded-bl-[35px] bg-[#EDB221]">
                                            <p class="text-center font-bold text-[18px] lg:text-[24px] text-[#ffffff]"><?php echo esc_html(get_sub_field('program_time')); ?></p>
                                        </div>
                                        <div class="flex flex-col gap-[5px] lg:gap-[0px] py-[20px] pl-[20px] lg:pl-[95px] pr-[20px] rounded-[20px] bg-[#1f773a] w-[100%] lg:w-[93%] lg:ml-[auto]">
                                            <div class="lg:hidden py-[6px] px-[10px] w-max rounded-tr-[8px] rounded-bl-[8px] bg-[#EDB221]">
                                                <p class="text-center font-bold text-[14px] text-[#ffffff]"><?php echo esc_html(get_sub_field('program_time')); ?></p>
                                            </div>
                                            <?php if (have_rows('program_title', $page->ID)) : ?>
                                                <?php while (have_rows('program_title', $page->ID)) : the_row(); ?>
                                                    <p class="font-bold text-[18px] lg:text-[24px] text-[#ffffff]"><?php echo esc_html(get_sub_field('title')); ?></p>           
                                                <?php endwhile; ?>
                                            <?php endif; ?> 
                                            <?php if (have_rows('program_speaker', $page->ID)) : ?>
                                                <?php while (have_rows('program_speaker', $page->ID)) : the_row(); ?>
                                                    <p class="font-bold text-[14px] lg:text-[16px] text-[#ffedc0]"><?php echo esc_html(get_sub_field('speaker')); ?></p>
                                                <?php endwhile; ?>
                                            <?php endif; ?> 
                                            <?php if (have_rows('program_description', $page->ID)) : ?>
                                                <?php while (have_rows('program_description', $page->ID)) : the_row(); ?>
                                                    <p class="font-[200] text-[14px] lg:text-[16px] text-[#ffffff]"><?php echo esc_html(get_sub_field('description')); ?></p>
                                                <?php endwhile; ?>
                                            <?php endif; ?> 
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        <?php endif; ?>
    </div>
</div>
<div class="footer-temporary relative overflow-hidden">
    <div class="w-[95%] md:w-[100%] ml-auto  md:mx-auto pt-[80px] pt-[110px]">
        <div class="flex flex-col md:flex-row gap-[50px] justify-between">
            <div class="w-[100%] md:w-[50%]">
                <div class="w-[100%] md:w-[90%] ml-[auto]">
                    <div class="w-[50%]">
                        <img src="https://philsan.org/wp-content/uploads/2025/06/PHILSAN_LOGO.png" alt="">
                    </div>
                    <div class="pt-[5px]">
                        <p>Ever growing and innovative, PHILSAN undoubtedly plays a key role in propelling animal nutrition in the Philippines into the mainstream of global development and advances.</p>
                    </div>
                </div>
            </div>
            <div class="w-[100%] md:w-[50%] bg-[#1F773A] py-[35px] md:py-[50px] pl-[50px] rounded-bl-[80px] text-[#ffffff]">
                <div class="w-[100%] md:w-[50%] mr-[auto]">
                    <h6 class="text-[] md:text-[32px] font-bold">Contact Us</h6>
                    <div>
                        <p class="text-[14px] md:text-[16px]">To learn more don't hesitate to get in touch</p>
                        <ul class="flex flex-col pt-[10px] pl-[10px] gap-[5px]">
                            <li class="flex gap-[20px] items-center">
                                <div class="flex justify-center items-center p-[5px] w-[30px] h-[30px] rounded-full bg-[#ffffff]">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.98026 6.75516C6.6162 8.07969 7.48312 9.32109 8.58101 10.419C9.67891 11.5169 10.9203 12.3838 12.2448 13.0197C12.3588 13.0744 12.4157 13.1018 12.4878 13.1228C12.744 13.1975 13.0585 13.1438 13.2755 12.9885C13.3365 12.9448 13.3888 12.8926 13.4932 12.7881C13.8126 12.4687 13.9724 12.309 14.133 12.2045C14.7387 11.8107 15.5195 11.8107 16.1252 12.2045C16.2858 12.309 16.4455 12.4687 16.765 12.7881L16.943 12.9662C17.4286 13.4518 17.6714 13.6945 17.8033 13.9553C18.0656 14.4739 18.0656 15.0863 17.8033 15.6049C17.6714 15.8657 17.4286 16.1084 16.943 16.594L16.799 16.7381C16.3151 17.222 16.0731 17.4639 15.7441 17.6487C15.3791 17.8538 14.8121 18.0012 14.3935 18C14.0162 17.9989 13.7583 17.9257 13.2425 17.7793C10.4709 16.9926 7.85553 15.5083 5.6736 13.3264C3.49168 11.1445 2.00738 8.52911 1.22071 5.75746C1.07432 5.24172 1.00113 4.98385 1.00001 4.60653C0.998762 4.18785 1.1462 3.6209 1.35126 3.25587C1.53605 2.92691 1.77801 2.68494 2.26193 2.20102L2.40597 2.05699C2.89155 1.57141 3.13434 1.32861 3.3951 1.19672C3.91369 0.934425 4.52611 0.934425 5.0447 1.19672C5.30546 1.32861 5.54825 1.5714 6.03383 2.05699L6.21189 2.23504C6.53133 2.55448 6.69104 2.7142 6.79547 2.87481C7.18927 3.4805 7.18927 4.26134 6.79547 4.86703C6.69105 5.02764 6.53133 5.18736 6.21189 5.5068C6.10744 5.61125 6.05521 5.66347 6.0115 5.72452C5.85616 5.94146 5.80252 6.25601 5.8772 6.51218C5.89821 6.58426 5.92556 6.64123 5.98026 6.75516Z" stroke="#1f773a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p class="text-[14px] md:text-[16px]">09171169043</p></li>
                            <li class="flex gap-[20px] items-center">
                                <div class="flex justify-center items-center p-[5px] w-[30px] h-[30px] rounded-full bg-[#ffffff]">
                                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 2L9.77212 8.04498C10.4943 8.60671 11.5057 8.60671 12.2279 8.04498L20 2M4.2 17H17.8C18.9201 17 19.4802 17 19.908 16.782C20.2843 16.5903 20.5903 16.2843 20.782 15.908C21 15.4802 21 14.9201 21 13.8V4.2C21 3.0799 21 2.51984 20.782 2.09202C20.5903 1.71569 20.2843 1.40973 19.908 1.21799C19.4802 1 18.9201 1 17.8 1H4.2C3.07989 1 2.51984 1 2.09202 1.21799C1.71569 1.40973 1.40973 1.71569 1.21799 2.09202C1 2.51984 1 3.07989 1 4.2V13.8C1 14.9201 1 15.4802 1.21799 15.908C1.40973 16.2843 1.71569 16.5903 2.09202 16.782C2.51984 17 3.0799 17 4.2 17Z" stroke="#1f773a" stroke-width="2"/>
                                    </svg>
                                </div>
                                <p class="text-[14px] md:text-[16px]">admin@philsan.org</p>
                            </li>
                            <li class="flex gap-[20px] items-center">
                                <div class="flex justify-center items-center p-[5px] w-[30px] h-[30px] rounded-full bg-[#ffffff]">
                                    <svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.11999 3.32H11V0.139999C10.0897 0.0453465 9.17514 -0.0013848 8.25999 -6.53468e-07C5.53999 -6.53468e-07 3.67999 1.66 3.67999 4.7V7.32H0.609985V10.88H3.67999V20H7.35998V10.88H10.42L10.88 7.32H7.35998V5.05C7.35998 4 7.63999 3.32 9.11999 3.32Z" fill="#1f773a"/>
                                    </svg>
                                </div>
                                <p class="text-[14px] md:text-[16px]">Official PHILSAN Facebook Page</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-[5px] py-[30px] text-center items-center justify-center font-[200] text-[12px]">
        <span>PHILSAN © 2023. All rights reserved.</span>
        <span>Powered by BLINK CREATIVE STUDIO</span>
    </div>
</div>

<!-- 🔄 Reusable Modal -->
<div id="dynamicModal" class="fixed inset-0 z-50 hidden bg-white/50 flex items-center justify-center">
    <div class="relative w-[90%] sm:w-[640px] lg:w-[980px]">
        <!-- <button id="closeModal" class="absolute flex justify-center items-center w-[50px] h-[50px] bg-[#ffffff] text-[38px]">&times;</button> -->
        <div class="flex flex-col md:flex-row items-center w-[100%] mx-auto">
            <div class="hidden lg:block w-[100%] pt-[20px] bg-gradient-to-b from-white via-white to-[#CBF9B6] rounded-[50px]">
                <div class="w-[90%] ml-[auto]">
                    <img id="modalImage" class="w-full h-auto" src="" alt="">
                </div>
            </div>
            <div class="bg-[#1F773A] w-[100%] flex-col gap-[10px] p-[35px] md:p-[50px] rounded-bl-[80px] lg:rounded-bl-[0px] rounded-tr-[80px] lg:rounded-tr-[30px] rounded-br-[0px] lg:rounded-br-[30px] text-[#ffffff]">
                <div class="flex gap-[20px] md:gap-[0px]">
                    <div class="block lg:hidden w-[30%] md:w-[100px] h-[100px] overflow-hidden bg-gradient-to-b from-white via-white to-[#CBF9B6] relative rounded-bl-[20px] rounded-tr-[20px]">
                        <img id="modalImage-mobile" class="w-full h-full object-cover" src="" alt="">
                    </div>
                    <div class="w-[70%] md:w-[100%]">
                        <h2 id="modalTitle" class="text-[18px] lg:text-[28px] font-bold">Title Here</h2>
                        <p id="modalContent" class="text-[#ffedc0] text-[14px] lg:text-[18px] font-bold">Content goes here...</p>
                    </div>
                </div>
                <div class="h-[100%] max-h-[200px] overflow-y-scroll mt-[20px] scrollbar-custom">
                    <p id="modalDescription" class="text-[12px] md:text-[14px] lg:text-[16px] font-[200] scrollbar-custom pr-[20px]">Description Here</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        // 🎯 Set your event date here (YYYY-MM-DDTHH:MM:SS)
        const eventDate = new Date("2025-09-30T14:30:00").getTime();

        function pad(num, size = 2) {
        return num.toString().padStart(size, "0");
        }

        function updateCountdown() {
        const now = new Date().getTime();
        const diff = eventDate - now;

        if (diff <= 0) {
            document.getElementById("countdown").innerHTML = "🎉 The event has started!";
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);
        //   const milliseconds = diff % 1000;

        document.getElementById("days").innerText = pad(days);
        document.getElementById("hours").innerText = pad(hours);
        document.getElementById("minutes").innerText = pad(minutes);
        document.getElementById("seconds").innerText = pad(seconds);
        //   document.getElementById("milliseconds").innerText = pad(milliseconds, 3);
        }

        // ⚡ Update every 50ms for smoother milliseconds display
        setInterval(updateCountdown, 50);
    });
  </script> -->
<?php 
        }

get_footer(); 

?>


