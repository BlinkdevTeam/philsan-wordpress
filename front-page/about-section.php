<?php 
    $group = get_field('about_section');
?>
<div class="about-section pt-[100px]">
    <div class="flex container mx-auto gap-[50px]">
        <div class="w-[40%]">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['description'])) : ?>
                    <p class="text-[34px] text-[500] leading-[normal]"><?php echo esc_html($group['description']) ?></p>
                <?php endif; ?>
            </div>
            <div class="pt-[40px]">
                <?php if (!empty($group['button_title'])) : ?>
                    <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold text-[18px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl"><?php echo esc_html($group['button_title']) ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="w-[60%] overflow-hidden">
            <div class="flex gap-[20px]">
                <?php if ( !empty($group['items']) && is_array($group['items']) ) : ?>
                    <?php foreach ( $group['items'] as $item ) : ?>
                        <?php 
                            $image = $item['item_image']; // Replace 'image' with your sub field name
                            if ( !empty($image) ) :
                                $image_url = is_array($image) ? $image['url'] : $image;
                                $alt = is_array($image) && !empty($image['alt']) ? $image['alt'] : get_the_title();
                        ?>
                            <div class="image-container">
                                <div class="w-[350px] h-[200px] md:h-[320px] lg:h-[450px] rounded-tl-2xl rounded-br-2xl overflow-hidden">
                                    <img class="w-full h-full object-cover" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
