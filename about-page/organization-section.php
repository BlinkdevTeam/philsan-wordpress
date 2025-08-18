<?php 
    $group = get_field('organization_group');
?>
<div class="text-icon-section custom-container py-[50px]">
    <div class="flex space-between">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[24px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[18px]">
                <?php if (!empty($group['sub'])) : ?>
                    <p class="text-[34px] text-[500] leading-[34px]"><?php echo esc_html($group['sub']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Repeater section -->
    <?php if( !empty($group['member']) && is_array($group['member']) ): ?>
        <div class="flex gap-[20px] justify-center">
            <?php foreach( $group['member'] as $item ): ?>
                <div class="flex gap-[20px] items-start w-[25%]">
                    <?php if( !empty($item['icon']) ): ?>
                        <div class="bg-[#CBF9B6] p-[20px] rounded-full overflow-hidden">
                            <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="icon image" class="w-10 h-10 object-contain" />
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-col gap-[20px]">
                        <?php if( !empty($item['name']) ): ?>
                            <h3 class="text-[24px] font-bold">
                                <?php echo esc_html($item['name']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if( !empty($item['job_tile']) ): ?>
                            <h4 class="text-gray-600">
                                <?php echo esc_html($item['job_tile']); ?>
                            </h4>
                        <?php endif; ?>
                        <?php if( !empty($item['job_deescription']) ): ?>
                            <p class="text-gray-600">
                                <?php echo esc_html($item['job_deescription']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
