<?php
$about_page = get_page_by_title('About');
if ( $about_page ) :
    $page_id = $about_page->ID;
    $hero = get_field('story_section', $page_id);

    if ( $hero ) :
        $header = $hero['header'];
        $header_two = $hero['header_two'];
        $header_three = $hero['header_three'];
        $header_three_details = $hero['header_three_details'];
        $number_story = $hero['number_story']; //repeater
        $column_two = $hero['column_two']; //repeater
        $image_compilation = $hero['image_compilation']; //repeater
        $timeline_sub_header = $hero['timeline_sub_header'];
        $timeline_header = $hero['timeline_header'];
        $column_one_header = $hero['column_one_header'];
        $image_one = $hero['image_one'];
        $image_two = $hero['image_two'];
?>

<div class="w-full h-auto flex flex-col justify-center items-center rounded-lg overflow-hidden shadow-lg mb-12">
    <div class="flex flex-col justify-center items-center text-center px-4">
        <?php if ( $header ) : ?>
            <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>

        <?php if ( $number_story ) : ?>
            <div class="flex flex-wrap gap-6 justify-center py-4">
                <?php foreach ( $number_story as $row ) :
                    $num = $row['number'];
                    $detail = $row['details'];
                ?>
                    <div class="flex flex-col items-center p-4 border rounded shadow w-[209px] text-center">
                        <?php if ( $num ) : ?>
                            <div class="text-4xl font-bold text-primary"><?php echo esc_html($num); ?></div>
                        <?php endif; ?>
                        <?php if ( $detail ) : ?>
                            <p class="mt-2 text-base text-gray-600"><?php echo esc_html($detail); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div>
            <?php if ( $timeline_sub_header ) : ?>
                <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($timeline_sub_header); ?></h2>
            <?php endif; ?>
            <?php if ( $timeline_header ) : ?>
                <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($timeline_header); ?></h2>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-2 bg-slate-300">
            <div>
                <?php if ( $column_one_header ) : ?>
                    <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($column_one_header); ?></h2>
                <?php endif; ?>
            </div>
            <div>
                <?php if ( $column_two ) : ?>
                    <div class="flex flex-col gap-6 justify-center py-4">
                        <?php 
                            $i = 1; // Initialize counter
                            foreach ( $column_two as $row ) :
                                $header = $row['header'];
                                $detail = $row['details'];
                        ?>
                            <div class="flex flex-row items-center p-4 border rounded shadow w-[209px] text-center">
                                <div class="text-sm text-gray-500 mb-1">#<?php echo $i; ?></div> <!-- Display row number -->
                                <div class="flex flex-col items-center p-4 border rounded shadow w-[209px] text-center">
                                    <?php if ( $header ) : ?>
                                        <div class="text-4xl font-bold text-primary"><?php echo esc_html($header); ?></div>
                                        <?php endif; ?>
                                        <?php if ( $detail ) : ?>
                                            <p class="mt-2 text-base text-gray-600"><?php echo esc_html($detail); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php 
                            $i++; // Increment counter
                            endforeach; 
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <?php if ( $header_two ) : ?>
                <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header_two); ?></h2>
            <?php endif; ?>
        </div>

        <div>
            <?php 
            $image_compilation = $hero['image_compilation'];
            if ( $image_compilation ) : ?>
                <div class="flex flex-wrap gap-6 justify-center py-4">
                    <?php foreach ( $image_compilation as $row ) :
                        $img = $row['image'];
                        if ( $img ) :
                    ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt=""
                            class="w-[209px] h-auto object-cover rounded shadow">
                    <?php endif; endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-[20%_80%]">
            <?php if ( $header_three ) : ?>
                <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($header_three); ?></h2>
            <?php endif; ?>
            <?php if ( $header_three_details ) : ?>
                <h2 class="text-xl font-bold mb-2"><?php echo esc_html($header_three_details); ?></h2>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-[40%_60%]">
            <?php if ( $image_one ) : ?>
                <img src="<?php echo esc_url($image_one['url']); ?>" alt="" class="w-full h-auto object-cover">
            <?php endif; ?>
            <?php if ( $image_two ) : ?>
                <img src="<?php echo esc_url($image_two['url']); ?>" alt="" class="w-full h-auto object-cover">
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endif; endif; ?>
