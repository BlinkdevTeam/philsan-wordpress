<?php
    $events = new WP_Query(array(
        "post_type" => "event",
        "posts_per_page" => 5,
        'order' => 'ASC',     
    ));
?>
<div class="bg-[#ffffff]">
    <div class="custom-container mx-auto event-section pt-[100px] pb-[50px]">
        <div>
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-[48px] text-[#1F773A] font-[700]">Our Recent Events</h2>
                    <p class="text-[24px] text-center font-[400]">Find stories through a selection of our key strategic topics</p>
                </div>
                 <div class="flex pt-[30px]">
                    <?php echo theme_button("See More", "/"); ?>
                </div>
            </div>
            <div class="flex flex-col gap-[50px] pt-[50px]">
                <?php if ($events->have_posts()) : ?>
                    <?php $count = 0; ?>
                    
                    <div class="flex gap-[50px]"> <!-- First row -->
                    <?php while ($events->have_posts()) : $events->the_post(); ?>
                        <?php
                            $image          = get_field("image");
                            $description    = get_field("description");
                            $location       = get_field("location");
                            $date           = get_field("date");

                            // Reformat the date
                            if ($date) {
                                $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
                            } else {
                                $formatted_date = '';
                            }
                        ?>

                        <div class="flex flex-col gap-[20px] <?php echo $count < 2 ? 'w-1/2' : 'w-1/3'; ?>">
                            <div class="relative w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                <div class="bg-[#000000] opacity-[0.4] w-full h-full absolute top-0 left-0 z-[1]"></div>
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($image); ?>" alt="event image">
                            </div>
                            <div class="flex flex-col gap-[10px]">
                                <h2 class="text-[18px] font-[800]"><?php the_title(); ?></h2>
                                <p class="text-[24px] font-[400]"><?php echo esc_html($description); ?></p>
                            </div>
                            <div class="flex gap-[20px]">
                                <div class="flex items-center gap-[5px] w-[100px] overflow-hidden py-[5px] px-[20px] rounded-full bg-[#F3F3F3]">
                                    <div class="w-fit">
                                        <svg width="14" height="15" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.22222 1V3.2M3.77778 1V3.2M1 5.4H11M2.11111 2.1H9.88889C10.5025 2.1 11 2.59249 11 3.2V10.9C11 11.5075 10.5025 12 9.88889 12H2.11111C1.49746 12 1 11.5075 1 10.9V3.2C1 2.59249 1.49746 2.1 2.11111 2.1Z" stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p><?php echo esc_html($formatted_date); ?></p>
                                </div>
                                <div class="flex items-center gap-[5px] w-[100px] overflow-hidden py-[5px] px-[20px] rounded-full bg-[#F3F3F3]">
                                    <div class="w-fit">
                                        <svg width="14" height="16" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.00009 7.6281C6.99926 7.6281 7.80926 6.81811 7.80926 5.81894C7.80926 4.81976 6.99926 4.00977 6.00009 4.00977C5.00091 4.00977 4.19092 4.81976 4.19092 5.81894C4.19092 6.81811 5.00091 7.6281 6.00009 7.6281Z" stroke="black"/>
                                            <path d="M1.14076 4.76331C2.28309 -0.258299 9.72272 -0.252501 10.8593 4.7691C11.5261 7.7148 9.69373 10.2082 8.08751 11.7506C6.92199 12.8756 5.07803 12.8756 3.90671 11.7506C2.30629 10.2082 0.473924 7.70901 1.14076 4.76331Z" stroke="black"/>
                                        </svg>
                                    </div>
                                    <p><?php echo esc_html($location); ?></p>
                                </div>
                            </div>
                            <a href="" class="flex items-center w-fit text-[#EDB221] font-[800]">
                                Explore More
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13L7 7L1 1" stroke="#EDB221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>

                        <?php
                        $count++;
                        // Close first row after 2 items and open second row
                        if ($count === 2) {
                            echo '</div>'; // close first row
                            echo '<div class="flex gap-[50px] pt-[20px]">'; // open second row
                        }
                        ?>
                    <?php endwhile; ?>
                    </div> <!-- Close second row -->

                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


    
