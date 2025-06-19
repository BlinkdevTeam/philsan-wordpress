<?php 
/*
*Template Name: Registration Successful
*Template Post Type: 38th-convention
*/

get_header(); 

?>

<div class="registration-middle-content bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] justify-center min-h-screen bg-center w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[90%] xl:w-[1280px] flex items-center py-[60px]">
        <div class="flex w-[100%] h-max">
            <?php get_template_part('2025-anual-event-template/components/convention-details'); ?>  
            <div class="flex w-[80%] lg:w-[50%]">
                <div id="email-verification" class="w-[100%] text-black flex flex-col justify-center px-[50px]">
                    <div class="relative overflow-hidden pb-[125px] lg:pb-[160px] pt-[50px] w-auto flex flex-col gap-[50px] justify-start h-auto px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                        <?php get_template_part('2025-anual-event-template/components/mobile-convention-details'); ?>  
                        <div class="flex flex-col justify-center items-center gap-[30px]">
                            <div class="w-[150px]">
                                <img src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Icon-1.png" alt="">
                            </div>  
                            <p class="text-[22px] font-poppins"><strong class="text-[#1F773A] font-bold">PHILSAN will review your registration.</strong> Once approved, you will receive a confirmation email along with your QR code.</p>
                        </div>
                        <div class="flex gap-[20px] items-center z-[1]">
                            <a href="https://philsan.org/38th-convention/register/" class="flex items-center py-[10px] px-[40px] w-max h-[60px] bg-[#1F773A] hover:bg-[#EDB221] text-[#ffffff] cursor-pointer rounded-tl-[30px] rounded-br-[30px] font-fraunces">Start New Registration</a>
                        </div>
                        <?php get_template_part('2025-anual-event-template/components/poster-image'); ?>  
                    </div>
                </div>
          </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>