<?php
$home_page = get_page_by_title('38th Annual Convention');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $sponsors_section = get_field('sponsors_section', $page_id);

    if ( $sponsors_section ) :
        $header = $sponsors_section['header'];
        $sponsors = $sponsors_section['sponsors'];
?>

<div class="w-full flex flex-col justify-center items-center gap-8">
    <div class="flex">
        <?php if ( $header ) : ?>
            <h2 class="text-6xl text-[#349544] font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        </div>
    </div>


    <?php 
    $sponsors = $sponsors_section['sponsors'];
    if ( $sponsors ) : ?>
        <div class="flex flex-wrap gap-6 justify-center py-4">
            <?php foreach ( $sponsors as $row ) :
                $img = $row['image'];
                if ( $img ) :
            ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt=""
                    class="w-[209px] h-auto bg-[#349544] object-cover rounded shadow">
            <?php endif; endforeach; ?>
        </div>
    <?php endif; ?>


</div>

<?php endif; endif; ?>
