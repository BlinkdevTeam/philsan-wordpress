<?php $form_shortcode = get_field('contact_form'); ?>

<div class="w-[90%] lg:w-[980px] mx-auto pb-[80px]">
    <div class="p-[50px] rounded-2xl bg-[#FCFCF0] flex flex-col lg:flex-row gap-[20px] mt-[-200px] z-[9] relative">
        <div class="flex flex-col gap-[20px] w-[100%] lg;w-[50%]">
            <h2 class="text-[32px] text-[#1F773A] font-[600]">Get in touch with us. We’re here to assist you.</h2>
            <p class="text-[18px] text-[#2F2F2F]">Lorem ipsum dolor sit amet consectetur. Sit integer gravida non ullamcorper. Porttitor volutpat commodo auctor nisi nibh sem proin turpis. Velit amet molestie justo massa diam.</p>
        </div>
        <?php if($form_shortcode): ?>
            <?php echo do_shortcode($form_shortcode); ?>
        <?php endif; ?>
    </div>
</div>