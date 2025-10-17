<?php 
    $group = get_field('about_section');
?>

<!-- desktop -->
<div class="hidden lg:block bg-[#ffffff]">
    <div class="about-section pt-[100px] pb-[50px]">
        <div class="flex custom-container mx-auto gap-[50px]">
            <div class="w-[40%]">
                <?php if (!empty($group['title'])) : ?>
                    <h2 class="text-[18px] text-[#1F773A] font-[800]"><?php echo esc_html($group['title']) ?></h2>
                <?php endif; ?>
                <div class="pt-[10px]">
                    <?php if (!empty($group['description'])) : ?>
                        <p class="text-[22px] font-[400]"><?php echo esc_html($group['description']) ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($group['button_title'])) : ?>
                    <div class="flex pt-[30px]">
                        <?php echo theme_button(esc_html($group['button_title']), "/"); ?>
                    </div>
                <?php endif; ?>
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
                                    <div class="w-[300px] h-[200px] md:h-[320px] lg:h-[400px] rounded-tl-2xl rounded-br-2xl overflow-hidden">
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
</div>

<!-- mobile -->
<div class="block lg:hidden bg-[#ffffff]">
    <div class="about-section pt-[100px] pb-[50px]">
        <div class="flex custom-container mx-auto gap-[50px]">
            <div class="w-[100%]">
                <?php if (!empty($group['title'])) : ?>
                    <h2 class="text-[18px] text-[#1F773A] font-[800]"><?php echo esc_html($group['title']) ?></h2>
                <?php endif; ?>
                <div class="overflow-hidden pt-[10px]">
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
                                        <div class="w-[300px] h-[200px] md:h-[320px] lg:h-[400px] rounded-tl-2xl rounded-br-2xl overflow-hidden">
                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="pt-[10px]">
                    <?php if (!empty($group['description'])) : ?>
                        <p class="text-[16px] md:text-[22px] font-[300]"><?php echo esc_html($group['description']) ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($group['button_title'])) : ?>
                    <div class="flex pt-[10px]">
                        <?php echo theme_button(esc_html($group['button_title']), "/"); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
