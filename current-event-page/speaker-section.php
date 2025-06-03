<?php
$home_page = get_page_by_title('38th Annual Convention');
if ($home_page) :
    $page_id = $home_page->ID;
    $speaker = get_field('speaker_section', $page_id);

    if ($speaker) :
        $header = $speaker['header'];
        $details = $speaker['details'];
        $speaker_titles_1 = $speaker['speaker_titles_1'];
        $speaker_profile_1 = $speaker['speaker_profile_1'];
        $speaker_titles_2 = $speaker['speaker_titles_2'];
        $speaker_profile_2 = $speaker['speaker_profile_2'];
?>
<div class="w-full flex flex-col gap-20">
    <div class="flex flex-col justify-center items-center text-center px-8 gap-6">
        <?php if ($header) : ?>
            <h2 class="text-6xl text-[#349544] font-bold mb-2"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ($details) : ?>
            <div class="text-md space-y-4">
                <?php echo wpautop(wp_kses_post($details)); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
    $speakers_data = [];

    foreach ($speaker as $key => $value) {
        if (strpos($key, 'speaker_titles_') === 0) {
            $index = str_replace('speaker_titles_', '', $key);
            $profiles_key = 'speaker_profile_' . $index;

            if (!empty($value) && isset($speaker[$profiles_key]) && is_array($speaker[$profiles_key])) {
                $speakers_data[] = [
                    'title' => $value,
                    'profiles' => $speaker[$profiles_key],
                ];
            }
        }
    }

    foreach ($speakers_data as $group) :
        if ($group['profiles']) :
    ?>
    <div class="flex flex-col justify-center items-center gap-16">
        <?php if ($group['title']) : ?>
            <h2 class="text-4xl text-black font-bold mb-2"><?php echo esc_html($group['title']); ?></h2>
        <?php endif; ?>
        <div class="flex flex-wrap gap-6 justify-center py-4">
            <?php foreach ($group['profiles'] as $row) :
                $img = $row['image'];
                $name = $row['name'];
                $position = $row['position'];
                $details = $row['details'];
            ?>
            <div
                role="button"
                tabindex="0"
                class="relative w-[303px] h-[373px] text-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#349544] overflow-hidden"
                data-image="<?php echo esc_url($img['url']); ?>"
                data-name="<?php echo esc_attr($name); ?>"
                data-position="<?php echo esc_attr($position); ?>"
                data-details="<?php echo esc_attr($details); ?>"
            >
                <div class="absolute bottom-0 left-0 w-full h-[330px] bg-[#efefef] z-10 rounded-tl-[30px] rounded-br-[30px]"></div>

                <?php if ($img) : ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="absolute bottom-0 left-0 w-full h-full object-cover z-20 rounded-br-[35px]">
                <?php endif; ?>

                <div class="absolute bottom-0 left-0 w-full z-30 bg-gradient-to-r from-[#176524] via-[#269739] to-[#91DF47] text-white p-4 rounded-br-[30px]">
                    <?php if ($name) : ?>
                        <h3 class="text-lg font-bold"><?php echo esc_html($name); ?></h3>
                    <?php endif; ?>
                    <?php if ($position) : ?>
                        <p class="text-sm"><?php echo esc_html($position); ?></p>
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

<!-- Modal -->
<div id="speakerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-[1350px] p-6 flex flex-col lg:flex-row justify-center items-center relative gap-4">
        <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-3xl leading-none">&times;</button>
        <div class="relative w-[303px] h-[373px] text-center overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full h-[330px] bg-[#efefef] z-10 rounded-tl-[30px] rounded-br-[30px]"></div>
            <img id="modalImage" src="" alt="" class="absolute bottom-0 left-0 w-full h-full object-cover z-20 rounded-br-[35px]">
            <div class="absolute bottom-0 left-0 w-full z-30 bg-gradient-to-r from-[#176524] via-[#269739] to-[#91DF47] text-white p-4 rounded-br-[30px]">
                <h3 id="modalName" class="text-xl font-bold mb-1"></h3>
                <p id="modalPosition" class="text-sm mb-4"></p>
            </div>
        </div>
        <div class="max-w-[840px] h-full p-4">
            <p id="modalDetails" class="text-sm text-gray-600 whitespace-pre-line"></p>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("speakerModal");
    const modalImage = document.getElementById("modalImage");
    const modalName = document.getElementById("modalName");
    const modalPosition = document.getElementById("modalPosition");
    const modalDetails = document.getElementById("modalDetails");
    const closeModal = document.getElementById("closeModal");

    document.querySelectorAll("[role='button']").forEach(card => {
        card.addEventListener("click", () => {
            modalImage.src = card.getAttribute("data-image");
            modalImage.alt = card.getAttribute("data-name");
            modalName.textContent = card.getAttribute("data-name");
            modalPosition.textContent = card.getAttribute("data-position");
            modalDetails.textContent = card.getAttribute("data-details");
            modal.classList.remove("hidden");
        });

        card.addEventListener("keydown", e => {
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
        if (e.target === modal) {
            modal.classList.add("hidden");
        }
    });
});
</script>
<?php
    endif;
endif;
?>
