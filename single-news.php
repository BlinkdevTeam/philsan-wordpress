<?php get_header(); ?>
    <?php 
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $description = get_the_content();
        $date        = get_field("date");
        $categories = get_the_terms( get_the_ID(), 'category-filters' );
        $title = get_the_title();

        $title_limit = 60;
        $desc_limit = 60;
        $desc_trimmed = mb_strimwidth($description, 0, $desc_limit, "..."); // Trim it properly
        $title_trimmed = mb_strimwidth($description, 0, $title_limit, "...");
        // Reformat the date
        if ($date) {
            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F j, Y');
        } else {
            $formatted_date = '';
        }
    ?>
    <div class="custom-container">
        <div>
            <h2 class="text-left text-[42px] font-[600] text-[#1f773a]"><?php the_title(); ?> </h2>
            <img class="w-full h-[300px] object-cover rounded-tl-2xl rounded-br-2xl" src="<?php echo esc_url($featured_image_url); ?>" alt="">
            <p class="text-left text-[18px] font-[400]"><?php echo esc_html($description); ?></p>
        </div>
    </div>
<?php get_footer(); ?>