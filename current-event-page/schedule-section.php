<?php
$home_page = get_page_by_title('38th Annual Convention');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $schedule_section = get_field('schedule_section', $page_id);

    if ( $schedule_section ) :
        $header = $schedule_section['header'];
        $details = $schedule_section['details'];
        $progam_title_1 = $schedule_section['progam_title_1'];
        $program_schedule = $schedule_section['program_schedule'];
?>

<div class="w-full max-w-[1350px] mx-auto flex flex-col justify-center items-center gap-16 px-4 md:px-8">
    <!-- Header and Description -->
    <div class="flex flex-col justify-center items-center text-center gap-6">
        <?php if ( $header ) : ?>
            <h2 class="text-4xl md:text-6xl text-[#349544] font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ( $details ) : ?>
            <div class="text-base md:text-md space-y-4">
                <?php echo wpautop(wp_kses_post($details)); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
    $progam_data = [
        ['schedule' => $progam_title_1, 'program' => $program_schedule],
    ];

    foreach ($progam_data as $group) :
        if ($group['program']) :
    ?>
    <div class="w-full flex flex-col justify-center items-center gap-8">
        <?php if ($group['schedule']) : ?>
            <h2 class="text-2xl md:text-4xl text-[#349544] font-bold mb-2 text-center"><?php echo esc_html($group['schedule']); ?></h2>
        <?php endif; ?>
        <div class="flex flex-col gap-6 w-full">
            <?php foreach ($group['program'] as $row) :
                $time = $row['time'];
                $title = $row['title'];
                $speaker = $row['speaker'];
                $position = $row['position'];
            ?>
            <div class="flex flex-col md:flex-row w-full bg-white text-start overflow-hidden shadow-lg border rounded-lg">
                <div class="md:w-[220px] w-full bg-gradient-to-r from-[#176524] via-[#269739] to-[#91DF47] text-white flex justify-center items-center p-4 md:rounded-br-[30px] md:rounded-none rounded-t-md">
                    <?php if ($time) : ?>
                        <h3 class="text-lg font-bold text-center"><?php echo esc_html($time); ?></h3>
                    <?php endif; ?>
                </div>

                <div class="flex-1 w-full bg-white text-[#176524] p-4">
                    <?php if ($title) : ?>
                        <h3 class="text-lg font-bold"><?php echo esc_html($title); ?></h3>
                    <?php endif; ?>
                    <?php if ($speaker) : ?>
                        <p class="text-sm text-[#535353]"><?php echo esc_html($speaker); ?></p>
                    <?php endif; ?>
                    <?php if ($position) : ?>
                        <p class="text-sm text-black"><?php echo esc_html($position); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
        endif;
    endforeach;
    ?>
</div>

<?php endif; endif; ?>
