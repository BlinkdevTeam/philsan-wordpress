<?php
$home_page = get_page_by_title('Home');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $mission = get_field('mission_statement_section', $page_id);

    if ( $mission ) :
        $img1 = $mission['back_image'];
        $img2 = $mission['front_image'];
        $header = $mission['header'];
        $details = $mission['header_details'];
?>

<div class="w-full rounded-lg overflow-hidden p-6 shadow-lg mb-12">
    <div class="grid grid-cols-2">
        <div class="relative w-full py-6">
            <?php if ( $img1 ) : ?>
                <img src="<?php echo esc_url($img1['url']); ?>" alt="" class="w-[409px] h-auto object-cover">
            <?php endif; ?>
            
            <?php if ( $img2 ) : ?>
                <img src="<?php echo esc_url($img2['url']); ?>" alt=""
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[200px] h-auto z-10 object-cover">
            <?php endif; ?>
        </div>
        <div class="flex flex-col justify-center items-start text-start px-4">
            <?php if ( $header ) : ?>
                <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header); ?></h2>
            <?php endif; ?>
            <?php if ( $details ) : ?>
                <p class="text-lg max-w-xl"><?php echo wp_kses_post($details); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endif; endif; ?>
