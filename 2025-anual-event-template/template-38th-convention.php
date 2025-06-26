<?php 
 /* Template Name: 38th Convention */

get_header(); 

while (have_posts()) {
the_post();
?>

<div class="hero-section bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)]">
    <div class="flex gap-[50px] w-[1280px] mx-auto">
        <div class="flex flex-col w-[50%] gap-[20px]">
            <img class="w-[100px]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226336.png" alt="">
            <img class="w-[80%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226387-1.png" alt="">
            <p class="font-bold text-[#000000]">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
            <div class="flex flex-col gap-[10px]">
                <p class="font-bold text-[#1F773A]">SEPTEMBER 30, 2025</p>
                <p class="font-bold text-[#EDB221]">Okada Manila, Paranaque City, Philippines</p>
            </div>
            <a class="bg-gradient-to-r from-[#1F773A] to-[#EDB221]" href="">Register</a>
        </div>
        <div class="relative w-[50%]">
            <img class="z-[2]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
            <img class="absolute z-[1] bottom-[-30px] w-[110%] opacity-[0.4]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
        </div>
    </div>
</div>

<?php 
        }

get_footer(); 

?>