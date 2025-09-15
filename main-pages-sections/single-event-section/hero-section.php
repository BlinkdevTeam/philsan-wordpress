<?php 
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
    $description = get_the_content();
    $description = wp_strip_all_tags($description);    
?>

<div class="single-event-hero-section h-[580px]">
    <div class="flex space-between h-full w-full relative y-thumbnail">
        <div class="custom-container py-[100px] mx-auto z-[2]">
            <div class="flex gap-[50px]">
                <div class="w-[40%] flex flex-col justify-center text-left h-[100%]">
                    <h1 class="text-[48px] font-[700] pb-[20px] text-[#ffffff]"><?php the_title(); ?></h1>
                    <p class="text-[18px] text-[#ffffff]"><?php echo $description ?></p>
                </div>
                <div class="w=[40%] rounded-xl overflow-hidden">
                    <img class="w-[500px] h-[400px] object-cover" src="<?php echo $featured_image_url ?>" alt="hero-image">
                </div>
            </div>
        </div>
        <div class="bg-[#1f773a] w-full h-full absolute top-0 left-0 z-[1]"></div>
    </div>
</div>
