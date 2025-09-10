<div id="faq-section" class="w-[900px] mx-auto">
    <div class="pb-[100px]">
        <div>
            <h2 class="text-[32px] font-[600] text-[#1F773A]">Frequently Asked Questions</h2>
        </div>
        <?php if ( have_rows('faqs') ): ?>
            <?php $faq_index = 0; // initialize counter ?>
            <?php while ( have_rows('faqs') ): the_row(); ?>
                <?php $faq_index++; // increment each loop ?>
                
                <div id="faq-group-<?php echo $faq_index; ?>" class="flex flex-col p-[15px] lg:p-[20px] rounded-lg md:rounded-xl gap-[10px] lg:gap-[20px]">
                    
                    <div 
                        id="faq-head-<?php echo $faq_index; ?>"
                        onclick="handleFaqAcc('answer-<?php echo $faq_index; ?>', <?php echo $faq_index; ?>)"   
                        class="flex justify-between items-center cursor-pointer transition-all duration-300 ease group gap-[20px]"
                    >
                        <h6 class="text-[16px] lg:text-[18px] text-[#ffffff] font-[600] group-hover:text-[#ceab23] transition-all duration-300 ease">
                            <?php the_sub_field('question'); ?>
                        </h6>
                        <svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 2V30M2 16H30" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div
                        style="height: 0;" 
                        id="answer-container-<?php echo $faq_index; ?>" 
                        class="answer-container h-[100%] overflow-hidden transition-all duration-300 ease"
                    >
                        <div id="answer-<?php echo $faq_index; ?>" class="answer text-[12px] lg:text-[18px] text-[#ffffff]">
                            <?php the_sub_field('answer'); ?>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>