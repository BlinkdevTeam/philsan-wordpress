<?php
    $events = new WP_Query(array(
        "post_type" => "event",
        "posts_per_page" => 5,
        'order' => 'ASC',     
    ));
?>
<div class="event-section pt-[100px] pb-[50px]">
    <div class="flex container mx-auto gap-[50px]">
        <?php if ($events->have_posts()) : ?>
            <?php while ($events->have_posts()): ?>
                <?php 
                    $events->the_post();
                    $index = (int) $events->current_post;
                    $location = get_field("location");
                    $image = get_field("image");
                    $date = get_field("date");
                    $description = get_field("description");
                    $event_id = get_the_ID();
                ?>
                <h2 class=""><?php the_title(); ?></h2>
                <p><?php echo $description; ?></p>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

    
