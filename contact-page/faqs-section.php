<div id="faq-section" class="w-[900px] mx-auto">
    <div class="pb-[100px]">
        <div class="pb-[30px]">
            <h2 class="text-[32px] font-[800] text-[#1F773A] text-center">Frequently Asked Questions</h2>
        </div>
        <?php if ( have_rows('faqs') ): ?>
            <?php $faq_index = 0; // initialize counter ?>
            <?php while ( have_rows('faqs') ): the_row(); ?>
                <?php $faq_index++; // increment each loop ?>
                
                <div id="faq-group-<?php echo $faq_index; ?>" class="flex flex-col py-[20px] gap-[20px] border-b-[1px] border-b-[#CCCCCC]">
                    
                    <div 
                        id="faq-head-<?php echo $faq_index; ?>"
                        onclick="handleFaqAccordion('answer-<?php echo $faq_index; ?>', <?php echo $faq_index; ?>)"   
                        class="flex justify-between items-center cursor-pointer transition-all duration-300 ease group gap-[20px]"
                    >
                        <h6 class="text-[24px] text-[#000000] font-[600] group-hover:text-[#1F773A] transition-all duration-300 ease">
                            <?php the_sub_field('question'); ?>
                        </h6>
                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.8579 1.54541L7.92041 7.48291C7.86526 7.53811 7.79978 7.58191 7.7277 7.61179C7.65562 7.64167 7.57836 7.65705 7.50033 7.65705C7.4223 7.65705 7.34504 7.64167 7.27296 7.61179C7.20088 7.58191 7.1354 7.53811 7.08025 7.48291L1.14275 1.54541C1.03134 1.434 0.96875 1.28289 0.96875 1.12533C0.96875 0.96777 1.03134 0.816663 1.14275 0.705252C1.25416 0.59384 1.40527 0.53125 1.56283 0.53125C1.72039 0.53125 1.8715 0.59384 1.98291 0.705252L7.50033 6.22342L13.0178 0.705252C13.0729 0.650086 13.1384 0.606327 13.2105 0.576471C13.2826 0.546616 13.3598 0.53125 13.4378 0.53125C13.5158 0.53125 13.5931 0.546616 13.6652 0.576471C13.7373 0.606327 13.8027 0.650086 13.8579 0.705252C13.9131 0.760417 13.9568 0.825908 13.9867 0.897985C14.0165 0.970062 14.0319 1.04731 14.0319 1.12533C14.0319 1.20335 14.0165 1.2806 13.9867 1.35267C13.9568 1.42475 13.9131 1.49024 13.8579 1.54541Z" fill="black"/>
                        </svg>
                    </div>

                    <div
                        style="height: 0;" 
                        id="answer-container-<?php echo $faq_index; ?>" 
                        class="answer-container h-[100%] overflow-hidden transition-all duration-300 ease"
                    >
                        <div id="answer-<?php echo $faq_index; ?>" class="answer text-[18px] text-[#2f2f2f]">
                            <?php the_sub_field('answer'); ?>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>