<?php 
 /* Template Name: 38th Convention */

get_header(); 

while (have_posts()) {
the_post();
?>

<div class="hero-section relative bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] overflow-hidden">
    <div class="flex gap-[50px] w-[1280px] mx-auto pt-[60px]">
        <div class="flex flex-col w-[50%] gap-[40px]">
            <img class="w-[100px] ml-[-15px]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226390.png" alt="">
            <div class="flex flex-col gap-[10px] pt-[50px]">
                <img class="w-[80%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226387-1.png" alt="">
                <p class="font-bold text-[#000000]">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
            </div>
            <div class="flex flex-col">
                <p class="font-bold text-[#1F773A] text-[28px]">SEPTEMBER 30, 2025</p>
                <p class="font-bold text-[#EDB221] text-[18px]">Okada Manila, Paranaque City, Philippines</p>
            </div>
            <a class="w-max bg-gradient-to-r from-[#1F773A] to-[#EDB221] text-[#ffffff] text-[28px] py-[10px] px-[50px] rounded-tl-[80px] rounded-br-[80px]" href="">Register</a>
        </div>
        <div class="relative w-[50%]">
            <img class="z-[2]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
            <img class="absolute z-[1] bottom-[-50px] transform scale-[1.3] opacity-[0.05]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
        </div>
    </div>
</div>

<?php 
        }

get_footer(); 

?>