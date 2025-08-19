<?php
    $news = new WP_Query(array(
        "post_type" => "news",
        "posts_per_page" => 5,
        'order' => 'ASC',     
    ));
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
        <?php if ($news->have_posts()) : ?>
            <?php while ($news->have_posts()) : $news->the_post(); ?>
                <?php
                    $image = get_field("image");
                    $description = get_field("description");
                    $featured_news = get_field("featured_news");
                ?>
                <?php if($featured_news) : ?>
                    <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                <?php else: ?>
                    <div class="p-[40px] rounded-xl bg-[#FCFCF0]">
                        <div class="flex flex-col gap-[20px]">
                            <div class="flex justify-between items-center pb-[20px]">
                                <div class="w-[60%]">
                                    <h2 class="text-[24px] font-[600] text-[#1f773a]"><?php the_title(); ?></h2>
                                </div>
                                <div class="">
                                    <a href="https://philsan.org/38th-annual-convention/registration/" class="text-[#ffffff] text-bold text-[18px] bg-[#FFC200] py-[15px] px-[25px] rounded-tl-2xl rounded-br-2xl">Learn More</a>
                                </div>
                            </div>
                            <div class="relative w-full h-[200px] md:h-[320px] lg:h-[450px] overflow-hidden rounded-tl-2xl rounded-br-2xl">
                                <div class="bg-[#000000] opacity-[0.4] w-full h-full absolute top-0 left-0 z-[1]"></div>
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($image); ?>" alt="event image">
                            </div>
                            <div class="flex flex-col gap-[10px]">
                                <p class="text-[34px] font-[600] leading-normal"><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>
