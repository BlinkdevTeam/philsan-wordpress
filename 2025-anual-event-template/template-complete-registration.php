<?php 
/*
*Template Name: Complete Registration
*Template Post Type: 38th-convention
*/

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="mx-auto w-[1280px]">
    <div class="flex w-[100%] py-[20px]">
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
                                    readonly
                                    placeholder="Email address"
                                    class="w-full p-3 border bg-[beige] text-[#a9a9a9] text-[bolder] italic border-[2px] border-[#9e9e47]"
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
                                    id="last_name"
                                    name="last_name"
                                    type="text"
                                    required
                                    placeholder="Last Name"
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
                                    id="position"
                                    name="position"
                                    type="text"
                                    required
                                    placeholder="Position/Title"
                                    class="w-full p-3 border"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Agricultural License Number</p>
                                <input
                                    id="agri_license"
                                    name="agri_license"
                                    type="text"
                                    required
                                    placeholder="Agricultural License Number"
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
                                        <input type="radio" id="member_regular" name="membership" value="regular">
                                        <label for="member_regular">Regular</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="member_associate" name="membership" value="associate">
                                        <label for="member_associate">Associate</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="member_donor" name="membership" value="Donor">
                                        <label for="member_donor">Donor</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="non_member" name="membership" value="non_member" required>
                                        <label for="non_member">Not a member</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Souvenir Program -->
                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Souvenir Program</p>
                                <div class="flex gap-[20px]">
                                    <div>
                                        <input type="radio" id="sv_printed" name="souvenir" value="printed" required>
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
                                        <input type="radio" id="cert_yes" name="certificate_needed" value="yes" required>
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
                                        <input type="radio" id="sponsored_yes" name="sponsored" value="yes" required>
                                        <label for="sponsored_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sponsored_no" name="sponsored" value="no">
                                        <label for="sponsored_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Sponsors -->
                             asdf
                            <?php get_template_part('2025-anual-event-template/fields/sponsors-fields'); ?>
                            

                            <div class="flex flex-col">
                                <p class="sub-bi-heading text-[#344054]">Please upload your proof of payment</p>
                                <div id="upload-area" class="flex items-center justify-center w-[100%] p-[50px] rounded-[20px] bg-[#e2e1e1] cursor-pointer">
                                    <span id="upload-text">Upload</span>
                                </div>
                                  <!-- Hidden file input -->
                                <input type="file" id="file-input" class="hidden" accept="image/*" required/>
                            </div>
                        </div>
                    </div>
                    <!-- agreement section -->
                    <div class="flex">
                        <p class="sub-bi-heading text-[#344054]">* Include a Data Privacy Statement and Photo/Video Consent agreement</p>
                        <div>
                            <input
                                id="agreement"
                                name="agreement"
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
        emailjs.init("sOTpCYbD5KllwgbCD"); 
    })();

    const params = new URLSearchParams(window.location.search);
    const token = params.get('t');

    if(token) {
        
        //FILTER EMAIL FROM VERFICAITION DATABASE
        fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_email_verification', {
            method: 'GET',
            headers: {
                'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                'Content-Type': 'application/json',
            }
        })
        .then(res => res.json())
        .then(data => {
            const matchData = data.find(i => i.token === token);
            
            if(matchData) {
                document.querySelector('input[name="email"]').value = matchData.email;

                //Filter the email from the registration database
                fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_registration_2025', {
                    method: 'GET',
                    headers: {
                    'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                    'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const alreadyInregistration = data.find(i => i.email === matchData.email);

                    if(alreadyInregistration) {
                        window.location.href = "https://philsan.org/38th-convention/session-expired/";
                    } else { //else if email is not in registration meaning the user haven't submit a complete registration
                        document.getElementById('form-registration').addEventListener('submit', async function(e) {
                        e.preventDefault();

                        const first_name = document.getElementById("first_name").value
                        const middle_name = document.getElementById("middle_name").value
                        const last_name = document.getElementById("last_name").value
                        const mobile = document.getElementById("mobile").value
                        const company = document.getElementById("company").value
                        const position = document.getElementById("position").value
                        const agri_license = document.getElementById("agri_license").value

                        const membership = document.querySelector('input[name="membership"]:checked')?.value || null;
                        const souvenir = document.querySelector('input[name="souvenir"]:checked')?.value || null;
                        const certificate_needed = document.querySelector('input[name="certificate_needed"]:checked')?.value || null;
                        const sponsored = document.querySelector('input[name="sponsored"]:checked')?.value || null;
                        const sponsor = document.querySelector('input[name="sponsor"]:checked')?.value || null;

                        const fileInput = document.getElementById('file-input');
                        const file = fileInput.files[0];

                        let filePath = null;

                        // Upload file to storage
                        if (file) {
                            const uniqueFileName = `${Date.now()}_${file.name.replace(/\s+/g, "_")}`;
                            filePath = `proofs/${uniqueFileName}`;

                            const uploadResponse = await fetch("https://shvutlcgljqiidqxqrru.supabase.co/storage/v1/object/philsan-proof-of-payments/proofs/" + uniqueFileName, {
                                method: 'POST',
                                headers: {
                                    'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                                    'Content-Type': file.type
                                },
                                body: file
                            })
                        
                            if (!uploadResponse.ok) {
                                alert("File upload failed.");
                                return;
                            }
                        }

                        // Post form data to table
                        fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_registration_2025', {
                            method: 'POST',
                            headers: {
                                'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                                'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                                'Content-Type': 'application/json',
                                'Prefer': 'return=minimal'
                            },
                            body: JSON.stringify({ 
                                email: matchData.email,
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
                                reg_status: "pending",
                                token: matchData.token
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(error => { throw error });
                            }
                            console.log("response", response)
                            window.location.href = "https://philsan.org/38th-convention/registration-successful";
                        })
                        .catch(error => {
                            console.error("Supabase error:", error);
                            alert("Failed to submit form: " + (error.message || JSON.stringify(error)));
                        });
                    });
                    }
                })
            } else {
                window.location.href = "https://philsan.org/38th-convention/session-expired/";
            }
        })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
        
    } else {
        window.location.href = "https://philsan.org/404";
    }

    // Custom Upload field
    document.addEventListener("DOMContentLoaded", () => {
        const uploadArea = document.getElementById('upload-area');
        const fileInput = document.getElementById('file-input');
        const uploadText = document.getElementById('upload-text');

        console.log('uploadArea', uploadArea)
        console.log('fileInput', fileInput)
        console.log('uploadText', uploadText)

        uploadArea.addEventListener('click', () => {
            console.log("You are attempting to upload an image")
            fileInput.click(); 
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                uploadText.textContent = `Selected: ${fileInput.files[0].name}`;
            } else {
                uploadText.textContent = "Upload";
            }
        });
    });

</script>

<?php 
        }

get_footer(); 

?>
