<?php
    $events = new WP_Query(array(
        "post_type" => "events",
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
    <?php if ($events->have_posts()) : ?>
        <?php while ($events->have_posts()): ?>
            <?php $events->the_post(); ?>
            <?php $event_id = get_the_ID(); ?>
            <?php var_dump($event_id); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

    
