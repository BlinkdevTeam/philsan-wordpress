<?php
    $events = new WP_Query(array(
        "post_type" => "event",
        "posts_per_page" => 5,
        'order' => 'ASC',     
    ));
?>
<div class="container mx-auto event-section pt-[100px] pb-[50px]">
    <div>
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-[48px] text-[#1F773A] font-[700]">Our Recent Events</h2>
                <p class="text-[24px] text-center font-[600]">Find stories through a selection of our key strategic topics</p>
            </div>
            <div class="pt-[40px]">
                <?php if (!empty($group['button_title'])) : ?>
                    <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold text-[18px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl">See More</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex flex-col gap-[50px] pt-[50px]">
            <?php if ($events->have_posts()) : ?>
                <?php 
                $row1 = [];
                $row2 = [];
                $count = 0;

                while ($events->have_posts()) {ß
                    $events->the_post();
                    $location = get_field("location");ß
                    $image = get_field("image");
                    $date = get_field("date");
                    $description = get_field("description");
                    $event_id = get_the_ID();

                    if ($count < 2) {
                        $row1[] = compact("image", "description");
                    } else {
                        $row2[] = compact("image", "description");
                    }
                    $count++;
                }
                ?>

                <!-- First row -->
                <div class="flex gap-[50px]">
                    <?php foreach ($row1 as $event) : ?>
                        <div class="flex flex-col gap-[20px] w-1/2">
                            <div class="w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($event['image']); ?>" alt="event image">
                            </div>
                            <h2 class="test-[24px] font-[300]"><?php the_title(); ?></h2>
                            <p class="text-[24px] font-[600]"><?php echo $event['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Second row -->
                <div class="flex gap-[50px] pt-[20px]">
                    <?php foreach ($row2 as $event) : ?>
                        <div class="flex flex-col gap-[20px] w-1/2">
                            <div class="w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($event['image']); ?>" alt="event image">
                            </div>
                            <h2 class="test-[24px] font-[300]"><?php the_title(); ?></h2>
                            <p class="text-[24px] font-[600]"><?php echo $event['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>


    
