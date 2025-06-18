<?php 
/*
*Template Name: Registration Successful
*Template Post Type: 38th-convention
*/

get_header(); 

?>

<?php get_template_part('2025-anual-event-template/components/convention-details'); ?>  
          <div class="flex w-[50%]">
              <form id="email-verification" class="w-[100%] text-black flex flex-col justify-center px-[50px]">
                  <div class="w-auto h-auto flex flex-col justify-center px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                    <div class="">
                        <img src="https://philsan.org/wp-content/uploads/2025/06/Sent-Philsan-1.png" alt="">
                    </div>  
                    <p class="text-[22px] font-poppins">A verification link has been sent to your email. Please check your inbox (and spam folder) to complete your registration</p>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <div class="mb-[-170px]">
    <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-3@3x-8-1-scaled.png" alt="">
  </div>
</div>

<?php get_footer(); ?>