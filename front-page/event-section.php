<?php
    $events = new WP_Query(array(
        "post_type" => "event",
        "posts_per_page" => 5,
        'order' => 'ASC',     
    ));
?>
<div class="event-section pt-[100px] pb-[50px]">
    <div class="container mx-auto flex flex-col gap-[50px]">
        <?php if ($events->have_posts()) : ?>
            <?php 
            $row1 = [];
            $row2 = [];
            $count = 0;

            while ($events->have_posts()) {
                $events->the_post();
                $location = get_field("location");
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
                    <div class="w-1/2">
                        <div class="w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($event['image']); ?>" alt="event image">
                        </div>
                        <p><?php echo $event['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Second row -->
            <div class="flex gap-[50px]">
                <?php foreach ($row2 as $event) : ?>
                    <div class="w-1/3">
                        <div class="w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($event['image']); ?>" alt="event image">
                        </div>
                        <p><?php echo $event['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>


    
