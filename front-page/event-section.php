<?php
$home_page = get_page_by_title('Home');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $event = get_field('event_section', $page_id);

    if ( $event ) :
        $header = $event['header'];
        $details = $event['header_details'];
?>

<div class="w-full flex flex-col justify-center items-center rounded-lg overflow-hidden p-6 shadow-lg mb-12">
    <div class="flex">
        <div class="flex flex-col justify-center items-center text-center px-4">
            <?php if ( $header ) : ?>
                <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header); ?></h2>
            <?php endif; ?>
            <?php if ( $details ) : ?>
                <p class="text-lg max-w-xl"><?php echo wp_kses_post($details); ?></p>
            <?php endif; ?>
        </div>
    </div>


    <?php 
    $image_highlights = $event['image_highlights'];
    if ( $image_highlights ) : ?>
        <div class="flex flex-wrap gap-6 justify-center py-4">
            <?php foreach ( $image_highlights as $row ) :
                $img = $row['image'];
                if ( $img ) :
            ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt=""
                    class="w-[209px] h-auto object-cover rounded shadow">
            <?php endif; endforeach; ?>
        </div>
    <?php endif; ?>


</div>

<?php endif; endif; ?>
