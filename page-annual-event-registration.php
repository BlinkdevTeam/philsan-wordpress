<?php 

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="w-[1080px]">
    <p>Hello</p>
</div>

<?php 
        }

get_footer(); 

?>
