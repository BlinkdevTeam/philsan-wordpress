<div class="w-full py-[80px] bg-[#FFF9E6]">
    <div class="flex flex-col gap-[20px] w-[90%] xl:w-[1240px] mx-auto">
        <div class="flex flex-col items-center">
            <!-- Heading with optional icon -->
            <div class="flex items-center gap-[10px]">
                <?php
                $title_icon = wp_get_attachment_url(1220);
                if ( $title_icon ) : ?>
                    <img src="<?php echo esc_url($title_icon); ?>" alt="" class="w-[36px] h-auto object-contain flex-shrink-0">
                <?php endif; ?>
                <h2 class="text-[28px] md:text-[32px] font-[700] text-[#1F773A] leading-snug">
                    <?php echo esc_html($header ?: 'Speakers'); ?>
                </h2>
            </div>
            <p class="text-center">PHILSAN is an annual convention held in the Philippines that brings together people from all walks of life to celebrate their passions and share ideas. Our goal is to create an environment of collaboration and inclusivity that is open to everyone.</p>
            <p class="text-center">At PHILSAN, you will find inspiring speakers, exciting activities, and unique experiences that are sure to leave a lasting impression. We invite you to join us in our mission of connecting people and fostering meaningful conversations.</p>
        </div>
        <div>
            <?php if (have_rows('speaker_group')) : ?>

                <div class="w-full flex flex-col gap-20 pt-[50px]">

                    <?php while (have_rows('speaker_group')) : the_row();
                        $group_title = get_sub_field('speaker_group_title');
                    ?>

                    <div class="flex flex-col justify-center items-center gap-16">

                        <?php if ($group_title) : ?>
                            <h2 class="text-4xl text-black font-bold mb-2"><?php echo esc_html($group_title); ?></h2>
                        <?php endif; ?>

                        <?php if (have_rows('speaker')) : ?>
                            <div class="flex flex-wrap gap-6 justify-center py-4">
                                <?php while (have_rows('speaker')) : the_row();
                                    $name        = get_sub_field('speaker_name');
                                    $position    = get_sub_field('speaker_title');
                                    $description_rows = get_sub_field('speaker_description') ?: [];
                                    $description = implode("\n\n", array_column($description_rows, 'description'));
                                    $img         = get_sub_field('speaker_image');

                                    $tribal_images = array_filter([
                                        wp_get_attachment_url(1227),
                                        wp_get_attachment_url(1228),
                                        wp_get_attachment_url(1229),
                                        wp_get_attachment_url(1230),
                                    ]);

                                    $tribal = $tribal_images[array_rand($tribal_images)];
                                ?>
                                    
                                    <div
                                        role="button"
                                        tabindex="0"
                                        class="speaker-card flex flex-col justify-between pt-[50px] relative w-[303px] h-[373px] text-center items-center cursor-pointer bg-[#ffffff] overflow-hidden rounded-lg"
                                        data-image="<?php echo esc_url($img); ?>"
                                        data-name="<?php echo esc_attr($name); ?>"
                                        data-position="<?php echo esc_attr($position); ?>"
                                        data-details="<?php echo esc_attr($description); ?>"
                                        data-url="<?php echo esc_url($url); ?>"
                                    >

                                        <div class="absolute h-[150px] w-[100%] overflow-hidden top-0">
                                            <img src="<?php echo esc_url($tribal); ?>" alt="" class="inset-0 w-full h-fit z-0 top-0">
                                        </div>

                                        <?php if ($img) : ?>
                                            <div class="relative rounded-full w-[180px] h-[180px] overflow-hidden bg-[#ECECEC] border border-[4px] border-[#ffffff]">
                                                <img
                                                    src="<?php echo esc_url($img); ?>"
                                                    alt="<?php echo esc_attr($name); ?>"
                                                    class="absolute bottom-0 left-0 w-full h-full object-cover z-20 rounded-br-[35px]"
                                                >
                                            </div>
                                        <?php endif; ?>

                                        <div class="flex flex-col gap-[20px] bottom-0 justify-between items-center w-full">
                                            <div class="px-[10px]">
                                                <?php if ($name) : ?>
                                                    <h3 class="text-[18px] font-bold text-[#0A8E3D]"><?php echo esc_html($name); ?></h3>
                                                <?php endif; ?>
                                                <?php if ($position) : ?>
                                                    <p class="text-[16px] text-[#2B2B2B]"><?php echo esc_html($position); ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="w-[100%] h-[20px] bg-[#70AC45]"></div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <?php endwhile; ?>

                </div>

                <!-- Modal -->
                <div id="speakerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <?php 
                        $tribal_corner_top =  wp_get_attachment_url(1236);
                        $tribal_corner_bot =  wp_get_attachment_url(1237);
                    ?>
                    <div class="bg-[#FFF9E6] rounded-lg shadow-lg w-[90%] max-w-[1280px] p-6 flex flex-col lg:flex-row justify-center items-center relative gap-4 py-[100px] px-[50px]">
                        <img
                            src="<?php echo esc_url($tribal_corner_top); ?>"
                            alt=""
                            class="absolute top-0 right-0 w-fit h-[50%] object-cover z-0"
                        >
                        <img
                            src="<?php echo esc_url($tribal_corner_bot); ?>"
                            alt=""
                            class="absolute bottom-0 left-0 w-fit h-[50%] object-cover z-0"
                        >
                        <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-3xl leading-none z-20 p-[10px] rounded-full bg-white">&times;</button>
                        <div class="flex gap-[10px] z-20">
                            <div class="relative rounded-full w-[180px] min-w-[180px] h-[180px] overflow-hidden bg-[#ECECEC] border border-[4px] border-[#ffffff]">
                                <img id="modalImage" src="" alt="" class="absolute bottom-0 left-0 w-full h-full object-cover z-20 rounded-br-[35px]">
                            </div>
                            <div class="flex flex-col gap-[40px] p-[20px] bg-white rounded-xl">
                                <div class="flex flex-col gap-[10px] pt-[20px]">
                                    <h3 id="modalName" class="text-[24px] font-bold text-[#0A8E3D]"></h3>
                                    <p id="modalPosition" class="text-[18px] font-bold text-[#2B2B2B]"></p>
                                </div>
                                <p id="modalDetails" class="text-[18px] text-[#2B2B2B]"></p>
                                <a id="modalUrl" href="#" target="_blank" class="hidden text-[13px] font-[500] text-[#1F773A] underline">View profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const modal          = document.getElementById("speakerModal");
                    const modalImage     = document.getElementById("modalImage");
                    const modalName      = document.getElementById("modalName");
                    const modalPosition  = document.getElementById("modalPosition");
                    const modalDetails   = document.getElementById("modalDetails");
                    const modalUrl       = document.getElementById("modalUrl");
                    const closeModal     = document.getElementById("closeModal");

                    document.querySelectorAll(".speaker-card").forEach(card => {
                        card.addEventListener("click", () => {
                            const url = card.getAttribute("data-url");

                            modalImage.src            = card.getAttribute("data-image");
                            modalImage.alt            = card.getAttribute("data-name");
                            modalName.textContent     = card.getAttribute("data-name");
                            modalPosition.textContent = card.getAttribute("data-position");
                            modalDetails.textContent  = card.getAttribute("data-details");

                            if (url) {
                                modalUrl.href = url;
                                modalUrl.classList.remove("hidden");
                            } else {
                                modalUrl.classList.add("hidden");
                            }

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

            <?php endif; ?>
        </div>
    </div>
</div>