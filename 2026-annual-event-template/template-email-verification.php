<?php 
/*
*Template Name: 39th Email Verification
*Template Post Type: page, 39th-convention
*/

get_header();

    while (have_posts()) {

    the_post();
?>

<div class="registration-middle-content justify-center min-h-screen bg-[#f1efe8] w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[90%] md:w-[760px] flex items-center py-[60px]">
        <div class="flex w-[100%] h-max justify-center">

            <div class="w-[100%] rounded-lg overflow-hidden shadow-lg grid md:grid-cols-[240px_1fr]">

                <!-- Step rail -->
                <div class="hidden md:flex flex-col bg-[#16572A] px-[28px] py-[32px] relative overflow-hidden">
                    <!-- <div class="absolute inset-0 opacity-[0.12]" style="background-image: repeating-linear-gradient(115deg, transparent 0px, transparent 18px, #ffffff 18px, #ffffff 19px);"></div> -->

                    <div class="relative z-[1]">
                        <p class="text-[12px] tracking-wide text-[#A9D4B4] mb-[4px]">38th annual convention</p>
                        <p class="text-[18px] font-[500] text-white mb-[32px] leading-[1.3]">Conference registration</p>

                        <div class="flex flex-col gap-[24px]">
                            <div class="flex gap-[12px]">
                                <div class="flex flex-col items-center">
                                    <div class="w-[28px] h-[28px] rounded-full bg-[#EDB221] text-[#412402] text-[13px] font-[500] flex items-center justify-center shrink-0">1</div>
                                    <div class="w-[1.5px] flex-1 bg-white/25 mt-[6px]"></div>
                                </div>
                                <div class="pt-[3px]">
                                    <p class="text-[14px] font-[500] text-white mb-[2px]">Verify email</p>
                                    <p class="text-[12.5px] text-[#A9D4B4] leading-[1.5]">Confirm it's really you before we continue</p>
                                </div>
                            </div>
                            <div class="flex gap-[12px]">
                                <div class="flex flex-col items-center">
                                    <div class="w-[28px] h-[28px] rounded-full bg-white/15 text-[#A9D4B4] text-[13px] font-[500] flex items-center justify-center shrink-0">2</div>
                                </div>
                                <div class="pt-[3px]">
                                    <p class="text-[14px] font-[500] text-[#A9D4B4] mb-[2px]">Register</p>
                                    <p class="text-[12.5px] text-[#A9D4B4]/70 leading-[1.5]">Tell us a bit about yourself</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-[1] mt-auto flex items-center gap-[6px] text-[11.5px] text-[#A9D4B4] pt-[32px]">
                        <i class="ti ti-leaf text-[14px]"></i>
                        Philippine society of animal nutritionists
                    </div>
                </div>

                <!-- Form -->
                <div class="bg-white px-[24px] md:px-[32px] py-[36px]">
                    <form id="email-verification" class="flex flex-col">

                        <!-- Mobile-only step indicator -->
                        <div class="md:hidden flex items-center gap-[8px] mb-[16px]">
                            <span class="text-[12px] font-[500] text-[#16572A] bg-[#EAF3DE] px-[10px] py-[4px] rounded-full">Step 1 of 2</span>
                        </div>

                        <h1 class="text-[22px] font-[700] text-[#16572A] mb-[6px]">Let's verify your email</h1>
                        <p class="text-[13.5px] text-[#5f5e5a] mb-[24px] leading-[1.6]">We'll check this address before opening up the registration form.</p>

                        <label for="email" class="text-[13px] font-[500] text-[#344054] block mb-[6px]">Email address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            placeholder="you@email.com"
                            class="w-[100%] p-3 border rounded-md border-[#339544] mb-[28px]"
                        />

                        <div class="flex gap-[20px] items-center">
                            <button id="submit-button" type="submit" class="inline-flex items-center gap-[8px] py-[11px] px-[28px] submit bg-[#16572A] hover:bg-[#EDB221] text-white cursor-pointer rounded-tl-[30px] rounded-br-[30px] text-[14px] font-[500] font-fraunces">
                                Verify
                                <i class="ti ti-arrow-right text-[15px]"></i>
                            </button>
                            <div id="spinner" class="hidden flex items-center justify-center">
                                <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-500 border-t-green-600"></div>
                            </div>
                        </div>

                        <div class="mt-[28px] pt-[20px] border-t border-[#e5e3da] flex items-center gap-[8px] text-[12px] text-[#888780]">
                            <i class="ti ti-shield-check text-[15px]"></i>
                            We only use this to confirm your identity. No spam.
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('email-verification').addEventListener('submit', function(e) {
        e.preventDefault();

        const spinner = document.getElementById('spinner');
        const email = document.getElementById('email').value;

        spinner.classList.remove('hidden');

        // TODO: add verification logic here (e.g. check email, send verification link)
        console.log('Submitted email:', email);
    });
</script>

<?php 
        }

get_footer(); 

?>