<?php 
/*
*Template Name: Registration Successful
*Template Post Type: 38th-convention
*/

get_header(); 

?>

<?php get_template_part('2025-anual-event-template/components/convention-details'); ?>  
          <div class="flex w-[50%]">
                <div id="email-verification" class="w-[100%] text-black flex flex-col justify-center px-[50px]">
                    <div class="w-auto h-auto flex flex-col justify-center itemx-center gap-[30px] px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                    <div class="w-[150px]">
                        <img src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Icon-1.png" alt="">
                    </div>  
                    <p class="text-[22px] font-poppins"><strong class="text-[#1F773A] font-bold">PHILSAN will review your registration.</strong> Once approved, you will receive a confirmation email along with your QR code.</p>
                    </div>
                    <div class="flex gap-[20px] items-center ">
                        <button id="submit-button" type="submit" class="py-[10px] px-[40px]  w-[148px] h-[60px] submit bg-[#1F773A] hover:bg-[#EDB221] text-[#ffffff] cursor-pointer rounded-tl-[30px] rounded-br-[30px] font-fraunces">Start New Registration</button>
                        <div id="spinner" class="hidden flex items-center justify-center">
                            <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-500 border-t-green-600"></div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
  </div>
  <div class="mb-[-170px]">
    <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-3@3x-8-1-scaled.png" alt="">
  </div>
</div>

<?php get_footer(); ?>