<?php
$home_page = get_page_by_title('38th Annual Convention');
if ( $home_page ) :
    $page_id = $home_page->ID;
    $speaker = get_field('speaker_section', $page_id); // speaker_section is a group

    if ( $speaker ) :
        $header = $speaker['header'];
        $details = $speaker['details'];
        $speaker_titles_1 = $speaker['speaker_titles_1'];
        $speaker_profile_1 = $speaker['speaker_profile_1']; // repeater inside group
        $speaker_titles_2 = $speaker['speaker_titles_2'];
        $speaker_profile_2 = $speaker['speaker_profile_2']; // repeater inside group
?>
<div class="w-full flex flex-col gap-8">
    <div class="flex flex-col justify-center items-center text-center px-8">
        <?php if ( $header ) : ?>
            <h2 class="text-6xl text-[#349544] font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ( $details ) : ?>
            <div class="text-md space-y-4">
                <?php echo wpautop(wp_kses_post($details)); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
    $speakers_data = [
        ['title' => $speaker_titles_1, 'profiles' => $speaker_profile_1],
        ['title' => $speaker_titles_2, 'profiles' => $speaker_profile_2],
    ];
    foreach ( $speakers_data as $group ) :
        if ( $group['profiles'] ) :
    ?>
    <div class="flex flex-col justify-center items-center">
        <?php if ( $group['title'] ) : ?>
            <h2 class="text-4xl text-[#349544] font-bold mb-2"><?php echo esc_html($group['title']); ?></h2>
        <?php endif; ?>
        <div class="flex flex-wrap gap-6 justify-center py-4">
            <?php foreach ( $group['profiles'] as $row ) :
                $img = $row['image'];
                $name = $row['name'];
                $position = $row['position'];
                $details = $row['details'];
            ?>
            <div
                role="button"
                tabindex="0"
                class="w-[209px] bg-white rounded shadow overflow-hidden text-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#349544]"
                data-name="<?php echo esc_attr($name); ?>"
                data-position="<?php echo esc_attr($position); ?>"
                data-details="<?php echo esc_attr($details); ?>"
            >
                <?php if ( $img ) : ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="w-full h-auto object-cover">
                <?php endif; ?>
                <div class="p-4">
                    <?php if ( $name ) : ?>
                        <h3 class="text-lg font-bold text-[#349544]"><?php echo esc_html($name); ?></h3>
                    <?php endif; ?>
                    <?php if ( $position ) : ?>
                        <p class="text-sm text-gray-700"><?php echo esc_html($position); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
        endif;
    endforeach;
    ?>
</div>

<!-- Modal HTML -->
<div id="speakerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-[90%] max-w-md p-6 relative">
        <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-3xl leading-none">&times;</button>
        <h3 id="modalName" class="text-xl font-bold text-[#349544] mb-1"></h3>
        <p id="modalPosition" class="text-sm text-gray-700 mb-4"></p>
        <p id="modalDetails" class="text-sm text-gray-600 whitespace-pre-line"></p>
    </div>
</div>

<!-- Modal JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("speakerModal");
    const modalName = document.getElementById("modalName");
    const modalPosition = document.getElementById("modalPosition");
    const modalDetails = document.getElementById("modalDetails");
    const closeModal = document.getElementById("closeModal");

    document.querySelectorAll("[role='button']").forEach(card => {
        card.addEventListener("click", () => {
            modalName.textContent = card.getAttribute("data-name");
            modalPosition.textContent = card.getAttribute("data-position");
            modalDetails.textContent = card.getAttribute("data-details");
            modal.classList.remove("hidden");
        });
        // Accessibility: open modal on Enter key press
        card.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                card.click();
            }
        });
    });

    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    modal.addEventListener("click", (e) => {
        if (e.target === modal) modal.classList.add("hidden");
    });
});
</script>
<?php
    endif;
endif;
?>
