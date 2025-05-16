<?php
$home_page = get_page_by_title('Home');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $about = get_field('about_section', $page_id);

    if ( $about ) :
        $title = $about['about_header'];
        $desc = $about['header_details'];
        $img = $about['about_image_section'];
?>

<section class="bg-gray-100 w-full flex flex-col justify-center items-center p-6 rounded-lg shadow mb-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <?php if ( $title ) : ?>
                <h2 class="text-2xl font-semibold mb-4"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
        </div>

        <div class="grid grid-rows-2 gap-6">
            <div>
                <?php if ( $desc ) : ?>
                    <div class="text-gray-700 mb-4"><?php echo wp_kses_post($desc); ?></div>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- First Number Details -->
                <div>
                    <?php
                    if ( have_rows('about_section', $page_id) ) :
                        while ( have_rows('about_section', $page_id) ) : the_row();
                            if ( have_rows('first_number_details') ) :
                                echo '<ul class="space-y-4">';
                                while ( have_rows('first_number_details') ) : the_row();
                                    $num = get_sub_field('number');
                                    $num_detail = get_sub_field('number_details');
                    ?>
                                    <li class="bg-white p-4 rounded shadow text-gray-800">
                                        <?php if ( $num ) : ?>
                                            <p class="text-lg font-bold"><?php echo esc_html($num); ?></p>
                                        <?php endif; ?>
                                        <?php if ( $num_detail ) : ?>
                                            <p class="text-sm text-gray-600"><?php echo esc_html($num_detail); ?></p>
                                        <?php endif; ?>
                                    </li>
                    <?php
                                endwhile;
                                echo '</ul>';
                            endif;
                        endwhile;
                    endif;
                    ?>
                </div>

                <!-- Second Number Details -->
                <div>
                    <?php
                    if ( have_rows('about_section', $page_id) ) :
                        while ( have_rows('about_section', $page_id) ) : the_row();
                            if ( have_rows('second_number_details') ) :
                                echo '<ul class="space-y-4">';
                                while ( have_rows('second_number_details') ) : the_row();
                                    $num = get_sub_field('number');
                                    $num_detail = get_sub_field('number_details');
                    ?>
                                    <li class="bg-white p-4 rounded shadow text-gray-800">
                                        <?php if ( $num ) : ?>
                                            <p class="text-lg font-bold"><?php echo esc_html($num); ?></p>
                                        <?php endif; ?>
                                        <?php if ( $num_detail ) : ?>
                                            <p class="text-sm text-gray-600"><?php echo esc_html($num_detail); ?></p>
                                        <?php endif; ?>
                                    </li>
                    <?php
                                endwhile;
                                echo '</ul>';
                            endif;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-6">
        <?php if ( $img ) : ?>
            <img src="<?php echo esc_url($img['url']); ?>" alt="" class="w-full h-auto object-cover">
        <?php endif; ?>
    </div>
</section>

<?php
    endif;
endif;
?>
