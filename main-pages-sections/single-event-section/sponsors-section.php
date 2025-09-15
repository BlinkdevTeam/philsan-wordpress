<?php 
    $group = get_field('sponsor_section');
?>
<div class="sponsors-section custom-container py-[50px]">
    <div class="flex flex-col justify-center items-center">
        <?php if (!empty($group['title'])) : ?>
            <h2 class="text-[42px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
        <?php endif; ?>

        <?php if (!empty($group['sub'])) : ?>
            <div class="pt-[10px]">
                <div class="text-[24px] leading-[34px] flex flex-col gap-[20px]">
                    <?php echo wp_kses_post($group['sub']); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="pt-[50px]">
        <?php if ( !empty($group['sponsor_repeater']) ) : ?> 
            <?php foreach ( $group['sponsor_repeater'] as $row ) : ?>
                    <?php 
                        $image_url   = $row['logo'];
                        $name        = $row['name'];
                        $description = $row['description'];
                    ?>
                    <div class="justify-center">
                        <div class="">
                            <img class="w-full h-auto object-cover" src="<?php echo esc_url($image_url); ?>" alt="sponsor logo">
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        <?php endif; ?>
    </div>
</div>
