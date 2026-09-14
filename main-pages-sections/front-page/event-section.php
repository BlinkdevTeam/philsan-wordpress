<?php
$today = date('Ymd');

// Upcoming event — next 1 future event
$upcoming_query = new WP_Query(array(
    'post_type'      => 'event',
    'posts_per_page' => 1,
    'meta_key'       => 'date',
    'meta_value'     => $today,
    'meta_compare'   => '>=',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_type'      => 'DATE',
));

// Recent events — 3 most recent past events
$recent_query = new WP_Query(array(
    'post_type'      => 'event',
    'posts_per_page' => 3,
    'meta_key'       => 'date',
    'meta_value'     => $today,
    'meta_compare'   => '<',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'meta_type'      => 'DATE',
));

$title_icon = wp_get_attachment_url(1220);
?>

<div class="w-full py-[80px]">
    <div class="w-[90%] xl:w-[1240px] mx-auto flex flex-col gap-[60px]">

        <!-- Upcoming Event -->
        <?php if ($upcoming_query->have_posts()) : ?>
            <div class="flex flex-col gap-[20px]">
                <div class="flex items-center gap-[10px]">
                    <h2 class="text-[28px] md:text-[32px] font-[700] text-[#1F773A] leading-snug">Upcoming event</h2>
                </div>

                <?php while ($upcoming_query->have_posts()) : $upcoming_query->the_post();
                    $event_date     = get_field('date');
                    $event_location = get_field('event_location');
                    $event_time     = get_field('event_time');
                    $thumbnail      = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>"
                       class="group flex flex-col md:flex-row gap-[24px] bg-white rounded-xl overflow-hidden shadow-sm border border-[#e5e3da] hover:shadow-md transition-shadow">

                        <?php if ($thumbnail) : ?>
                            <div class="md:w-[380px] h-[220px] md:h-auto flex-shrink-0 overflow-hidden">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        <?php endif; ?>

                        <div class="flex flex-col justify-center gap-[12px] p-[24px] md:pl-0">
                            <span class="text-[12px] font-[500] text-[#1F773A] bg-[#EAF3DE] px-[12px] py-[4px] rounded-full w-fit">
                                Upcoming
                            </span>
                            <h3 class="text-[22px] md:text-[26px] font-[700] text-[#1F773A] leading-snug group-hover:underline">
                                <?php the_title(); ?>
                            </h3>
                            <div class="flex flex-col gap-[6px] text-[13.5px] text-[#5f5e5a]">
                                <?php if ($event_date) : ?>
                                    <div class="flex items-center gap-[8px]">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#1F773A] flex-shrink-0"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <span><?php echo esc_html(date('F j, Y', strtotime($event_date))); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($event_time) : ?>
                                    <div class="flex items-center gap-[8px]">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#1F773A] flex-shrink-0"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        <span><?php echo esc_html($event_time); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($event_location) : ?>
                                    <div class="flex items-center gap-[8px]">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#1F773A] flex-shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        <span><?php echo esc_html($event_location); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php
                                $content = get_the_content();
                                if ($content) : ?>
                                    <div class="text-[13.5px] text-[#5f5e5a] leading-[1.7]">
                                        <?php echo wp_kses_post(wpautop($content)); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <span class="text-[13px] font-[500] text-[#1F773A] mt-[4px]">View details →</span>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

        <!-- Recent Events -->
        <?php if ($recent_query->have_posts()) : ?>
            <div class="flex flex-col gap-[20px]">
                <div class="flex items-center justify-between gap-[10px]">
                    <h2 class="text-[28px] md:text-[32px] font-[700] text-[#1F773A] leading-snug">Recent events</h2>
                    <?php echo theme_button("More Events", "/events"); ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px]">
                    <?php while ($recent_query->have_posts()) : $recent_query->the_post();
                        $event_date     = get_field('date');
                        $event_location = get_field('event_location');
                        $thumbnail      = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>"
                           class="group flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-[#e5e3da] hover:shadow-md transition-shadow">

                            <div class="h-[180px] overflow-hidden bg-[#EAF3DE]">
                                <?php if ($thumbnail) : ?>
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <?php else : ?>
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#1F773A" stroke-width="1.5" opacity="0.4"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col gap-[8px] p-[20px]">
                                <?php if ($event_date) : ?>
                                    <span class="text-[11.5px] text-[#888780]">
                                        <?php echo esc_html(date('F j, Y', strtotime($event_date))); ?>
                                    </span>
                                <?php endif; ?>
                                <h3 class="text-[22px] font-[600] text-[#1F773A] leading-snug group-hover:underline line-clamp-2">
                                    <?php the_title(); ?>
                                </h3>
                                <?php if ($event_location) : ?>
                                    <p class="text-[12.5px] text-[#5f5e5a] flex items-center gap-[6px]">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        <?php echo esc_html($event_location); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>