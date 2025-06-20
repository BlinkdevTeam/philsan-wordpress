<?php 
/*
*Template Name: Visit Email
*Template Post Type: page, 38th-convention
*/

get_header(); 

?>

<div class="registration-middle-content bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] justify-center min-h-screen bg-center w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[90%] xl:w-[1280px] flex items-center py-[60px]">
        <div class="flex w-[100%] h-max justify-center">
            <?php get_template_part('2025-anual-event-template/components/convention-details'); ?>  
            <div class="relative flex flex-col gap-[10px] justify-center">
                <?php get_template_part('2025-anual-event-template/components/sponsor-logos'); ?>  
            </div>
            <div class="flex flex w-[100%] lg:w-[50%]">
                <div id="email-verification" class="w-[100%] text-black flex flex-col justify-center lg:px-[50px]">
                    <div class="relative overflow-hidden pb-[250px] lg:pb-[160px] pt-[50px] w-auto h-auto flex flex-col justify-center px-[20px] md:px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                        <?php get_template_part('2025-anual-event-template/components/mobile-convention-details'); ?>  
                        <div class="pb-[30px]">
                            <img src="https://philsan.org/wp-content/uploads/2025/06/Sent-Philsan-1.png" alt="">
                        </div>  
                        <p class="text-[22px] font-poppins text-center z-[1]">A verification link has been sent to your email. Please <strong class="text-[#1F773A]">check your inbox</strong> (and spam folder) to complete your registration</p>
                        <?php get_template_part('2025-anual-event-template/components/poster-image'); ?>  
                    </div>
                </div>
            </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>