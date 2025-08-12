<?php 
    $group = get_field('about_section');
?>
<div class="about-section py-[20px]">
    <div class="flex container mx-auto">
        <div class="w-[45%]">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] font-[600]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <?php if (!empty($group['description'])) : ?>
                <p class="text-[34px] text-[#1F773A] font-[700] leading-[normal]"><?php echo esc_html($group['description']) ?></p>
            <?php endif; ?>
            <?php if (!empty($group['button_title'])) : ?>
                <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold bg-[#FFC200] p-[20px] rounded-tl-[80px] rounded-br-[80px]"><?php echo esc_html($group['button_title']) ?></a>
            <?php endif; ?>
        </div>
        <div class="w-[55%] flex flex-wrap">
            <?php if ( !empty($group['items']) && is_array($group['items']) ) : ?>
                <?php foreach ( $group['items'] as $item ) : ?>
                    <?php 
                        $image = $item['image']; // Replace 'image' with your sub field name
                    ?>
                        <div class="w-[100%] lg:w-[50%] image-container">
                            <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-lg overflow-hidden">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
