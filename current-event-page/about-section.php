<?php
$home_page = get_page_by_title('38th Annual Convention');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $about = get_field('about_section', $page_id);

    if ( $about ) :
        $header = $about['header'];
        $content = $about['content'];
        $last_event = $about['last_event']; // this is a GROUP
        $collection = $last_event['collection']; // this is the REPEATER inside the GROUP
?>
<div class="w-full flex flex-col gap-8">
    <div class="flex flex-col justify-center items-center text-center px-8 gap-6">
        <?php if ( $header ) : ?>
            <h2 class="text-6xl text-[#349544] font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ( $content ) : ?>
            <div class="text-md space-y-4">
                <?php echo wpautop(wp_kses_post($content)); ?>
            </div>
        <?php endif; ?>
    </div>
    
    <?php if ( $collection ) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-8">
        <?php foreach ( $collection as $row ) :
            $img = $row['featured_images'];
            if ( $img ) :
        ?>
            <div class="w-full aspect-[4/3] overflow-hidden rounded shadow bg-[#349544] flex items-center justify-center">
                <img src="<?php echo esc_url($img['url']); ?>" alt=""
                    class="w-full h-full object-cover">
            </div>
        <?php endif; endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<?php endif; endif; ?>
