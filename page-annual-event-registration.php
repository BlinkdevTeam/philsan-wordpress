<?php 

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div>
    <p>Hello</p>
</div>

<?php 
        }

get_footer(); 

?>
