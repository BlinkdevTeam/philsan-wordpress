<?php
$about_page = get_page_by_title('About');
if ( $about_page ) :
    $page_id = $about_page->ID;
    $testimonial = get_field('testimonial_section', $page_id);

    if ( $testimonial ) :
        $testimonial_field = $testimonial['testimonial_field'];
?>

<div class="w-full h-auto flex flex-col justify-center items-center rounded-lg overflow-hidden shadow-lg mb-12">
    <div>
        <?php if ( $testimonial_field ) : ?>
            <div class="flex flex-wrap gap-6 justify-center py-4">
                <?php foreach ( $testimonial_field as $row ) :
                    $avatar = $row['avatar'];
                    $name = $row['name'];
                    $comment = $row['comment'];
                ?>
                    <div class="w-[250px] flex flex-col items-center text-center p-4 border rounded shadow">
                        <?php if ( $avatar ) : ?>
                            <img src="<?php echo esc_url($avatar['url']); ?>" alt=""
                                class="w-[100px] h-[100px] object-cover rounded-full mb-4">
                        <?php endif; ?>
                        <?php if ( $name ) : ?>
                            <div class="text-lg font-semibold mb-1"><?php echo esc_html($name); ?></div>
                        <?php endif; ?>
                        <?php if ( $comment ) : ?>
                            <p class="text-gray-600 text-sm"><?php echo esc_html($comment); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php endif; endif; ?>
