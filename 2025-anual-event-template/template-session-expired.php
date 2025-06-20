<?php 
/*
*Template Name: Session Expired
*Template Post Type: page, 38th-convention
*/

get_header(); 

?>
 <div class="registration-middle-content bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] bg-cover bg-center h-[100vh] overflow-hidden w-full relative flex flex-col gap-[20px]">
  <div class="mx-auto w-[90%] xl:w-[1280px] h-[100vh] flex items-center">
      <div class="flex w-[100%] h-max mt-[-150px] justify-center">
          <div class="flex w-[70%] ">
            <div class="w-[100%] text-black flex flex-col justify-center px-[50px]">
                <div class="relative overflow-hidden pb-[125px] pt-[50px] w-auto h-auto flex flex-col justify-center px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                    <img class="w-[45%] lg:w-[60%] mx-auto" src="https://philsan.org/wp-content/uploads/2025/06/PHILSAN_LOGO.png" alt="Logo" />    
                    <p class="text-[22px] font-poppins text-center z-[1] py-[50px]">"Oops! Something went wrong. Your session may have expired, or the email may have already been registered."</p>
                    <div class="flex gap-[20px] items-center z-[1] justify-center">
                        <a href="https://philsan.org/38th-annual-convention/registration/" class="flex items-center py-[10px] px-[40px] w-max h-[60px] bg-[#1F773A] hover:bg-[#EDB221] text-[#ffffff] cursor-pointer rounded-tl-[30px] rounded-br-[30px] font-fraunces">Start New Registration</a>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>