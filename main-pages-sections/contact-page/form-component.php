<?php $form_shortcode = get_field('contact_form'); ?>

<div class="w-[90%] lg:w-[720px] mx-auto pb-[80px]">
    <div class="p-[30px] md:p-[50px] rounded-2xl bg-[#FCFCF0] flex flex-col gap-[20px] mt-[-170px] md:mt-[-200px] z-[9] relative">
        <div class="flex flex-col gap-[20px] w-[100%]">
            <h2 class="text-[24px] md:text-[32px] text-[#1F773A] font-[600]">Get in touch with us. We’re here to assist you.</h2>
        </div>
        <?php if($form_shortcode): ?>
            <?php echo do_shortcode($form_shortcode); ?>
        <?php endif; ?>
    </div>
</div>