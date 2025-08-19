<?php
    // 1. Get the featured news (always show if exists)
    $featured = new WP_Query(array(
        "post_type"      => "news",
        "posts_per_page" => 1,
        "meta_query"     => array(
            array(
                "key"     => "featured_news",
                "value"   => '1',
                "compare" => "="
            )
        )
    ));

    // 2. Get up to 4 other news (exclude featured)
    $non_featured = new WP_Query(array(
        "post_type"      => "news",
        "posts_per_page" => 4,
        "meta_query"     => array(
            array(
                "key"     => "featured_news",
                "value"   => '',
                "compare" => "="
            )
        )
    ));
    
    var_dump( get_post_meta( get_the_ID(), 'featured_news', true ) );
?>

<div class="custom-container">
    <div class="h-[500px]">
        <div class="flex space-between h-full w-full relative y-thumbnail">
            <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
                <h1 class="leading-[normal] text-[48px] xl:text-[72px] font-[700] pb-[20px] text-[#1F773A]">Our Latest News</h1>
                <p class="text-[18px] xl:text-[24px] text-[#000000]">Lorem ipsum dolor sit amet consectetur.</p>
            </div>
        </div>
    </div>

    <div class="flex gap-[50px] pt-[50px]">

        <?php if ($featured->have_posts()) : ?>
            <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <?php
                    $image       = get_field("image");
                    $description = get_field("description");
                ?>
                <!-- FEATURED NEWS -->
                <div class="p-[40px] rounded-xl bg-[#FCFCF0]">
                    <h2 class="text-[24px] font-[600] text-[#1f773a]">
                        <?php the_title(); ?> 
                        <span class="ml-2 px-2 py-1 bg-[#FFC200] text-white text-[14px] rounded">Featured</span>
                    </h2>
                    <img class="w-full h-[200px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                    <p class="text-[34px] font-[600] leading-normal mt-4"><?php echo esc_html($description); ?></p>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <?php if ($non_featured->have_posts()) : ?>
            <?php while ($non_featured->have_posts()) : $non_featured->the_post(); ?>
                <?php
                    $image       = get_field("image");
                    $description = get_field("description");
                ?>
                <!-- NON-FEATURED NEWS -->
                <div class="p-[40px]">
                    <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                    <img class="w-full h-[200px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($image); ?>" alt="">
                    <p class="text-[34px] font-[600] leading-normal mt-4"><?php echo esc_html($description); ?></p>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>
</div>
