<?php
    $news = new WP_Query(array(
        "post_type" => "news",
        "posts_per_page" => 2,
        'order' => 'ASC',     
    ));
?>
<div class="bg-[#F3F3F3]">
    <div class="custom-container mx-auto news-section pt-[100px] pb-[50px]">
      <div>
          <div class="flex justify-between items-start">
              <div>
                  <h2 class="text-[48px] text-[#1F773A] font-[700]">Our Latest News</h2>
                  <p class="text-[24px] text-center font-[600]">Find stories through a selection of our key strategic topics</p>
              </div>
              <div class="pt-[40px]">
                  <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold text-[18px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl">More Topics</a>
              </div>
          </div>
          <div class="flex gap-[50px] pt-[50px]">
              <?php if ($news->have_posts()) : ?>
                  <?php while ($news->have_posts()) : $news->the_post(); ?>
                      <?php
                          $image = get_field("image");
                          $description = get_field("description");
                      ?>

                      <div class="p-[40px] rounded-xl bg-[#ffffff]">
                        <div class="flex flex-col gap-[20px]">
                            <div class="flex justify-between items-center pb-[20px]">
                              <div class="w-[60%]">
                                <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                              </div>
                              <div class="pt-[40px]">
                                <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold text-[18px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl">Learn More</a>
                              </div>
                            </div>
                            <div class="relative w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                <div class="bg-[#000000] opacity-[0.4] w-full h-full absolute top-0 left-0 z-[1]"></div>
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($image); ?>" alt="event image">
                            </div>
                            <div class="flex flex-col gap-[10px]">
                                <p class="text-[34px] font-[600] leading-normal"><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                      </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
              <?php endif; ?>
          </div>
      </div>
    </div>
</div>


    
