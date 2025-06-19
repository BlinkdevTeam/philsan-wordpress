<?php 
/*
*Template Name: Session Expired
*Template Post Type: 38th-convention
*/

get_header(); 

?>
 <div class="registration-middle-content bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] bg-cover bg-center h-[100vh] overflow-hidden w-full relative flex flex-col gap-[20px]">
  <div class="mx-auto w-[90%] xl:w-[1280px] h-[100vh] flex items-center">
      <div class="flex w-[100%] h-max mt-[-150px]">
          <div class="flex w-[70%]">
            <div class="w-[100%] text-black flex flex-col justify-center px-[50px]">
                <img width="60%" src="https://philsan.org/wp-content/uploads/2025/06/PHILSAN_LOGO.png" alt="Logo" class="mx-auto" />
                <div class="relative overflow-hidden pb-[125px] pt-[50px] w-auto h-auto flex flex-col justify-center px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                    <p class="text-[22px] font-poppins text-center z-[1]">"Oops! Something went wrong. Your session may have expired, or the email may already been registered."</p>
                </div>
                <div class="flex gap-[20px] items-center z-[1]">
                    <a href="https://philsan.org/38th-convention/register/" class="flex items-center py-[10px] px-[40px] w-max h-[60px] bg-[#1F773A] hover:bg-[#EDB221] text-[#ffffff] cursor-pointer rounded-tl-[30px] rounded-br-[30px] font-fraunces">Start New Registration</a>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>