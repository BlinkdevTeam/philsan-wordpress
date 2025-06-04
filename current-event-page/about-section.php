<?php
$home_page = get_page_by_title('38th Annual Convention');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $about = get_field('about_section', $page_id);

    if ( $about ) :
        $header = $about['header'];
        $content = $about['content'];
        $last_event = $about['last_event'];
        $collection = $last_event['collection']; // repeater
?>
<div class="w-full flex flex-col justify-center items-center gap-8">
    
    <!-- Header and Description -->
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
        
    <!-- Video and Gallery Layout -->
    <?php if ( $collection ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-3 gap-4 px-8">
            <?php
            // Get latest video from /wp-content/assets/SDE/
            $video_dir = ABSPATH . 'wp-content/assets/SDE/';
            $video_url_base = content_url('assets/SDE/');
            $video_file = '';
    
            if ( is_dir($video_dir) ) {
                $video_files = glob($video_dir . '*.{mp4,webm,ogg}', GLOB_BRACE);
                if ( !empty($video_files) ) {
                    usort($video_files, function($a, $b) {
                        return filemtime($b) - filemtime($a); // sort by last modified
                    });
                    $video_file = $video_url_base . '/' . basename($video_files[0]);
                }
            }
        
            // Display video
            if ( $video_file ) : ?>
                <div class="md:col-span-2 md:row-span-2 w-full h-full">
                    <video controls class="w-full h-full object-cover rounded shadow">
                        <source src="<?php echo esc_url($video_file); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php endif; ?>
            
            <?php
            // Display up to 5 images from repeater
            $max_images = 5;
            $count = 0;
            foreach ( $collection as $row ) :
                if ( $count >= $max_images ) break;
                $img = $row['featured_images'];
                if ( $img ) :
            ?>
                <div class="w-full aspect-[4/3] overflow-hidden rounded shadow bg-[#349544] flex items-center justify-center">
                    <img src="<?php echo esc_url($img['url']); ?>" alt=""
                         class="w-full h-full object-cover">
                </div>
            <?php
                $count++;
                endif;
            endforeach;
            ?>
        </div>
    <?php endif; ?>
</div>
<?php endif; endif; ?>
