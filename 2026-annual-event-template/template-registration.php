<?php 
/*
*Template Name: Complete Registration
*Template Post Type: page, 39th-convention
*/

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="bg-[#f1efe8] min-h-screen w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[90%] lg:w-[900px]">
        <div class="flex w-[100%] py-[50px]">
            <div class="w-[100%] rounded-lg overflow-hidden shadow-lg grid md:grid-cols-[220px_1fr]" id="registration-wrapper">

                <!-- Step rail -->
                <div class="hidden md:flex flex-col bg-[#16572A] px-[24px] py-[28px] relative overflow-hidden">
                    <div class="absolute inset-0 opacity-[0.12]" style="background-image: repeating-linear-gradient(115deg, transparent 0px, transparent 18px, #ffffff 18px, #ffffff 19px);"></div>

                    <div class="relative z-[1]">
                        <div class="w-[120px] mb-[20px]">
                            <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-2-1.png" alt="Philsan logo" class="w-full" />
                        </div>
                        <p class="text-[12px] text-[#A9D4B4] mb-[4px]">38th annual convention</p>
                        <p class="text-[17px] font-[500] text-white mb-[28px] leading-[1.3]">Conference registration</p>

                        <div class="flex flex-col gap-[20px]">
                            <div class="flex gap-[12px]" id="step-1-indicator">
                                <div class="flex flex-col items-center">
                                    <div class="w-[26px] h-[26px] rounded-full bg-[#EDB221] text-[#412402] text-[12px] font-[500] flex items-center justify-center shrink-0" id="step-1-circle">1</div>
                                    <div class="w-[1.5px] flex-1 bg-white/25 mt-[6px]"></div>
                                </div>
                                <div class="pt-[2px]">
                                    <p class="text-[13.5px] font-[500] text-white mb-[2px]">Fill out form</p>
                                    <p class="text-[12px] text-[#A9D4B4] leading-[1.5]">Your details and payment proof</p>
                                </div>
                            </div>
                            <div class="flex gap-[12px]" id="step-2-indicator">
                                <div class="flex flex-col items-center">
                                    <div class="w-[26px] h-[26px] rounded-full bg-white/15 text-[#A9D4B4] text-[12px] font-[500] flex items-center justify-center shrink-0" id="step-2-circle">2</div>
                                </div>
                                <div class="pt-[2px]">
                                    <p class="text-[13.5px] font-[500] text-[#A9D4B4] mb-[2px]" id="step-2-label">Check email</p>
                                    <p class="text-[12px] text-[#A9D4B4]/70 leading-[1.5]">We'll send your QR code</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form panel -->
                <div class="bg-white px-[20px] md:px-[32px] py-[28px]" id="form-panel">

                    <div class="md:hidden flex items-center gap-[8px] mb-[16px]">
                        <span class="text-[12px] font-[500] text-[#16572A] bg-[#EAF3DE] px-[10px] py-[4px] rounded-full">Step 1 of 2</span>
                    </div>

                    <h1 class="text-[20px] font-[700] text-[#16572A] mb-[4px] font-fraunces">Register for the convention</h1>
                    <p class="text-[13px] text-[#5f5e5a] mb-[24px]">Fill out every section below to complete your registration.</p>

                    <form id="form-registration" class="flex flex-col">

                        <!-- Personal details -->
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

                        <div class="mb-[12px]">
                            <label for="email" class="text-[12.5px] text-[#344054] block mb-[4px]">Email address</label>
                            <input id="email" name="email" type="email" required placeholder="Email address" class="w-full p-[10px] rounded-md border-[1px] border-[#339544]" />
                            <p id="email-exist" class="hidden text-[12px] text-[#A32D2D] mt-[4px]">This email is already registered.</p>
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

                            <!-- Sponsor name (shown only if sponsored = yes) -->
                            <div id="sponsor-name-field" class="hidden mb-[16px]">
                                <label for="sponsor_name" class="text-[12.5px] text-[#344054] block mb-[4px]">Sponsor name</label>
                                <select id="sponsor_name" name="sponsor_name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544] mb-[8px]">
                                    <option value="">Select sponsor</option>
                                    <option value="Others">Others</option>
                                </select>
                                <input id="sponsor_name_other" name="sponsor_name_other" type="text" placeholder="Enter sponsor name" class="w-full p-[10px] rounded-md border-[1px] border-[#339544] hidden" />
                            </div>

                            <!-- Payment details + upload (shown only if sponsored = no) -->
                            <div id="payment-section">
                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12.5px] font-[700] text-[#344054] mb-[6px]">Regular rate <span class="italic font-[300] text-[11px]">(exclusive of tax)</span></p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        PHILSAN members: <strong class="font-[600]">PHP 6,500/pax</strong><br>
                                        Non-PHILSAN members: <strong class="font-[600]">PHP 7,000/pax</strong><br>
                                        Foreigner: <strong class="font-[600]">USD 125/pax</strong><br>
                                        Students: <strong class="font-[600]">PHP 3,500/pax</strong> with valid Agriculture or VetMed student ID
                                    </p>
                                </div>

                                <div class="bg-[#f7f6f1] rounded-md p-[14px] mb-[14px]">
                                    <p class="text-[12.5px] font-[700] text-[#344054] mb-[6px]">Bank details</p>
                                    <p class="text-[12px] text-[#5f5e5a] leading-[1.7]">
                                        Account name: <strong class="font-[600]">Philippine Society of Animal Nutritionists Inc.</strong><br>
                                        Bank: <strong class="font-[600]">Bank of the Philippine Islands (BPI)</strong><br>
                                        PHP account: <strong class="font-[600]">1593-0964-98</strong> &middot; USD account: <strong class="font-[600]">001594-0469-07</strong><br>
                                        SWIFT code: <strong class="font-[600]">BOPIPHMM</strong>
                                    </p>
                                </div>

                                <label for="file-input" id="upload-area" class="flex flex-col items-center justify-center gap-[6px] w-full p-[18px] rounded-md border-dashed border-[1.5px] border-[#339544] bg-white cursor-pointer text-center">
                                    <i class="ti ti-upload text-[20px] text-[#339544]"></i>
                                    <span id="upload-text" class="text-[13px] text-[#344054]">Upload proof of payment</span>
                                </label>
                                <input name="upload-input-field" id="file-input" type="file" class="hidden" accept="image/*" />
                            </div>
                        </div>

                        <!-- Agreement -->
                        <div class="flex items-start gap-[10px] mb-[20px]">
                            <input id="agreement" name="agreement" type="checkbox" required class="w-[18px] h-[18px] mt-[2px] border-[1px] border-[#339544]" />
                            <label for="agreement" class="text-[11.5px] text-[#5f5e5a] leading-[1.6]">
                                I confirm my participation is voluntary and that the information provided is true and correct. I agree to the processing of my personal data under the PHILSAN Data Privacy Statement and the Data Privacy Act of 2012, and I allow PHILSAN to use photos and videos of me taken during the event for convention-related purposes only.
                            </label>
                        </div>

                        <div class="flex gap-[16px] items-center">
                            <button id="submit-button" type="submit" class="inline-flex items-center gap-[8px] py-[11px] px-[28px] bg-[#16572A] hover:bg-[#EDB221] text-white cursor-pointer rounded-tl-[30px] rounded-br-[30px] text-[14px] font-[500] font-fraunces">
                                Submit
                                <i class="ti ti-arrow-right text-[15px]"></i>
                            </button>
                            <div id="spinner" class="hidden flex items-center justify-center">
                                <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-500 border-t-green-600"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Confirmation panel (hidden until successful submit) -->
                <div class="hidden bg-white px-[20px] md:px-[32px] py-[60px] flex flex-col items-center justify-center text-center" id="confirmation-panel">
                    <div class="w-[56px] h-[56px] rounded-full bg-[#EAF3DE] flex items-center justify-center mb-[16px]">
                        <i class="ti ti-mail-opened text-[26px] text-[#16572A]"></i>
                    </div>
                    <p class="text-[19px] font-[700] text-[#16572A] mb-[8px] font-fraunces">Your registration is under review</p>
                    <p class="text-[13.5px] text-[#5f5e5a] max-w-[420px] leading-[1.7]">We've received your registration and sent a confirmation to your email. Our team will review it shortly — once approved, you'll receive another email with your QR code.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
const SUPABASE_URL = 'https://pskballrwzdbovtylgjs.supabase.co';
const SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBza2JhbGxyd3pkYm92dHlsZ2pzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODE2MzU4MTAsImV4cCI6MjA5NzIxMTgxMH0.LhtBD_E8aEUHLI4UAFqQ5-3_iVqwOLYN5TklbCDDeIg';

// Edge Function that sends the "your registration is under review" email
// right after a successful submit. This does NOT send the QR code — that
// happens later, in a separate function called by the admin dashboard once
// a registration is approved.
//
// TODO: replace this URL once the send-registration-received function is
// deployed. The bright-api / send-confirmation-email function from earlier
// testing is being repurposed as the *approval* email and is called from the
// admin dashboard, not from here.
const SEND_REGISTRATION_RECEIVED_URL = ''; // e.g. `${SUPABASE_URL}/functions/v1/send-registration-received`

// Calls the Edge Function that emails the registrant confirming their
// registration was received and is under review.
async function sendRegistrationReceivedEmail(registration) {
    if (!SEND_REGISTRATION_RECEIVED_URL) {
        console.warn('sendRegistrationReceivedEmail: SEND_REGISTRATION_RECEIVED_URL not set yet, skipping email send (Edge Function not deployed).');
        return { skipped: true };
    }

    const response = await fetch(SEND_REGISTRATION_RECEIVED_URL, {
        method: 'POST',
        headers: {
            'apikey': SUPABASE_KEY,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(registration)
    });

    if (!response.ok) {
        const error = await response.json().catch(() => ({}));
        throw new Error(error.message || 'Failed to send registration-received email.');
    }

    return response.json();
}

document.addEventListener('DOMContentLoaded', () => {

    // Toggle sponsor name field vs payment section
    const sponsoredYes = document.getElementById('sponsored_yes');
    const sponsoredNo = document.getElementById('sponsored_no');
    const sponsorNameField = document.getElementById('sponsor-name-field');
    const paymentSection = document.getElementById('payment-section');
    const fileInput = document.getElementById('file-input');
    const sponsorSelect = document.getElementById('sponsor_name');
    const sponsorOther = document.getElementById('sponsor_name_other');

    function updateSponsorState() {
        if (sponsoredYes.checked) {
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
    sponsoredYes.addEventListener('change', updateSponsorState);
    sponsoredNo.addEventListener('change', updateSponsorState);
    updateSponsorState();

    sponsorSelect.addEventListener('change', () => {
        if (sponsorSelect.value === 'Others') {
            sponsorOther.classList.remove('hidden');
            sponsorOther.setAttribute('required', 'true');
        } else {
            sponsorOther.classList.add('hidden');
            sponsorOther.removeAttribute('required');
        }
    });

    // File upload label text
    const uploadText = document.getElementById('upload-text');
    fileInput.addEventListener('change', () => {
        uploadText.textContent = fileInput.files.length > 0 ? `Selected: ${fileInput.files[0].name}` : 'Upload proof of payment';
    });

    // Form submit
    const form = document.getElementById('form-registration');
    const spinner = document.getElementById('spinner');
    const emailInput = document.getElementById('email');
    const emailExistMsg = document.getElementById('email-exist');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        emailExistMsg.classList.add('hidden');
        spinner.classList.remove('hidden');

        const email = emailInput.value.trim();

        try {
            // Check for duplicate email before inserting
            const checkRes = await fetch(`${SUPABASE_URL}/rest/v1/participants?select=email&email=eq.${encodeURIComponent(email)}`, {
                headers: {
                    'apikey': SUPABASE_KEY,
                    'Authorization': `Bearer ${SUPABASE_KEY}`,
                    'Content-Type': 'application/json',
                }
            });
            const existing = await checkRes.json();

            if (existing && existing.length > 0) {
                emailExistMsg.classList.remove('hidden');
                spinner.classList.add('hidden');
                return;
            }

            const first_name = document.getElementById('first_name').value;
            const middle_name = document.getElementById('middle_name').value;
            const last_name = document.getElementById('last_name').value;
            const mobile = document.getElementById('mobile').value;
            const company = document.getElementById('company').value;
            const position = document.getElementById('position').value;
            const agri_license = document.getElementById('agri_license').value;

            const membership = document.querySelector('input[name="membership"]:checked')?.value || null;
            const souvenir = document.querySelector('input[name="souvenir"]:checked')?.value || null;
            const certificate_needed = document.querySelector('input[name="certificate_needed"]:checked')?.value || null;
            const sponsored = document.querySelector('input[name="sponsored"]:checked')?.value || 'no';

            let sponsor = null;
            if (sponsored === 'yes') {
                sponsor = sponsorSelect.value === 'Others' ? sponsorOther.value : sponsorSelect.value;
            }

            let filePath = null;
            const file = fileInput.files[0];

            if (sponsored === 'no' && file) {
                const uniqueFileName = `${Date.now()}_${file.name.replace(/\s+/g, '_')}`;
                filePath = `proofs/${uniqueFileName}`;

                const uploadResponse = await fetch(`${SUPABASE_URL}/storage/v1/object/philsan-proof-of-payments/${filePath}`, {
                    method: 'POST',
                    headers: {
                        'apikey': SUPABASE_KEY,
                        'Authorization': `Bearer ${SUPABASE_KEY}`,
                        'Content-Type': file.type
                    },
                    body: file
                });

                if (!uploadResponse.ok) {
                    alert('File upload failed.');
                    spinner.classList.add('hidden');
                    return;
                }
            }

            const insertResponse = await fetch(`${SUPABASE_URL}/rest/v1/participants`, {
                method: 'POST',
                headers: {
                    'apikey': SUPABASE_KEY,
                    'Authorization': `Bearer ${SUPABASE_KEY}`,
                    'Content-Type': 'application/json',
                    'Prefer': 'return=minimal'
                },
                body: JSON.stringify({
                    email,
                    first_name,
                    last_name,
                    middle_name,
                    mobile,
                    company,
                    position,
                    agri_license,
                    membership,
                    souvenir,
                    certificate_needed,
                    sponsored,
                    sponsor,
                    payment: filePath,
                    reg_request: new Date().toISOString(),
                    reg_status: 'pending'
                })
            });

            if (!insertResponse.ok) {
                const error = await insertResponse.json();
                throw error;
            }

            // Tell the registrant their submission was received and is under
            // review. They'll get a second, separate email later (approval
            // with QR link, or rejection with a reason) once an admin acts
            // on this in the dashboard — that part is not built yet.
            // Wrapped separately so an email failure doesn't undo a registration
            // that already succeeded in Supabase.
            try {
                await sendRegistrationReceivedEmail({
                    email,
                    first_name
                });
            } catch (emailError) {
                console.error('Registration-received email error:', emailError);
                // Registration is already saved — don't block the user here.
                // Once Resend is live, consider surfacing a soft warning instead of failing silently.
            }

            spinner.classList.add('hidden');

            // Swap form panel for confirmation panel, update step rail
            document.getElementById('form-panel').classList.add('hidden');
            document.getElementById('confirmation-panel').classList.remove('hidden');
            document.getElementById('step-1-circle').innerHTML = '<i class="ti ti-check" style="font-size:14px;"></i>';
            document.getElementById('step-1-circle').classList.remove('bg-[#EDB221]', 'text-[#412402]');
            document.getElementById('step-1-circle').classList.add('bg-[#0F6E56]', 'text-white');
            document.getElementById('step-2-circle').classList.remove('bg-white/15', 'text-[#A9D4B4]');
            document.getElementById('step-2-circle').classList.add('bg-[#EDB221]', 'text-[#412402]');
            document.getElementById('step-2-label').classList.remove('text-[#A9D4B4]');
            document.getElementById('step-2-label').classList.add('text-white');

        } catch (error) {
            console.error('Registration error:', error);
            alert('Failed to submit form: ' + (error.message || JSON.stringify(error)));
            spinner.classList.add('hidden');
        }
    });
});
</script>

<?php 
        }

get_footer(); 

?>