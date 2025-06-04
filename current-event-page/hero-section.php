<?php
$home_page = get_page_by_title('38th Annual Convention');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $hero = get_field('hero_section', $page_id);

    if ( $hero ) :
        $img = $hero['event_poster'];
        $header = $hero['header'];
        $theme_header = $hero['theme_header'];
        $theme_sub_header = $hero['theme_sub_header'];
        $date_time = $hero['date_time'];
        $location = $hero['location'];
?>
<div class="w-full bg-gradient-to-r from-[#176524] via-[#269739] to-[#91DF47] grid grid-cols-1 md:grid-cols-[65%_35%] gap-8 text-white py-7">
    <div>
        <?php if ( $img ) : ?>
            <img src="<?php echo esc_url($img['url']); ?>" alt="" class="w-full h-auto object-cover rounded-lg">
        <?php endif; ?>
    </div>
    <div class="flex flex-col justify-center items-start text-start px-8 gap-6">
        <?php if ( $header ) : ?>
            <h2 class="text-md md:text-xl font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ( $theme_header ) : ?>
            <p class="text-4xl md:text-6xl font-bold"><?php echo wp_kses_post($theme_header); ?></p>
        <?php endif; ?>
        <?php if ( $theme_sub_header ) : ?>
            <p class="text-md md:text-xl font-bold"><?php echo wp_kses_post($theme_sub_header); ?></p>
        <?php endif; ?>
        <?php if ( $date_time ) : ?>
            <p class="text-lg font-semibold"><?php echo wp_kses_post($date_time); ?></p>
        <?php endif; ?>
        <?php if ( $location ) : ?>
            <p class="text-md md:text-xl font-semibold"><?php echo wp_kses_post($location); ?></p>
        <?php endif; ?>
    </div>
</div>


<?php endif; endif; ?>
