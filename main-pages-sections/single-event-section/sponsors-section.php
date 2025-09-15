<?php 
    $group = get_field('sponsor_section');
?>
<?php if ( !empty($group['sponsor_repeater']) ) : ?> 
    <div class="sponsors-section custom-container py-[50px]">
        <div class="flex flex-col justify-center items-center">
            <h2 class="text-[24px] text-[#1F773A] font-[700]">Event Sponsors</h2>
        </div>
        <div class="pt-[50px]">
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
        </div>
    </div>
 <?php endif; ?>
