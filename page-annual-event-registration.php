<?php 

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="mx-auto w-[1280px]">
    <div class="flex w-[100%] py-[20px]">
        <!-- <div class="bg-[#F6F5F3] w-[50%] p-[50px] flex justify-center items-center">
            <div class="flex flex-col gap-[20px]">
                <h2 class="text-[38px]">Philsan</h2>
                <h1 class="text-[48px] font-bold">Philippine Society of Animal Nutritionists' 38ᵗʰ ANNUAL CONVENTION</h1>
                <p class="text-[18px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div> -->
        <div class="w-[100%]">
            <form id="form-registration" class="text-black flex flex-col justify-center">
                <div class="w-auto h-auto flex flex-col justify-center px-8 md:px-20 lg:px-24 py-12 rounded space-y-6 text-start">
                    <div class="flex justify-between gap-[40px]">
                        <div class="w-[100%] flex flex-col gap-[10px]">
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Your email</p>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    required
                                    placeholder="Email address"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">First Name</p>
                                <input
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                    required
                                    placeholder="First Name"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Middle Name</p>
                                <input
                                    id="middle_name"
                                    name="middle_name"
                                    type="text"
                                    required
                                    placeholder="Middle Name"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Last Name</p>
                                <input
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                    required
                                    placeholder="First Name"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Mobile Number</p>
                                <input
                                    id="mobile"
                                    name="mobile"
                                    type="text"
                                    required
                                    placeholder="Mobile NUmber"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Company</p>
                                <input
                                    id="company"
                                    name="company"
                                    type="text"
                                    required
                                    placeholder="Company"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Position Title</p>
                                <input
                                    id="position_title"
                                    name="position_title"
                                    type="text"
                                    required
                                    placeholder="Position/Title"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Agricultural Licence Number</p>
                                <input
                                    id="agri_licence"
                                    name="agri_licence"
                                    type="text"
                                    required
                                    placeholder="Agricultural Licence Number"
                                    class="w-full p-3 border"
                                />
                            </div>
                        </div>
                        <!-- checkbox section -->
                        <div class="w-[100%] flex flex-col gap-[15px]">
                            <!-- PHILSAN Member -->
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Are you a PHILSAN Member?</p>
                                <div class="flex gap-[20px]">
                                    <div>
                                        <input type="radio" id="philsan_yes" name="philsan_member" value="yes">
                                        <label for="philsan_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="philsan_no" name="philsan_member" value="no">
                                        <label for="philsan_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Souvenir Program -->
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Souvenir Program</p>
                                <div class="flex gap-[20px]">
                                    <div>
                                        <input type="radio" id="sv_printed" name="souvenir" value="printed">
                                        <label for="sv_printed">Printed (First 400 only)</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sv_digital" name="souvenir" value="digital">
                                        <label for="sv_digital">Digital</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Certificate of Attendance -->
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Do you need a Certificate of Attendance?</p>
                                <div class="flex gap-[20px]">
                                    <div>
                                        <input type="radio" id="cert_yes" name="certificate_needed" value="yes">
                                        <label for="cert_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="cert_no" name="certificate_needed" value="no">
                                        <label for="cert_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Sponsored Registration -->
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Sponsored Registration?</p>
                                <div class="flex gap-[20px]">
                                    <div>
                                        <input type="radio" id="sponsored_yes" name="sponsored" value="yes">
                                        <label for="sponsored_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sponsored_no" name="sponsored" value="no">
                                        <label for="sponsored_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Sponsors -->
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Who's your sponsor?</p>
                                <div class="flex flex-col gap-[10px]">
                                    <div>
                                        <input type="radio" id="a_company" name="sponsored" value="A Company">
                                        <label for="a_company">A Company</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="b_company" name="sponsored" value="B Company">
                                        <label for="b_company">B Company</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="c_company" name="sponsored" value="C Company">
                                        <label for="c_company">C Company</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="d_company" name="sponsored" value="D Company">
                                        <label for="d_company">D Company</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="e_company" name="sponsored" value="E Company">
                                        <label for="e_company">E Company</label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Please upload your proof of payment</p>
                                <div class="flex items-center justify-center w-[100%] p-[50px] rounded-[20px] bg-[#e2e1e1]">
                                    <span>Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- agreement section -->
                    <div class="flex">
                        <p class="sub-bi-heading text-[#344054]">* Include a Data Privacy Statement and Photo/Video Consent agreement</p>
                        <div>
                            <input
                                id="first_name"
                                name="first_name"
                                type="checkbox"
                                required
                                class="w-full p-3 border"
                            />
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="hover:bg-[#32bd49] py-3 w-[148px] h-[60px] submit bg-[#959595] rounded-[8px] text-[#ffffff] cursor-pointer">Submit</button>
                    </div>
              </div>
          </form>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<script>
    (function(){
        emailjs.init("sOTpCYbD5KllwgbCD"); // Replace with your Public Key
    })();



    document.getElementById('form-registration').addEventListener('submit', function(e) {
    e.preventDefault();

    const philsanMember = document.querySelector('input[name="philsan_member"]:checked')?.value || null;
    const souvenir = document.querySelector('input[name="souvenir"]:checked')?.value || null;
    const certificateNeeded = document.querySelector('input[name="certificate_needed"]:checked')?.value || null;
    const sponsored = document.querySelector('input[name="sponsored"]:checked')?.value || null;

    console.log("PHILSAN Member:", philsanMember);
    console.log("Souvenir:", souvenir);
    console.log("Certificate Needed:", certificateNeeded);
    console.log("Sponsored Registration:", sponsored);


    // fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_email_verification', {
    //   method: 'POST',
    //   headers: {
    //     'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
    //     'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
    //     'Content-Type': 'application/json',
    //     'Prefer': 'return=minimal'
    //   },
    //   body: JSON.stringify({ email, token })
    // })
    // .then(response => {
    //   if (response.ok) {
    //     emailjs.send('service_1qkyi2i', 'template_d71x79v', {
    //         email: email,
    //         verification_link: "https://beige-fly-587526.hostingersite.com/annual-event-registration?t=" + token
    //     })
    //         .then(function() {
    //             alert('Email sent successfully!');
    //         }, function(error) {
    //             console.error('FAILED...', error);
    //             alert('Email failed to send!');
    //         });
    //   } else {
    //     alert('Failed to store code.');
    //   }
    // });
  });
</script>

<?php 
        }

get_footer(); 

?>
