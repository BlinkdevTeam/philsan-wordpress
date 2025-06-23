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
            <!-- <div class="w-[50%] flex flex-col gap-[10px] justify-center">
                <div class="w-[100%] hidden lg:block px-[50px] flex flex-col gap-[20px] justify-start items-center text-center">
                    <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-2-1.png" alt="Logo" class="w-[60%] mx-auto" />
                    <div class="flex flex-col justify-center items-center text-center gap-[20px] pt-[20px]">
                        <p class="text-[22px] text-center font-poppins font-bold">Innovating for a Sustainable Future: Harnessing Technologies and Alternative Solutions in Animal Nutrition and Health</p>
                        <p class="text-[38px] font-bold text-[#1F773A] font-fraunces">September 30, 2025</p>
                        <div class="flex flex-col items-center bg-gradient-to-r from-[#1F773A] to-[#EDB221] w-max px-[90px] py-[10px] rounded-tl-[40px] rounded-br-[40px]">
                            <p class="text-[22px] text-[#ffffff] font-fraunces">Okada Manila Paranaque City,</p>
                            <p class="text-[22px] text-[#ffffff] font-fraunces">Philippines</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <?php 
                        // get_template_part('2025-anual-event-template/components/sponsor-logos'); 
                    ?>  
                </div>
            </div> -->
            <?php get_template_part('2025-anual-event-template/components/convention-details'); ?>  
            <div class="flex flex w-[100%] lg:w-[50%]">
                <div id="email-verification" class="w-[100%] text-black flex flex-col justify-center lg:px-[50px]">
                    <div class="relative overflow-hidden pb-[250px] lg:pb-[160px] pt-[50px] w-auto h-auto flex flex-col justify-center px-[20px] md:px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                        <?php get_template_part('2025-anual-event-template/components/mobile-convention-details'); ?>  
                        <div class="pb-[30px] w-[80%] md:w-[100%]">
                            <img src="https://philsan.org/wp-content/uploads/2025/06/Sent-Philsan-1.png" alt="">
                        </div>  
                        <p class="text-[22px] font-poppins text-center z-[1]">A verification link has been sent to your email. Please <strong class="text-[#1F773A]">check your inbox</strong> (and spam folder) to complete your registration</p>
                        <div class="relative lg:hidden pt-[120px]">
                            <?php get_template_part('2025-anual-event-template/components/sponsor-logos'); ?>  
                        </div>
                        <?php get_template_part('2025-anual-event-template/components/poster-image'); ?>  
                    </div>
                </div>
            </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>