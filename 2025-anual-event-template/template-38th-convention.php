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
                        <div class="pt-[100px]">
                            <p class="text-center font-bold text-[24px] md:text-[32px]"><?php echo esc_html(get_sub_field('speaker_group_title')); ?></p>
                            <div class="flex justify-center gap-[40px] flex-wrap pt-[50px]">
                                <?php if (have_rows('speaker')) : ?>
                                    <?php while (have_rows('speaker')) : the_row(); ?>
                                        <div 
                                            class="speaker-item relative flex flex-row md:flex-col h-[150px] md:h-[auto] items-end md:items-center justify-center w-full sm:w-[280px] lg:w-[350px] group rounded-bl-[5px] md:rounded-bl-[0px] rounded-br-[50px] overflow-hidden"
                                            data-image="<?php echo esc_attr(get_sub_field('speaker_image')); ?>"
                                            data-name="<?php echo esc_attr(get_sub_field('speaker_name')); ?>"
                                            data-title="<?php echo esc_attr(get_sub_field('speaker_title')); ?>"
                                            data-desc="<?php echo esc_attr(get_sub_field('speaker_description')); ?>"
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
    <div class="w-[90%] max-w-[1280px] mx-auto pt-[80px] pt-[110px]">
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
                    <div class="pt-[100px]">
                        <div class="flex flex-col items-center justify-center py-[15px] text-[#1f773a]">
                            <p class="text-center font-bold text-[24px]"><?php echo esc_html(get_sub_field('program_group_title')); ?></p>
                        </div>
                        <?php if (have_rows('program', $page->ID)) : ?>
                            <?php while (have_rows('program', $page->ID)) : the_row(); ?>
                                <div class="pt-[20px]">
                                    <div class="flex relative">
                                        <div class="left-[20px] top-[10px] absolute z-[1] flex flex-col items-center justify-center px-[20px] py-[10px] w-max rounded-tr-[35px] rounded-bl-[35px] bg-[#EDB221]">
                                            <p class="text-center font-bold text-[18px] lg:text-[24px] text-[#ffffff]"><?php echo esc_html(get_sub_field('program_time')); ?></p>
                                        </div>
                                        <div class="flex flex-col py-[20px] pl-[95px] pr-[20px] rounded-[20px] bg-[#1f773a] w-[93%] ml-[auto]">
                                            <?php if (have_rows('program_title', $page->ID)) : ?>
                                                <?php while (have_rows('program_title', $page->ID)) : the_row(); ?>
                                                    <p class="font-bold text-[18px] lg:text-[24px] text-[#ffffff]"><?php echo esc_html(get_sub_field('title')); ?></p>           
                                                <?php endwhile; ?>
                                            <?php endif; ?> 
                                            <?php if (have_rows('program_speaker', $page->ID)) : ?>
                                                <?php while (have_rows('program_speaker', $page->ID)) : the_row(); ?>
                                                    <p class="font-bold text-[14px] lg:text-[16px] text-[#ffffff]"><?php echo esc_html(get_sub_field('speaker')); ?></p>
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


<!-- 🔄 Reusable Modal -->
<div id="dynamicModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">
    <div></div>
    <div class="bg-white p-6 rounded-xl w-[70%] relative">
        <button id="closeModal" class="absolute top-2 right-3 text-[38px]">&times;</button>
        <div class="flex items-center gap-[20px]">
            <div class="w-[50%]">
                <img id="modalImage" class="w-full h-auto mb-3 rounded" src="" alt="">
            </div>
            <div class="w-[50%] flex-col gap-[10px]">
                <h2 id="modalTitle" class="text-[18px] lg:text-[28px] font-bold">Title Here</h2>
                <p id="modalContent" class="text-[14px] lg:text-[18px] font-bold">Content goes here...</p>
                <div class="h-[100%] max-h-[350px] overflow-y-scroll pt-[20px]">
                    <p id="modalDescription" class="text-[14px] lg:text-[18px]">Description Here</p>
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


