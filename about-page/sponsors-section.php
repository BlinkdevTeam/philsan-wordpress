<?php 
    $group = get_field('sponsor_section');
?>
<div class="sponsors-section custom-container py-[50px]">
    <?php if (!empty($group['title'])) : ?>
        <h2 class="text-[32px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
    <?php endif; ?>
    <div class="pt-[10px]">
        <?php if (!empty($group['sub'])) : ?>
            <div class="text-[24px] leading-[34px] flex flex-col gap-[20px]"><?php echo ($group['sub']) ?></div>
        <?php endif; ?>
    </div>
    
    <!-- Repeater section -->
    <?php if( !empty($group['sponsor_repeater']) && is_array($group['sponsor_repeater']) ): ?>
        <div class="flex gap-[20px] justify-center">
            <?php foreach( $group['sponsor_repeater'] as $item ): ?>
                <div class="flex flex-col gap-[20px] items-start w-[25%]">
                    <?php if( !empty($item['logo']) ): ?>
                        <div class="bg-[#CBF9B6] p-[20px]">
                            <img src="<?php echo esc_url($item['logo']['url']); ?>" alt="sponsor logo" class="w-10 h-10 object-contain" />
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-col gap-[20px]">
                        <?php if( !empty($item['name']) ): ?>
                            <h3 class="text-[24px] font-bold">
                                <?php echo esc_html($item['name']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if( !empty($item['description']) ): ?>
                            <p class="text-gray-600">
                                <?php echo esc_html($item['description']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
