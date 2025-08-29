<div class="history-section custom-container mx-auto px-6 py-12">
    <h2 class="text-[42px] font-bold text-[#1F773A] mb-[10px] text-center">Our History</h2>
    <p class="text-[18px] text-[#1F773A] mb-8 text-center">A glance at the past</p>

    <div class="space-y-12">
        <?php if ( have_rows('history_repeater') ): ?>
            <?php while ( have_rows('history_repeater') ): the_row(); ?>
                
                <div>
                    <h2 class="text-[16px] font-[700] text-[#1F773A] mb-4">
                        <?php the_sub_field("year"); // e.g. "1988" ?>
                    </h2>

                    <?php if ( have_rows('year_group') ): ?>
                        <ul class="space-y-3 border-l-2 border-[##1F773A] pl-6">
                            <?php while ( have_rows('year_group') ): the_row(); ?>
                                <li>
                                    <span class="font-bold">
                                        <?php the_sub_field("title"); // e.g. "June 28" ?>
                                    </span> 
                                    <?php the_sub_field("description"); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
