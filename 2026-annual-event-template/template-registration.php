<?php 
/*
*Template Name: Complete Registration
*Template Post Type: page, 39th-convention
*/

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="bg-[#f1efe8] min-h-screen w-full relative flex flex-col gap-[20px] pt-[80px]">
    <div class="mx-auto w-[90%] lg:w-[900px]">
        <div class="flex w-[100%] py-[50px]">
            <div class="w-[100%] rounded-lg overflow-hidden shadow-lg grid md:grid-cols-[220px_1fr]" id="registration-wrapper">

                <!-- Step rail -->
                <div class="hidden md:flex flex-col bg-[#0F4D91] px-[24px] py-[28px] relative overflow-hidden self-stretch">
                    <div class="absolute inset-0 overflow-hidden">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/39th-blue-bg.php'; ?>
                    </div>
                    <div class="relative z-[1]">
                        <p class="text-[12px] text-[#D3AF36] mb-[4px]">39th annual convention</p>
                        <p class="text-[17px] font-[500] text-white mb-[28px] leading-[1.3]">Conference registration</p>
                        <div class="flex flex-col gap-[20px]">
                            <div class="flex gap-[12px]">
                                <div class="flex flex-col items-center">
                                    <div class="w-[26px] h-[26px] rounded-full bg-[#EDB221] text-[#412402] text-[12px] font-[500] flex items-center justify-center shrink-0 relative z-[10]" id="step-1-circle">1</div>
                                    <div class="w-[1.5px] flex-1 bg-white/25 mt-[6px]"></div>
                                </div>
                                <div class="pt-[2px]">
                                    <p class="text-[13.5px] font-[500] text-white mb-[2px]">Verify email</p>
                                    <p class="text-[12px] text-[#A9D4B4] leading-[1.5]">Confirm your email address</p>
                                </div>
                            </div>
                            <div class="flex gap-[12px]">
                                <div class="flex flex-col items-center">
                                    <div class="w-[26px] h-[26px] rounded-full bg-white/15 text-[#A9D4B4] text-[12px] font-[500] flex items-center justify-center shrink-0 relative z-[10]" id="step-2-circle">2</div>
                                    <div class="w-[1.5px] flex-1 bg-white/25 mt-[6px]"></div>
                                </div>
                                <div class="pt-[2px]">
                                    <p class="text-[13.5px] font-[500] text-[#A9D4B4] mb-[2px]" id="step-2-label">Fill out form</p>
                                    <p class="text-[12px] text-[#A9D4B4]/70 leading-[1.5]">Your details and payment</p>
                                </div>
                            </div>
                            <div class="flex gap-[12px]">
                                <div class="flex flex-col items-center">
                                    <div class="w-[26px] h-[26px] rounded-full bg-white/15 text-[#A9D4B4] text-[12px] font-[500] flex items-center justify-center shrink-0 relative z-[10]" id="step-3-circle">3</div>
                                </div>
                                <div class="pt-[2px]">
                                    <p class="text-[13.5px] font-[500] text-[#A9D4B4] mb-[2px]" id="step-3-label">Under review</p>
                                    <p class="text-[12px] text-[#A9D4B4]/70 leading-[1.5]">We'll notify you by email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 1: Email entry (default) -->
                <div class="relative bg-white px-[20px] md:px-[32px] py-[28px] overflow-hidden" id="email-entry-panel">
                    <div class="absolute right-[-120px] top-[-120px] z-[1]">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/tribal-template_01.php'; ?>
                    </div>
                    <div class="absolute left-[-130px] bottom-[-130px] z-[1]">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/tribal-template_02.php'; ?>
                    </div>
                    <div class="absolute right-[-120px] bottom-[-120px] z-[1]">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/tribal-template_03.php'; ?>
                    </div>
                    <div class="z-[10] relative">
                        <h1 class="text-[20px] font-[700] text-[#D3AF36] mb-[4px] font-fraunces">Register for the convention</h1>
                        <p class="text-[13px] text-[#5f5e5a] mb-[24px]">Enter your email address and we'll send you a verification link to get started.</p>
                        <div class="flex flex-col gap-[14px]">
                            <div>
                                <label for="verify-email-input" class="text-[12.5px] text-[#344054] block mb-[4px]">Email address</label>
                                <input id="verify-email-input" type="email" required placeholder="your@email.com"
                                    class="w-full p-[10px] rounded-md border-[1px] border-[#339544] text-[14px]" />
                                <p id="email-exist-msg" class="hidden text-[12px] text-[#A32D2D] mt-[4px]">This email is already registered.</p>
                                <p id="send-link-error" class="hidden text-[12px] text-[#A32D2D] mt-[4px]"></p>
                            </div>
                            <button id="send-link-btn" type="button"
                                class="group relative inline-flex items-center justify-center py-[11px] px-[28px] text-white cursor-pointer text-[14px] font-[500] font-fraunces rounded-md">
                                <span class="z-[10] relative group-hover:text-[#EDB221] transition-colors">Send verification link</span>
                                <i class="ti ti-send text-[15px] z-[10] relative group-hover:text-[#EDB221] transition-colors ml-[8px]"></i>
                                <div class="absolute inset-0 overflow-hidden">
                                    <?php include get_stylesheet_directory() . '/2026-annual-event-template/39th-blue-bg.php'; ?>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Panel 2: Link sent confirmation -->
                <div class="hidden bg-white px-[20px] md:px-[32px] py-[60px] flex flex-col items-center justify-center text-center" id="link-sent-panel">
                    <div class="w-[56px] h-[56px] rounded-full bg-[#EAF3DE] flex items-center justify-center mb-[16px]">
                        <i class="ti ti-mail-forward text-[26px] text-[#16572A]"></i>
                    </div>
                    <p class="text-[19px] font-[700] text-[#D3AF36] mb-[8px] font-fraunces">Check your inbox</p>
                    <p class="text-[13.5px] text-[#5f5e5a] max-w-[380px] leading-[1.7]" id="link-sent-desc">
                        We sent a verification link to your email. Click the button in the email to continue with your registration.
                    </p>
                    <p class="text-[12px] text-[#888780] mt-[16px]">Didn't receive it? Check your spam folder, or
                        <button id="resend-link-btn" type="button" class="text-[#16572A] underline">resend the link</button>.
                    </p>
                </div>

                <!-- Panel 3: Registration form (shown after email verification) -->
                <div class="hidden bg-white px-[20px] md:px-[32px] py-[28px]" id="form-panel">
                    <div class="flex items-center gap-[8px] bg-[#EAF3DE] px-[12px] py-[8px] rounded-md mb-[20px]">
                        <i class="ti ti-circle-check text-[16px] text-[#16572A]"></i>
                        <p class="text-[12.5px] text-[#16572A]">Email verified: <strong id="verified-email-display"></strong></p>
                    </div>
                    <h1 class="text-[20px] font-[700] text-[#16572A] mb-[4px] font-fraunces">Complete your registration</h1>
                    <p class="text-[13px] text-[#5f5e5a] mb-[24px]">Fill out every section below to complete your registration.</p>

                    <form id="form-registration" class="flex flex-col">
                        <div class="flex items-center gap-[8px] mb-[14px]">
                            <i class="ti ti-user text-[16px] text-[#16572A]"></i>
                            <p class="text-[13.5px] font-[500] text-[#16572A]">Personal details</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[12px] mb-[12px]">
                            <div>
                                <label for="first_name" class="text-[12.5px] text-[#344054] block mb-[4px]">First name</label>
                                <input id="first_name" name="first_name" type="text" required placeholder="First name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            </div>
                            <div>
                                <label for="middle_name" class="text-[12.5px] text-[#344054] block mb-[4px]">Middle name</label>
                                <input id="middle_name" name="middle_name" type="text" required placeholder="Middle name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[12px] mb-[12px]">
                            <div>
                                <label for="last_name" class="text-[12.5px] text-[#344054] block mb-[4px]">Last name</label>
                                <input id="last_name" name="last_name" type="text" required placeholder="Last name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            </div>
                            <div>
                                <label for="mobile" class="text-[12.5px] text-[#344054] block mb-[4px]">Mobile number</label>
                                <input id="mobile" name="mobile" type="text" required placeholder="Mobile number" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[12px] mb-[12px]">
                            <div>
                                <label for="company" class="text-[12.5px] text-[#344054] block mb-[4px]">Company</label>
                                <input id="company" name="company" type="text" required placeholder="Company" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            </div>
                            <div>
                                <label for="position" class="text-[12.5px] text-[#344054] block mb-[4px]">Position / title</label>
                                <input id="position" name="position" type="text" required placeholder="Position / title" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            </div>
                        </div>
                        <div class="mb-[20px]">
                            <label for="agri_license" class="text-[12.5px] text-[#344054] block mb-[4px]">Agriculturist license number <span class="italic text-[#888780]">(enter "N/A" if not applicable)</span></label>
                            <input id="agri_license" name="agri_license" type="text" required placeholder="License number" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                        </div>
                        <div class="mb-[20px]">
                            <label for="age" class="text-[12.5px] text-[#344054] block mb-[4px]">Age</label>
                            <select id="age" name="age" required class="w-full p-[10px] rounded-md border-[1px] border-[#339544] text-[14px]">
                                <option value="">Select age range</option>
                                <option value="20_and_below">20 and below</option>
                                <option value="21_30">21 – 30</option>
                                <option value="31_40">31 – 40</option>
                                <option value="41_50">41 – 50</option>
                                <option value="51_60">51 – 60</option>
                                <option value="61_70">61 – 70</option>
                                <option value="71_and_above">71 and above</option>
                            </select>
                        </div>

                        <!-- Attendance preferences -->
                        <div class="border-t border-[#e5e3da] pt-[18px] mb-[18px]">
                            <div class="flex items-center gap-[8px] mb-[14px]">
                                <i class="ti ti-list-check text-[16px] text-[#16572A]"></i>
                                <p class="text-[13.5px] font-[500] text-[#16572A]">Attendance preferences</p>
                            </div>
                            <div class="mb-[14px]">
                                <p class="text-[12.5px] text-[#344054] mb-[6px]">Are you a PHILSAN member?</p>
                                <div class="flex flex-wrap gap-[14px] text-[13px] text-[#344054]">
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="membership" value="regular" class="w-auto border-[#339544]" required>Regular</label>
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="membership" value="associate" class="w-auto border-[#339544]">Associate</label>
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="membership" value="Donor" class="w-auto border-[#339544]">Donor</label>
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="membership" value="non_member" class="w-auto border-[#339544]">Not a member</label>
                                </div>
                            </div>
                            <div class="mb-[14px]">
                                <p class="text-[12.5px] text-[#344054] mb-[6px]">Souvenir program copy?</p>
                                <div class="flex flex-wrap gap-[14px] text-[13px] text-[#344054]">
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="souvenir" value="no" class="w-auto border-[#339544]" required>No</label>
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="souvenir" value="digital" class="w-auto border-[#339544]">Digital copy (USB drive, limited slots)</label>
                                </div>
                            </div>
                            <div>
                                <p class="text-[12.5px] text-[#344054] mb-[2px]">Certificate of attendance needed?</p>
                                <p class="text-[11.5px] italic text-[#888780] mb-[6px]">Your name, as entered above, will appear on the certificate.</p>
                                <div class="flex flex-wrap gap-[14px] text-[13px] text-[#344054]">
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="certificate_needed" value="yes" class="w-auto border-[#339544]" required>Yes</label>
                                    <label class="flex items-center gap-[6px]"><input type="radio" name="certificate_needed" value="no" class="w-auto border-[#339544]">No</label>
                                </div>
                            </div>
                        </div>

                        <!-- Payment & sponsor -->
                        <div class="border-t border-[#e5e3da] pt-[18px] mb-[20px]">
                            <div class="flex items-center gap-[8px] mb-[14px]">
                                <i class="ti ti-receipt text-[16px] text-[#16572A]"></i>
                                <p class="text-[13.5px] font-[500] text-[#16572A]">Payment & sponsor</p>
                            </div>
                            <div class="mb-[16px]">
                                <p class="text-[12.5px] text-[#344054] mb-[6px]">Is your registration sponsored?</p>
                                <div class="flex flex-wrap gap-[14px] text-[13px] text-[#344054]">
                                    <label class="flex items-center gap-[6px]"><input type="radio" id="sponsored_no" name="sponsored" value="no" class="w-auto border-[#339544]" checked>No, I'm paying myself</label>
                                    <label class="flex items-center gap-[6px]"><input type="radio" id="sponsored_yes" name="sponsored" value="yes" class="w-auto border-[#339544]">Yes, a sponsor is covering my registration</label>
                                </div>
                            </div>
                            <div id="sponsor-name-field" class="hidden mb-[16px]">
                                <label for="sponsor_name" class="text-[12.5px] text-[#344054] block mb-[4px]">Sponsor name</label>
                                <select id="sponsor_name" name="sponsor_name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544] mb-[8px]">
                                    <option value="">Select sponsor</option>
                                    <option value="Others">Others</option>
                                </select>
                                <input id="sponsor_name_other" name="sponsor_name_other" type="text" placeholder="Enter sponsor name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544] hidden" />
                            </div>
                            <div id="payment-section">
                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12.5px] font-[700] text-[#344054] mb-[6px]">Early Bird rate <span class="italic font-[300] text-[11px]">(exclusive of tax)</span></p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        PHILSAN members: <strong class="font-[600]">PHP 6,000/pax</strong><br>
                                        Non-PHILSAN members: <strong class="font-[600]">PHP 6,500/pax</strong><br>
                                        Foreigner: <strong class="font-[600]">USD 120/pax</strong><br>
                                    </p>
                                </div>
                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12.5px] font-[700] text-[#344054] mb-[6px]">Regular rate<span class="italic font-[300] text-[11px]">(exclusive of tax)</span></p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        PHILSAN members: <strong class="font-[600]">PHP 6,500/pax</strong><br>
                                        Non-PHILSAN members: <strong class="font-[600]">PHP 7,000/pax</strong><br>
                                        Foreigner: <strong class="font-[600]">USD 130/pax</strong><br>
                                        Students: <strong class="font-[600]">PHP 3,500/pax</strong> with valid Agriculture or VetMed student ID
                                    </p>
                                </div>
                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        B.S. Students: <strong class="font-[600]">PHP 3,500/pax</strong> with valid Agriculture or Vet Med student ID
                                    </p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        <strong class="font-[600]">Rates are exclussive of tax</strong>
                                    </p>
                                </div>
                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12.5px] font-[700] text-[#344054] mb-[6px]">Convetion Registration Fee Includes:<span class="italic font-[300] text-[11px]">(exclusive of tax)</span></p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        1. <strong class="font-[600]">Convetion ID Badge</strong><br>
                                        2. <strong class="font-[600]">Certificatte of Attendance</strong><br>
                                        3. <strong class="font-[600]">Convention Bag</strong><br>
                                        4. <strong class="font-[600]">Souvenir</strong><br>
                                        5. <strong class="font-[600]">Morning and Afternoon Snacks and Coffee</strong><br>
                                        6. <strong class="font-[600]">Lunch Buffet</strong><br>
                                        7. <strong class="font-[600]">CPD units certificate (to be confirmed before the convention)</strong><br>
                                    </p>
                                </div>
                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12.5px] font-[700] text-[#344054] mb-[6px]">Bank details</p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        Account name: <strong class="font-[600]">Philippine Society of Animal Nutritionists Inc.</strong><br>
                                        Bank: <strong class="font-[600]">Bank of the Philippine Islands (BPI)</strong><br>
                                        PHP account: <strong class="font-[600]">1593-0964-98</strong> &middot; USD account: <strong class="font-[600]">001594-0469-07</strong><br>
                                        Address: <strong class="font-[600]">Alabang Town Center, Commerce Ave. corner Madrigal Ave., Ayala, Alabang Muntinlupa, 1780, Metro Manila, Philippines</strong>
                                        SWIFT code: <strong class="font-[600]">BOPIPHMM</strong>
                                    </p>
                                </div>
                                <label for="file-input" id="upload-area" class="flex flex-col items-center justify-center gap-[6px] w-full p-[18px] rounded-md border-dashed border-[1.5px] border-[#339544] bg-white cursor-pointer text-center">
                                    <i class="ti ti-upload text-[20px] text-[#339544]"></i>
                                    <span id="upload-text" class="text-[13px] text-[#344054]">Upload proof of payment</span>
                                </label>
                                <input name="upload-input-field" id="file-input" type="file" class="hidden" accept="image/*,.pdf" />
                            </div>
                        </div>

                        <!-- Agreement -->
                        <div class="flex items-start gap-[10px] mb-[20px]">
                            <input id="agreement" name="agreement" type="checkbox" required class="w-[18px] h-[18px] mt-[2px] border-[1px] border-[#339544]" />
                            <label for="agreement" class="text-[11.5px] text-[#5f5e5a] leading-[1.6]">
                                I confirm my participation is voluntary and that the information provided is true and correct. I agree to the processing of my personal data under the PHILSAN Data Privacy Statement and the Data Privacy Act of 2012, and I allow PHILSAN to use photos and videos of me taken during the event for convention-related purposes only.
                            </label>
                        </div>

                        <button id="submit-button" type="submit"
                            class="group relative inline-flex items-center justify-center py-[11px] px-[28px] text-white cursor-pointer text-[14px] font-[500] font-fraunces">
                            <span class="z-[10] relative group-hover:text-[#EDB221] transition-colors">Submit registration</span>
                            <i class="ti ti-arrow-right text-[15px] z-[10] relative group-hover:text-[#EDB221] transition-colors ml-[8px]"></i>
                            <div class="absolute inset-0 overflow-hidden">
                                <?php include get_stylesheet_directory() . '/2026-annual-event-template/39th-blue-bg.php'; ?>
                            </div>
                        </button>
                    </form>
                </div>

                <!-- Panel 4: Confirmation -->
                <div class="relative hidden bg-white px-[20px] md:px-[32px] py-[60px] flex flex-col items-center justify-center text-center overflow-hidden" id="confirmation-panel">
                    <div class="absolute right-[-150px] top-[-150px] 
                        md:right-[-120px] md:top-[-120px] z-[1]">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/tribal-template_01.php'; ?>
                    </div>
                    <div class="absolute left-[-160px] bottom-[-160px] 
                        md:left-[-130px] md:bottom-[-130px] z-[1]">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/tribal-template_02.php'; ?>
                    </div>
                    <div class="absolute right-[-150px] bottom-[-150px] 
                        md:right-[-120px] md:bottom-[-120px] z-[1]">
                        <?php include get_stylesheet_directory() . '/2026-annual-event-template/tribal-template_03.php'; ?>
                    </div>
                    <div class="w-[56px] h-[56px] rounded-full bg-[#EAF3DE] flex items-center justify-center mb-[16px]">
                        <i class="ti ti-mail-opened text-[26px] text-[#16572A]"></i>
                    </div>
                    <div class="z-[10] relative">
                        <p class="text-[19px] font-[700] text-[#16572A] mb-[8px] font-fraunces">Your registration is under review</p>
                        <p class="text-[13.5px] text-[#5f5e5a] max-w-[420px] leading-[1.7]">We've received your registration. Our team will review it shortly — once approved, you'll receive another email with your QR code.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
const SUPABASE_URL  = 'https://pskballrwzdbovtylgjs.supabase.co';
const SUPABASE_KEY  = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBza2JhbGxyd3pkYm92dHlsZ2pzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODE2MzU4MTAsImV4cCI6MjA5NzIxMTgxMH0.LhtBD_E8aEUHLI4UAFqQ5-3_iVqwOLYN5TklbCDDeIg';
const SEND_VERIFICATION_LINK_URL = `${SUPABASE_URL}/functions/v1/send-verification-link`;
const VERIFY_EMAIL_TOKEN_URL     = `${SUPABASE_URL}/functions/v1/verify-email-token`;

let verifiedEmail = sessionStorage.getItem('philsan_verified_email') || null;

// Shared class for completed step circles — includes relative + z-[10] so they sit above the SVG bg
const STEP_DONE_CLASS = 'w-[26px] h-[26px] rounded-full bg-[#0F6E56] text-white text-[12px] font-[500] flex items-center justify-center shrink-0 relative z-[10]';
const STEP_ACTIVE_CLASS = 'w-[26px] h-[26px] rounded-full bg-[#EDB221] text-[#412402] text-[12px] font-[500] flex items-center justify-center shrink-0 relative z-[10]';

function markStepDone(id) {
    const el = document.getElementById(id);
    if (el) {
        el.innerHTML = '<i class="ti ti-check" style="font-size:14px; color:white; display:flex; align-items:center; justify-content:center;"></i>';
        el.className = STEP_DONE_CLASS;
    }
}

function markStepActive(id) {
    const el = document.getElementById(id);
    if (el) {
        el.classList.remove('bg-white/15', 'text-[#A9D4B4]');
        el.classList.add('bg-[#EDB221]', 'text-[#412402]', 'relative', 'z-[50]');
    }
}

// ─── Show form panel + attach ALL form listeners ───────────────────────────
function showFormPanel(email) {
    document.getElementById('email-entry-panel').classList.add('hidden');
    document.getElementById('link-sent-panel').classList.add('hidden');
    document.getElementById('form-panel').classList.remove('hidden');
    document.getElementById('verified-email-display').textContent = email;

    // Step rail — step 1 done, step 2 active
    markStepDone('step-1-circle');
    markStepActive('step-2-circle');
    const l2 = document.getElementById('step-2-label');
    if (l2) { l2.classList.remove('text-[#A9D4B4]'); l2.classList.add('text-white'); }

    // Grab all form elements
    const sponsoredYes     = document.getElementById('sponsored_yes');
    const sponsoredNo      = document.getElementById('sponsored_no');
    const sponsorNameField = document.getElementById('sponsor-name-field');
    const paymentSection   = document.getElementById('payment-section');
    const fileInput        = document.getElementById('file-input');
    const sponsorSelect    = document.getElementById('sponsor_name');
    const sponsorOther     = document.getElementById('sponsor_name_other');
    const spinner          = document.getElementById('spinner');

    // Sponsor toggle
    function updateSponsorState() {
        if (sponsoredYes && sponsoredYes.checked) {
            sponsorNameField.classList.remove('hidden');
            paymentSection.classList.add('hidden');
            fileInput.removeAttribute('required');
            sponsorSelect.setAttribute('required', 'true');
        } else {
            sponsorNameField.classList.add('hidden');
            paymentSection.classList.remove('hidden');
            fileInput.setAttribute('required', 'true');
            sponsorSelect.removeAttribute('required');
            sponsorOther.removeAttribute('required');
        }
    }
    sponsoredYes?.addEventListener('change', updateSponsorState);
    sponsoredNo?.addEventListener('change', updateSponsorState);
    updateSponsorState();

    async function loadSponsors() {
        try {
            const res = await fetch(
                `${SUPABASE_URL}/rest/v1/sponsors?select=name&order=name.asc`,
                { headers: { 'apikey': SUPABASE_KEY, 'Content-Type': 'application/json' } }
            );
            const data = await res.json();
            if (Array.isArray(data)) {
                sponsorSelect.innerHTML = '<option value="">Select sponsor</option>';
                data.forEach(s => {
                    const opt = document.createElement('option');
                    opt.value = s.name;
                    opt.textContent = s.name;
                    sponsorSelect.appendChild(opt);
                });
                const othersOpt = document.createElement('option');
                othersOpt.value = 'Others';
                othersOpt.textContent = 'Others';
                sponsorSelect.appendChild(othersOpt);
            }
        } catch (err) {
            console.error('Failed to load sponsors:', err);
        }
    }
    loadSponsors();

    sponsorSelect?.addEventListener('change', () => {
        if (sponsorSelect.value === 'Others') {
            sponsorOther.classList.remove('hidden');
            sponsorOther.setAttribute('required', 'true');
        } else {
            sponsorOther.classList.add('hidden');
            sponsorOther.removeAttribute('required');
        }
    });

    // File upload label
    fileInput?.addEventListener('change', () => {
        document.getElementById('upload-text').textContent =
            fileInput.files.length > 0 ? `Selected: ${fileInput.files[0].name}` : 'Upload proof of payment';
    });

    // Form submit
    document.getElementById('form-registration').addEventListener('submit', async function(e) {
        e.preventDefault();
        if (!verifiedEmail) return;

        spinner?.classList.remove('hidden');

        const sponsored = document.querySelector('input[name="sponsored"]:checked')?.value || 'no';
        let sponsor = null;
        if (sponsored === 'yes') {
            sponsor = sponsorSelect.value === 'Others' ? sponsorOther.value : sponsorSelect.value;
        }

        try {
            let payment_proof = null;
            const file = fileInput?.files[0];

            if (sponsored === 'no' && file) {
                const filePath = `proofs/${Date.now()}_${file.name.replace(/\s+/g, '_')}`;
                const uploadRes = await fetch(`${SUPABASE_URL}/storage/v1/object/payment_proof/${filePath}`, {
                    method: 'POST',
                    headers: {
                        'apikey': SUPABASE_KEY,
                        'Authorization': `Bearer ${SUPABASE_KEY}`,
                        'Content-Type': file.type
                    },
                    body: file
                });
                if (!uploadRes.ok) {
                    alert('File upload failed. Please try again.');
                    spinner?.classList.add('hidden');
                    return;
                }
                payment_proof = filePath;
            }

            const insertRes = await fetch(`${SUPABASE_URL}/rest/v1/participants`, {
                method: 'POST',
                headers: {
                    'apikey': SUPABASE_KEY,
                    'Authorization': `Bearer ${SUPABASE_KEY}`,
                    'Content-Type': 'application/json',
                    'Prefer': 'return=minimal'
                },
                body: JSON.stringify({
                    email:              verifiedEmail.toLowerCase(),
                    first_name:         document.getElementById('first_name').value,
                    last_name:          document.getElementById('last_name').value,
                    middle_name:        document.getElementById('middle_name').value,
                    mobile:             document.getElementById('mobile').value,
                    company:            document.getElementById('company').value,
                    position:           document.getElementById('position').value,
                    agri_license:       document.getElementById('agri_license').value,
                    age:                document.getElementById('age').value,
                    membership:         document.querySelector('input[name="membership"]:checked')?.value || null,
                    souvenir:           document.querySelector('input[name="souvenir"]:checked')?.value || null,
                    certificate_needed: document.querySelector('input[name="certificate_needed"]:checked')?.value || null,
                    sponsored,
                    sponsor,
                    payment_proof,
                    reg_status: 'pending'
                })
            });

            if (!insertRes.ok) { const err = await insertRes.json(); throw err; }

            // Send "registration received" email — non-blocking
            try {
                await fetch(`${SUPABASE_URL}/functions/v1/send-registration-received`, {
                    method: 'POST',
                    headers: { 'apikey': SUPABASE_KEY, 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        email: verifiedEmail.toLowerCase(),
                        first_name: document.getElementById('first_name').value
                    })
                });
            } catch (emailErr) {
                console.error('Registration email error:', emailErr);
            }

            sessionStorage.removeItem('philsan_verified_email');
            spinner?.classList.add('hidden');

            try {
                document.getElementById('form-panel')?.classList.add('hidden');
                document.getElementById('confirmation-panel')?.classList.remove('hidden');
                markStepDone('step-1-circle');
                markStepDone('step-2-circle');
                markStepActive('step-3-circle');
            } catch(uiErr) {
                console.error('UI update error:', uiErr.message);
            }

        } catch (err) {
            console.error('Registration error:', err);
            alert('Failed to submit: ' + (err.message || JSON.stringify(err)));
            spinner?.classList.add('hidden');
        }
    });
}

// ─── DOMContentLoaded ──────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', async () => {

    // If already verified (returning from email link), show form immediately
    if (verifiedEmail) {
        showFormPanel(verifiedEmail);
    }

    // Check if arriving from a verification link
    const params = new URLSearchParams(window.location.search);
    const token  = params.get('token');
    const email  = params.get('email');

    if (token && email) {
        const entryPanel = document.getElementById('email-entry-panel');
        entryPanel.innerHTML = '<div class="flex items-center justify-center py-[60px]"><div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-300 border-t-green-600"></div></div>';

        try {
            const res  = await fetch(VERIFY_EMAIL_TOKEN_URL, {
                method: 'POST',
                headers: { 'apikey': SUPABASE_KEY, 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, token })
            });
            const data = await res.json();

            if (res.ok && data.success) {
                verifiedEmail = email;
                sessionStorage.setItem('philsan_verified_email', email);
                showFormPanel(email);
            } else {
                entryPanel.innerHTML = `
                    <div class="flex flex-col items-center justify-center py-[60px] text-center px-[20px]">
                        <i class="ti ti-link-off text-[40px] text-[#A32D2D] mb-[12px]"></i>
                        <p class="text-[17px] font-[700] text-[#A32D2D] mb-[8px]">Link invalid or expired</p>
                        <p class="text-[13px] text-[#5f5e5a] mb-[20px]">${data.error || 'This verification link is no longer valid.'}</p>
                        <button onclick="location.href=location.pathname" class="px-[20px] py-[10px] bg-[#16572A] text-white rounded-md text-[13.5px]">Request a new link</button>
                    </div>`;
            }
        } catch (err) {
            entryPanel.innerHTML = '<p class="text-[13px] text-[#A32D2D] p-[20px]">Something went wrong. Please try again.</p>';
        }

        window.history.replaceState({}, '', window.location.pathname);
    }

    // Email entry panel listeners
    const sendLinkBtn   = document.getElementById('send-link-btn');
    const resendLinkBtn = document.getElementById('resend-link-btn');
    const emailInput    = document.getElementById('verify-email-input');

    async function sendVerificationLink() {
        const email = emailInput.value.trim();
        if (!email) { emailInput.focus(); return; }

        document.getElementById('email-exist-msg').classList.add('hidden');
        document.getElementById('send-link-error').classList.add('hidden');
        sendLinkBtn.textContent = 'Sending…';
        sendLinkBtn.disabled = true;

        try {
            const checkRes = await fetch(
                `${SUPABASE_URL}/rest/v1/participants?select=email&email=ilike.${encodeURIComponent(email)}`,
                { headers: { 'apikey': SUPABASE_KEY, 'Content-Type': 'application/json' } }
            );
            const existing = await checkRes.json();
            if (existing && existing.length > 0) {
                document.getElementById('email-exist-msg').classList.remove('hidden');
                return;
            }

            const res  = await fetch(SEND_VERIFICATION_LINK_URL, {
                method: 'POST',
                headers: { 'apikey': SUPABASE_KEY, 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, registration_url: window.location.origin + window.location.pathname })
            });
            const data = await res.json();
            if (!res.ok) throw new Error(data.error || 'Failed to send link');

            document.getElementById('email-entry-panel').classList.add('hidden');
            const sentPanel = document.getElementById('link-sent-panel');
            sentPanel.classList.remove('hidden');
            document.getElementById('link-sent-desc').textContent =
                `We sent a verification link to ${email}. Click the button in the email to continue with your registration.`;

        } catch (err) {
            document.getElementById('send-link-error').textContent = err.message;
            document.getElementById('send-link-error').classList.remove('hidden');
        } finally {
            sendLinkBtn.textContent = 'Send verification link';
            sendLinkBtn.disabled = false;
        }
    }

    sendLinkBtn?.addEventListener('click', sendVerificationLink);
    resendLinkBtn?.addEventListener('click', () => {
        document.getElementById('link-sent-panel').classList.add('hidden');
        document.getElementById('email-entry-panel').classList.remove('hidden');
    });
});
</script>

<?php 
        }

get_footer(); 

?>
