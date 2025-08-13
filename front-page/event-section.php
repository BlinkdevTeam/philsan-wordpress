<?php
    $events = new WP_Query(array(
        "post_type" => "event",
        "posts_per_page" => 5,
        'order' => 'ASC',     
        // "tax_query" => array(
        //     array(
        //         "taxonomy" => "km_category",
        //         "field"    => "slug",
        //         "terms"    => "Featured",
        //     ),
        // ),
    ));
?>
<div class="event-section pt-[100px] pb-[50px]">
    <div class="flex container mx-auto gap-[50px]">
        <?php if ($events->have_posts()) : ?>
            <?php while ($events->have_posts()): ?>
                <?php 
                    $event->the_post();
                    $index = (int) $event->current_post;
                    $location = get_field("location");
                    $image = get_field("image");
                    $date = get_field("date");
                    $description = get_field("description");
                    $event_id = get_the_ID();

                    // if ($date) {
                    //     // Convert to timestamp
                    //     $timestamp = strtotime($date);

                    //     // Format parts
                    //     $month = date('M', $timestamp); // e.g., "Jul"
                    //     $day   = date('d', $timestamp); // e.g., "17"
                    // }
                ?>
                <h2 class=""><?php the_title(); ?></h2>
                <p><?php echo $description; ?></p>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

    
