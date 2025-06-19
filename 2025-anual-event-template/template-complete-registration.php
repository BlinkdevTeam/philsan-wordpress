<?php 
/*
*Template Name: Complete Registration
*Template Post Type: 38th-convention
*/

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] bg-cover bg-center h-[100vh] w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[1280px]">
        <div class="flex w-[100%] py-[50px]">
            <div class="w-[100%]">
                <form id="form-registration" class="text-black flex flex-col justify-center">
                    <div class="relative overflow-hidden  w-auto h-auto flex flex-col justify-center px-[50px] pt-[50px] pb-[200px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="w-[200px]">
                                <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-2-1.png" alt="Logo" class="mx-auto" />
                            </div>
                            <h2 class="text-[38px] text-[#1F773A] font-fraunces font-bold">Register</h2>
                        </div>
                        <div class="flex justify-between gap-[40px] pt-[20px]">

                            <?php get_template_part('2025-anual-event-template/fields/personal-info-fields'); ?>  
                            <!-- checkbox section -->
                            <div class="w-[100%] flex flex-col gap-[15px]">

                                <?php get_template_part('2025-anual-event-template/fields/other-checkboxes'); ?>  

                                <!-- Sponsors -->
                                
                                <?php get_template_part('2025-anual-event-template/fields/sponsors-fields'); ?>  
                                <div class="flex flex-col w-[100%]">
                                    <p class="sub-bi-heading text-[#344054]">Please Specify your sponsor</p>
                                    <input
                                        id="other_sponsor"
                                        name="other_sponsor"
                                        type="text"
                                        required
                                        placeholder="Enter your sponsor"
                                        class="w-full p-3 border"
                                    />
                                </div>
                                
                                <div id="upload-field" class="flex flex-col transition-all duration-200 ease">
                                    <p id="upload-heading" class="sub-bi-heading text-[#344054]">Please upload your proof of payment if you don't have sponsor</p>
                                    <div id="upload-area" class="flex items-center justify-center w-[100%] p-[50px] rounded-[20px] bg-[#e2e1e1] cursor-pointer">
                                        <span id="upload-text">Upload</span>
                                    </div>
                                        <!-- Hidden file input -->
                                    <input id="file-input"  type="file" class="hidden" accept="image/*" required/>
                                </div>

                            </div>
                        </div>
                        <!-- agreement section -->
                        <div class="flex pt-[20px] items-center gap-[10px]">
                            <p class="sub-bi-heading text-[#344054]">* Include a Data Privacy Statement and Photo/Video Consent agreement</p>
                            <div>
                                <input
                                    id="agreement"
                                    name="agreement"
                                    type="checkbox"
                                    required
                                    class="w-[50px] h-[50px] p-3 border"
                                />
                            </div>
                        </div>
                        <div class="flex gap-[20px]">
                            <button type="submit" class="hover:bg-[#32bd49] py-3 w-[148px] h-[60px] submit bg-[#959595] rounded-[8px] text-[#ffffff] cursor-pointer">Submit</button>
                            <div id="spinner" class="hidden flex items-center justify-center">
                            <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-500 border-t-green-600"></div>
                            </div>
                        </div>
                    <?php get_template_part('2025-anual-event-template/components/poster-image'); ?>  
                </div>
            </form>
            </div>
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
    const spinner = document.getElementById('spinner');

    if(token) {
        console.log("token", token)
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
                    } else { 
                        //this is the trigger of submit
                        //else if email is not in registration meaning the user haven't submit a complete registration
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
                        // const sponsored = document.querySelector('input[name="sponsored"]:checked')?.value || null;
                        // const sponsor = document.querySelector('input[name="sponsor"]:checked')?.value || null;
                        // const sponsor = document.querySelector('#sponsor')?.value || null;
                        const sponsor = document.getElementById('sponsor-select')?.value || null;

                        const uploadArea = document.getElementById('upload-area');
                        const uploadHeading = document.getElementById('upload-heading');

                        const fileInput = document.getElementById('file-input');
                        const file = fileInput.files[0];

                        let filePath = null;

                        if (sponsor) {
                            sponsor.addEventListener('change', () => {
                                if (sponsor.value === 'No Sponsor') {
                                    uploadArea.remove('border-[2px] border-color-[red]');
                                    uploadHeading.remove('color-[red]');
                                } else {
                                    if(!file) {
                                        uploadArea.add('border-[2px] border-color-[red]');
                                        uploadHeading.add('color-[red]');
                                    } else {
                                        uploadArea.remove('border-[2px] border-color-[red]');
                                        uploadHeading.remove('color-[red]');
                                    }
                                }
                            });
                        }
                        
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
                            
                            //trigger spinner
                            spinner.classList.remove("hidden");
                            if (!uploadResponse.ok) {
                                alert("File upload failed.");
                                return;
                            }
                        }

                        // Post the form data to table
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
                                sponsored: null,
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
                            spinner.classList.add("hidden");
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
         const uploadText = document.getElementById('upload-text');
         const fileInput = document.getElementById('file-input');
         const uploadHeading = document.getElementById('upload-heading');

        const sponsorSelect = document.getElementById('sponsor-select');
        const agreementContainer = document.getElementById('upload-field');

        if (sponsorSelect) {
        sponsorSelect.addEventListener('change', () => {
            if (sponsorSelect.value === 'No Sponsor') {
                agreementContainer.classList.remove('opacity-[0.5]');
                fileInput.setAttribute('required', 'true');
                fileInput.removeAttribute('disabled');
            } else {
                agreementContainer.classList.add('opacity-[0.5]');
                fileInput.removeAttribute('required');
                fileInput.setAttribute('disabled', 'true');
            }
        });
        }


        //for uploading of file

        if(uploadArea) {
            uploadArea.addEventListener('click', () => {
                console.log("You are attempting to upload an image")
                fileInput.click(); 
            });
        }

        if(fileInput) {
            fileInput.addEventListener('change', () => {
                if (fileInput.files.length > 0) {
                    uploadText.textContent = `Selected: ${fileInput.files[0].name}`;
                } else {
                    uploadText.textContent = "Upload";
                }
            });
        }
    });

</script>

<?php 
        }

get_footer(); 

?>
