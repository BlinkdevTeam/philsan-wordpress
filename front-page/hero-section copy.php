<?php
$home_page = get_page_by_title('Home');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $hero = get_field('hero_section', $page_id);

    if ( $hero ) :
        $img = $hero['hero_background'];
        $header = $hero['hero_header'];
        $details = $hero['header_details'];
?>

<div class="relative w-full rounded-lg overflow-hidden shadow-lg mb-12">
    <?php if ( $img ) : ?>
        <img src="<?php echo esc_url($img['url']); ?>" alt="" class="w-full h-auto object-cover">
    <?php endif; ?>
    <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-center text-white px-4">
        <?php if ( $header ) : ?>
            <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ( $details ) : ?>
            <p class="text-lg max-w-xl"><?php echo wp_kses_post($details); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php endif; endif; ?>
