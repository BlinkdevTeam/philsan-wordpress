<?php 
/*
*Template Name: Hold Registration
*Template Post Type: page, 38th-convention
*/

get_header();

    while (have_posts()) {

    the_post();
?>

<div class="registration-middle-content bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] justify-center min-h-screen bg-center w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[90%] xl:w-[1280px] flex items-center py-[60px]">
        <div class="flex w-[100%] h-max justify-center">
          <?php get_template_part('2025-anual-event-template/components/convention-details'); ?>  
          <div class="flex flex w-[100%] lg:w-[50%]">
              <form id="email-verification" class="w-[100%] text-black flex flex-col justify-center lg:px-[50px]">
                  <div class="relative overflow-hidden pb-[125px] md:pb-[250px] lg:pb-[160px] pt-[50px] px-[20px] md:px-[50px] w-auto h-auto flex flex-col justify-center rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                    <?php get_template_part('2025-anual-event-template/components/mobile-convention-details'); ?>  
                      <h2 class="text-center lg:text-left text-[38px] text-[#1F773A] font-fraunces font-bold">
                          Registration resumes on September 30, 2025
                      </h2>
                      <h2 class="text-center lg:text-left text-[38px] text-[#1F773A] font-fraunces font-bold">
                          Join us at Okada Manila
                      </h2>
                    <div class="relative pt-[120px] lg:hidden">
                        <?php get_template_part('2025-anual-event-template/components/sponsor-logos'); ?>  
                    </div>
                    <?php get_template_part('2025-anual-event-template/components/poster-image'); ?>  
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<?php 
        }

get_footer(); 

?>
