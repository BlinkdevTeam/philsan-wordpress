<div class="history-section custom-container xl:w-[80%] mx-auto px-6 py-12">
    <h2 class="text-[42px] font-bold text-[#1F773A] text-center">Our History</h2>
    <p class="text-[18px] font-[600] text-[#1F773A] mb-8 text-center">( a glance at the past )</p>

    <div class="flex flex-col gap-[80px] py-[50px]">
        <?php if ( have_rows('history_repeater') ): ?>
            <?php while ( have_rows('history_repeater') ): the_row(); ?>
                
                <div>
                    <h2 class="text-[42px] font-[700] text-[#1F773A] mb-4 text-center">
                        <?php the_sub_field("year"); // e.g. "1988" ?>
                    </h2>

                    <div class="flex">
                        <div class="w-[50%] image-container pr-6">
                            <div  class="w-[100%] h-[200px] md:h-[280px] lg:h-[300px] rounded-tl-2xl rounded-br-2xl overflow-hidden">
                                <img 
                                    class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition duration-300" 
                                    src="<?php echo get_sub_field('image'); ?>" 
                                    alt="two col image"
                                >
                            </div>
                        </div>

                        <?php if ( have_rows('year_group') ): ?>
                            <ul class="w-[50%] space-y-3 border-l-2 border-[#1F773A] pl-6">
                                <?php while ( have_rows('year_group') ): the_row(); ?>
                                    <li class="text-[16px]">
                                        <span class="font-bold">
                                            <?php the_sub_field("title"); // e.g. "June 28" ?>
                                        </span> 
                                        <?php the_sub_field("description"); ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
