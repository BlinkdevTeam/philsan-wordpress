<?php 
    $group = get_field('text-icon-section');
?>
<div class="text-icon-section">
    <div class="flex space-between">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['sub'])) : ?>
                    <p class="text-[34px] text-[500] leading-[normal]"><?php echo esc_html($group['sub']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Repeater section -->
    <?php if( !empty($group['text_icon_section']) && is_array($group['text_icon_section']) ): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <?php foreach( $group['text_icon_section'] as $item ): ?>
                <div class="flex items-start space-x-4">
                    <?php if( !empty($item['icon']) ): ?>
                        <img src="<?php echo esc_url($item['icon']['url']); ?>" 
                             alt="<?php echo esc_attr($item['icon']['alt']); ?>" 
                             class="w-10 h-10 object-contain" />
                    <?php endif; ?>

                    <div>
                        <?php if( !empty($item['title']) ): ?>
                            <h3 class="text-lg font-bold text-gray-800">
                                <?php echo esc_html($item['title']); ?>
                            </h3>
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
