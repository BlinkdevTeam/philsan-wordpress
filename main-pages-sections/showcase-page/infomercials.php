<div class="custom-container">
    <div class="py-[50px]">
        <div class="flex flex-col gap-[50px] pt-[50px]">
            <?php if ( have_rows('showcase_repeater') ): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
                    <?php while ( have_rows('showcase_repeater') ): the_row(); ?>
                        <?php
                            $featured_image_url = get_sub_field("featured_image");
                            $description = get_sub_field("description");
                            $sponsor        = get_sub_field("sponsor");
                            $date        = get_sub_field("published_date");
                            $title = get_sub_field("title");
                            $video_url = get_sub_field("video_link");

                            $title_limit = 60;
                            $desc_limit = 60;
                            $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
                            $title_trimmed = mb_strimwidth($title, 0, $title_limit, "...");
                            // Reformat the date
                            if ($date) {
                                $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                            } else {
                                $formatted_date = '';
                            }
                        ?>

                        <div class="block pb-[40px]">
                            <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
                            <div class="pt-[20px]">
                                <div class="px-[20px] mt-[10px] mb-[20px] border-[1px] border-[#000000] rounded-full w-fit">
                                    <p class="text-[14px]"><?php echo esc_html($formatted_date); ?></p>
                                </div>
                                <h2 class="text-[18px] font-[600] text-[#1f773a]"><?php echo esc_html($title_trimmed); ?></h2>
                                <p class="text-[14px] font-[400]"><?php echo esc_html($desc_trimmed); ?></p>
                            </div>
                            <div class="flex pt-[30px]">
                               <a href="#" class="watch-video-btn inline-flex items-center justify-center px-5 py-2 bg-[#096936] text-white rounded-full hover:bg-[#0a875a] transition" data-video="<?php echo esc_url($video_url); ?>">
                                    Watch Video
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="video-modal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
  <div class="relative bg-white rounded-2xl w-[90%] max-w-[800px] overflow-hidden">
    <!-- Close button -->
    <button id="close-modal" class="absolute top-3 right-3 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-70 transition">
      ✕
    </button>

    <!-- Video container -->
    <div class="relative w-full h-0 pb-[56.25%]"> <!-- 16:9 ratio -->
      <iframe id="modal-video" class="absolute top-0 left-0 w-full h-full rounded-2xl"
        src=""
        frameborder="0"
        allow="autoplay; encrypted-media"
        allowfullscreen>
      </iframe>
    </div>
  </div>
</div>


