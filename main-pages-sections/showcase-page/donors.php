<?php
/**
 * Template Name: Donor Members Page
 */
get_header();
?>

<div class="custom-container">
    <div class="py-[50px]">

        <div class="">
            <div class="w-[100%] flex flex-col justify-center items-center h-[100%]">
                <h2 class="text-[24px] md:text-[42px] font-[700] text-[#1F773A]">All Sponsors</h2>
            </div>
            <div class="flex justify-center gap-[5px] w-[90%] lg:w-[80%] xl:w-[800px] mx-auto pt-[20px]">
                <div class="relative flex items-center w-[100%] justify-end">
                    <svg class="absolute left-[10px]" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8477 21.75C6.19766 21.75 1.59766 17.15 1.59766 11.5C1.59766 5.85 6.19766 1.25 11.8477 1.25C17.4977 1.25 22.0977 5.85 22.0977 11.5C22.0977 17.15 17.4977 21.75 11.8477 21.75ZM11.8477 2.75C7.01766 2.75 3.09766 6.68 3.09766 11.5C3.09766 16.32 7.01766 20.25 11.8477 20.25C16.6777 20.25 20.5977 16.32 20.5977 11.5C20.5977 6.68 16.6777 2.75 11.8477 2.75Z" fill="#444242"/>
                        <path d="M22.3471 22.7499C22.1571 22.7499 21.9671 22.6799 21.8171 22.5299L19.8171 20.5299C19.5271 20.2399 19.5271 19.7599 19.8171 19.4699C20.1071 19.1799 20.5871 19.1799 20.8771 19.4699L22.8771 21.4699C23.1671 21.7599 23.1671 22.2399 22.8771 22.5299C22.7271 22.6799 22.5371 22.7499 22.3471 22.7499Z" fill="#444242"/>
                    </svg>
                    <input
                        id="donor-search"
                        class="pl-[40px] py-[10px] pr-[10px] text-[#000000] w-[100%] border-[1px] border-[#007831] rounded-l-full rounded-r-sm"
                        type="text"
                        placeholder="Search"
                        oninput="filterDonors()"
                    >
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-[50px] pt-[50px]">
            <?php if ( have_rows('donor_repeater') ) : ?>

                <p class="text-[13px] text-gray-400 -mb-[40px]" id="donor-count"></p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]" id="donor-grid">

                    <?php while ( have_rows('donor_repeater') ) : the_row(); ?>
                        <?php
                            $company_name = get_sub_field('donor_company');
                            $row_index    = get_row_index();

                            $search_data = strtolower($company_name);
                            $reps_raw    = get_sub_field('donor_representative');
                            if ( is_array($reps_raw) ) {
                                foreach ( $reps_raw as $r ) {
                                    $search_data .= ' ' . strtolower($r['representative_name'] ?? '');
                                }
                            }
                        ?>
                        <div
                            class="donor-card relative p-[20px] rounded-[8px] shadow cursor-pointer select-none"
                            data-search="<?php echo esc_attr($search_data); ?>"
                            onclick="toggleDonor('donor-detail-<?php echo $row_index; ?>', this)"
                        >
                            <div class="flex items-center justify-between gap-[10px]">
                                <?php if ( $company_name ) : ?>
                                    <p class="text-[16px] font-[600] text-[#1F773A]"><?php echo esc_html($company_name); ?></p>
                                <?php endif; ?>
                                <svg
                                    class="donor-chevron w-[18px] h-[18px] flex-shrink-0 transition-transform duration-300"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                >
                                    <path d="M5 7.5L10 12.5L15 7.5" stroke="#1F773A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div
                                id="donor-detail-<?php echo $row_index; ?>"
                                class="hidden absolute top-[100%] left-0 right-0 mt-[8px] z-[50] bg-white rounded-[8px] shadow-lg border border-gray-100 p-[10px] flex flex-col gap-[16px]"
                                onclick="event.stopPropagation()"
                            >
                                <?php if ( have_rows('donor_representative') ) : ?>
                                    <?php $rep_index = 0; $total_reps = is_array($reps_raw) ? count($reps_raw) : 0; ?>
                                    <?php while ( have_rows('donor_representative') ) : the_row(); ?>
                                        <?php
                                            $rep_name        = get_sub_field('representative_name');
                                            $rep_designation = get_sub_field('representative_designation');
                                            $rep_email       = get_sub_field('representative_email');
                                            $rep_contact     = get_sub_field('representative_contact');
                                            $rep_index++;
                                        ?>

                                        <div class="flex flex-col gap-[4px]">
                                            <?php if ( $rep_name ) : ?>
                                                <p class="text-[14px] font-[600] text-[#1a1a1a]"><?php echo esc_html($rep_name); ?></p>
                                            <?php endif; ?>
                                            <?php if ( $rep_designation ) : ?>
                                                <p class="text-[12px] text-gray-400"><?php echo esc_html($rep_designation); ?></p>
                                            <?php endif; ?>
                                            <?php if ( $rep_email ) : ?>
                                                <a href="mailto:<?php echo esc_attr($rep_email); ?>" class="text-[12px] text-[#1F773A] hover:underline break-all">
                                                    <?php echo esc_html($rep_email); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ( $rep_contact ) : ?>
                                                <p class="text-[12px] text-gray-500"><?php echo esc_html($rep_contact); ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ( $rep_index < $total_reps ) : ?>
                                            <hr class="border-t border-gray-100">
                                        <?php endif; ?>

                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <p class="text-[12px] text-gray-400">No representatives listed.</p>
                                <?php endif; ?>
                            </div>

                        </div><!-- .donor-card -->

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                </div><!-- grid -->

            <?php endif; ?>
        </div>

    </div>
</div>

<script>
(function () {
    var cards = document.querySelectorAll('.donor-card');
    var currentOpen = null; // tracks the currently open detail id

    function updateCount(visible) {
        var el = document.getElementById('donor-count');
        if (el) {
            el.textContent = visible + ' donor' + (visible !== 1 ? 's' : '') + ' found';
        }
    }

    updateCount(cards.length);

    // Close dropdown when clicking outside any card
    document.addEventListener('click', function (e) {
        if (currentOpen && !e.target.closest('.donor-card')) {
            closeDropdown(currentOpen);
            currentOpen = null;
        }
    });

    function closeDropdown(id) {
        var detail  = document.getElementById(id);
        var card    = detail ? detail.closest('.donor-card') : null;
        var chevron = card ? card.querySelector('.donor-chevron') : null;
        if (detail)  detail.classList.add('hidden');
        if (chevron) chevron.style.transform = '';
    }

    window.filterDonors = function () {
        var q = document.getElementById('donor-search').value.toLowerCase().trim();
        var visible = 0;
        cards.forEach(function (card) {
            var data = card.getAttribute('data-search') || '';
            var show = !q || data.indexOf(q) !== -1;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        updateCount(visible);
    };

    window.toggleDonor = function (id, card) {
        var detail  = document.getElementById(id);
        var chevron = card.querySelector('.donor-chevron');
        if (!detail) return;

        var isOpen = !detail.classList.contains('hidden');

        // Close the currently open dropdown if it's a different one
        if (currentOpen && currentOpen !== id) {
            closeDropdown(currentOpen);
            currentOpen = null;
        }

        // Toggle the clicked dropdown
        if (isOpen) {
            detail.classList.add('hidden');
            chevron.style.transform = '';
            currentOpen = null;
        } else {
            detail.classList.remove('hidden');
            chevron.style.transform = 'rotate(180deg)';
            currentOpen = id;
        }
    };
})();
</script>

<?php get_footer(); ?>
