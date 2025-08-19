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

    $non_featured = new WP_Query(array(
        "post_type"      => "news",
        "posts_per_page" => 3,  // only 3 latest
        "orderby"        => "date",
        "order"          => "DESC", // newest first
        "meta_query"     => array(
            array(
                "key"     => "featured_news",
                "value"   => '1',
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

<div class="pt-[50px]">
    <div class="custom-container">
        <div class="">
            <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
                <h2 class="leading-[normal] text-[48px] xl:text-[72px] font-[700] text-[#1F773A]">Our Latest News</h2>
                <p class="text-[18px] xl:text-[24px] text-[#000000]">Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="flex flex-col items-right w-[90%] lg:w-[80%] xl:w-[800px] mx-auto">
                <div class="relative flex items-center w-[100%] justify-end">
                    <svg class="absolute left-[10px]" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8477 21.75C6.19766 21.75 1.59766 17.15 1.59766 11.5C1.59766 5.85 6.19766 1.25 11.8477 1.25C17.4977 1.25 22.0977 5.85 22.0977 11.5C22.0977 17.15 17.4977 21.75 11.8477 21.75ZM11.8477 2.75C7.01766 2.75 3.09766 6.68 3.09766 11.5C3.09766 16.32 7.01766 20.25 11.8477 20.25C16.6777 20.25 20.5977 16.32 20.5977 11.5C20.5977 6.68 16.6777 2.75 11.8477 2.75Z" fill="#444242"/>
                        <path d="M22.3471 22.7499C22.1571 22.7499 21.9671 22.6799 21.8171 22.5299L19.8171 20.5299C19.5271 20.2399 19.5271 19.7599 19.8171 19.4699C20.1071 19.1799 20.5871 19.1799 20.8771 19.4699L22.8771 21.4699C23.1671 21.7599 23.1671 22.2399 22.8771 22.5299C22.7271 22.6799 22.5371 22.7499 22.3471 22.7499Z" fill="#444242"/>
                    </svg>
                    <input id="search-input" class="pl-[40px] py-[10px] pr-[10px] text-[#000000] w-[100%] border-[1px] border-[#007831] rounded-full" type="text" placeholder="Search">
                </div>
                <div class="flex gap-[20px] w-[100%] justify-end pt-[10px]">
                    <div id="by-title" class="cursor-pointer kp-search-category kp-search-active">
                        <p>By Title</p>
                    </div>
                    <div class="text-[#CECECE]">|</div>
                    <div id="by-keyword" class="cursor-pointer kp-search-category">
                        <p>By Keyword</p>
                    </div>
                    <div class="text-[#CECECE]">|</div>
                </div>
            </div>
        </div>
        
        <?php include locate_template('news-page/latest-news-section.php'); ?>
        <?php include locate_template('news-page/all-news-section.php'); ?>
    </div>
</div>
