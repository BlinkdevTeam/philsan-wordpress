<?php 
    $group = get_field('text_icon_section');
?>
<div class="text-icon-section custom-container py-[50px]">
    <div class="flex space-between justify-center">
        <div class="pb-[50px]">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <?php if (!empty($group['sub'])) : ?>
                <div class="pt-[18px]">
                    <p class="text-[18px] text-[400]"><?php echo esc_html($group['sub']) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Repeater section -->
    <?php if( !empty($group['text_icon_section']) && is_array($group['text_icon_section']) ): ?>
        <div class="flex gap-[20px] justify-center">
            <?php foreach( $group['text_icon_section'] as $item ): ?>
                <div class="flex flex-col gap-[20px] items-start w-[25%] rounded-md pt-[20px] pb-[30px] px-[20px] shadow-md bg-white">
                    <?php if( !empty($item['icon']) ): ?>
                        <div class="bg-[#CBF9B6] p-[10px] rounded-xl">
                            <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="icon image" class="w-10 h-10 object-contain" />
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-col gap-[20px]">
                        <?php if( !empty($item['title']) ): ?>
                            <h2 class="text-[18px] font-[400]">
                                <?php echo esc_html($item['title']); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if( !empty($item['sub']) ): ?>
                            <p class="text-gray-600">
                                <?php echo esc_html($item['sub']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
