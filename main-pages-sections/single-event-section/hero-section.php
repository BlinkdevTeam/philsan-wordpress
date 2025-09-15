<?php 
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
    $description = get_the_content();
    $description = wp_strip_all_tags($description);    
    $date        = get_field("date");
    $categories = get_the_terms( get_the_ID(), 'category-filters' );
    $button_link = get_field("button_link");
    $permalink = get_permalink();
    
    $desc_limit = 200;
    $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
    // Reformat the date
    if ($date) {
        $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
        $date_obj = new DateTime($date);

        // Format parts separately
        $month = $date_obj->format('M'); // short month name: Jan, Feb, Mar
        $year  = $date_obj->format('Y'); // year: 2025
    } else {
        $formatted_date = '';
    }
?>

<div class="single-event-hero-section h-[580px]">
    <div class="flex space-between h-full w-full relative y-thumbnail">
        <div class="flex custom-container items-center justify-center py-[100px] mx-auto z-[2]">
            <div class="flex justify-between items-center gap-[50px]">
                <div class="w-[100%] flex flex-col justify-center text-center h-[100%]">
                    <h1 class="text-[48px] font-[700] pb-[20px] text-[#ffc200]"><?php the_title(); ?></h1>
                    <p class="text-[18px] text-[#ffffff]"><?php echo $description ?></p>
                </div>
            </div>
        </div>
        <div class="bg-[#1f773a] opacity-[.6] w-full h-full absolute top-0 left-0 z-[1]"></div>
        <img class="w-full h-full object-cover absolute" src="<?php echo $featured_image_url ?>" alt="hero-image">
    </div>
</div>
