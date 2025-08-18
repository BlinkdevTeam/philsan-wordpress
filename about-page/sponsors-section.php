<?php 
    $group = get_field('sponsor_section');
?>
<div class="sponsors-section custom-container py-[50px]">
    <?php if (!empty($group['title'])) : ?>
        <h2 class="text-[32px] text-[#1F773A] font-[700]">
            <?php echo esc_html($group['title']) ?>
        </h2>
    <?php endif; ?>

    <?php if (!empty($group['sub'])) : ?>
        <div class="pt-[10px]">
            <div class="text-[24px] leading-[34px] flex flex-col gap-[20px]">
                <?php echo wp_kses_post($group['sub']); ?>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if ( !empty($group['sponsor_repeater']) ) : ?> 
        <div class="flex flex-col gap-[20px] mt-8">
            <?php foreach ( $group['sponsor_repeater'] as $row ) : ?>
                <?php 
                    $image_url   = $row['image'];
                    $name        = $row['name'];
                    $description = $row['description'];
                ?>
                <div class="flex gap-[20px] items-start justify-start">
                    <div class="w-[200px]">
                        <img class="w-full h-auto object-cover" 
                             src="<?php echo esc_url($image_url); ?>" 
                             alt="sponsor logo">
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
    <?php endif; ?>

</div>
