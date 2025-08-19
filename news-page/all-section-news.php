<?php
    // 1. Get the featured news (always show if exists)
    $featured = new WP_Query(array(
        "post_type"      => "news",
        "posts_per_page" => -1,
        "meta_query"     => array(
            array(
                "key"     => "featured_news",
                "value"   => '1',  //means that the value is true
                "compare" => "="
            )
        )
    ));

    // 2. Get up to 4 other news (exclude featured)
    $non_featured = new WP_Query(array(
        "post_type"      => "news",
        "posts_per_page" => -1,
        "meta_query"     => array(
            array(
                "key"     => "featured_news",
                "value"   => '1', //means that the value is false
                "compare" => "!="
            )
        )
    ));

    // 2. Get up to 4 other news (exclude featured)
    $all_news = new WP_Query(array(
        "post_type"      => "news",
        "posts_per_page" => -1,
    ));
?>

<div class="custom-container">
    <div class="h-[500px]">
        <div class="flex space-between h-full w-full relative y-thumbnail">
            <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
                <h2 class="leading-[normal] text-[48px] xl:text-[32px] font-[700] pb-[20px] text-[#1F773A]">Our Latest News</h2>
                <p class="text-[18px] xl:text-[24px] text-[#000000]">Lorem ipsum dolor sit amet consectetur.</p>
            </div>
        </div>
    </div>
    
    <?php include locate_template('news-page/latest-news-section.php'); ?>
    <?php include locate_template('news-page/all-news-section.php'); ?>
</div>
