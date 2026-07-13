<div class="w-full py-[80px] bg-[#FFF9E6]">
    <div class="flex w-[90%] xl:w-[1240px] mx-auto">
        <div>
            <!-- Heading with optional icon -->
            <div class="flex items-center gap-[10px]">
                <?php
                $title_icon = wp_get_attachment_url(1220);
                if ( $title_icon ) : ?>
                    <img src="<?php echo esc_url($title_icon); ?>" alt="" class="w-[36px] h-auto object-contain flex-shrink-0">
                <?php endif; ?>
                <h2 class="text-[28px] md:text-[32px] font-[700] text-[#1F773A] leading-snug">
                    <?php echo esc_html($header ?: 'Speakers'); ?>
                </h2>
            </div>
            <p>PHILSAN is an annual convention held in the Philippines that brings together people from all walks of life to celebrate their passions and share ideas. Our goal is to create an environment of collaboration and inclusivity that is open to everyone.</p>
            <p>At PHILSAN, you will find inspiring speakers, exciting activities, and unique experiences that are sure to leave a lasting impression. We invite you to join us in our mission of connecting people and fostering meaningful conversations.</p>
        </div>
        <div>
            
        </div>
    </div>
</div>