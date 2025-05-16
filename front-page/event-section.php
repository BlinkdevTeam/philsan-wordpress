<?php
$home_page = get_page_by_title('Home');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $event = get_field('event_section', $page_id);

    if ( $event ) :
        $img1 = $event['image_1'];
        $img2 = $event['image_2'];
        $img3 = $event['image_3'];
        $img4 = $event['image_4'];
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
    <div class="flex gap-3 py-6">
       <?php if ( $img1 ) : ?>
            <img src="<?php echo esc_url($img1['url']); ?>" alt="" class="w-[209px] h-auto object-cover">
        <?php endif; ?>
       <?php if ( $img2 ) : ?>
            <img src="<?php echo esc_url($img2['url']); ?>" alt="" class="w-[209px] h-auto object-cover">
        <?php endif; ?>
       <?php if ( $img3 ) : ?>
            <img src="<?php echo esc_url($img3['url']); ?>" alt="" class="w-[209px] h-auto object-cover">
        <?php endif; ?>
       <?php if ( $img4 ) : ?>
            <img src="<?php echo esc_url($img4['url']); ?>" alt="" class="w-[209px] h-auto object-cover">
        <?php endif; ?>
    </div>
</div>

<?php endif; endif; ?>
