<?php
$about_page = get_page_by_title('About');
if ( $about_page ) :
    $page_id = $about_page->ID;
    $hero = get_field('hero_section', $page_id);

    if ( $hero ) :
        $header = $hero['header'];
        $details = $hero['sub_header'];
?>

<div class="w-full h-[700px] flex flex-col justify-center items-center rounded-lg overflow-hidden shadow-lg mb-12">
    <div class="flex flex-col justify-center items-center text-center px-4">
        <?php if ( $details ) : ?>
            <p class="text-lg max-w-xl"><?php echo wp_kses_post($details); ?></p>
        <?php endif; ?>
        <?php if ( $header ) : ?>
            <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
    </div>
</div>

<?php endif; endif; ?>
