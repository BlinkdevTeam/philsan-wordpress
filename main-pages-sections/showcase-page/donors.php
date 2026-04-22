<div class="custom-container">
    <div class="py-[50px]">
        <div class="flex flex-col gap-[50px] pt-[50px]">
            <?php if ( have_rows('donor_repeater') ): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
                    <?php while ( have_rows('donor_repeater') ): the_row(); ?>
                        <?php
                            $company_name = get_sub_field("donor_company");
                            $representative = get_sub_field("donor_representative");
                        ?>

                        <div>
                            <?php if ( $company_name) : ?>
                                <p class="text-[14px] font-[400]"><?php echo esc_html($company_name); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>