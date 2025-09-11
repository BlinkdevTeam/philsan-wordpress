<?php 
/*
*Template Name: Complete Registration
*Template Post Type: page, 38th-convention
*/

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] min-h-screen bg-center w-full relative flex flex-col gap-[20px]">
    <div class="mx-auto w-[90%] lg:w-[1280px]">
        <div class="flex w-[100%] py-[50px]">
            <div class="w-[100%]">
                <form id="form-registration" class="text-black flex flex-col justify-center">
                    <div class="relative overflow-hidden  w-auto h-auto flex flex-col justify-center px-[20px] md:px-[50px] pt-[50px] pb-[200px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                        <div class="flex gap-[20px] justify-between items-center">
                            <div class="w-[25%] md:w-[200px]">
                                <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-2-1.png" alt="Logo" class="mx-auto" />
                            </div>
                            <h2 class="text-[22px] md:text-[38px] text-[#1F773A] font-fraunces font-bold">Register</h2>
                        </div>
                        <div class="flex flex-col lg:flex-row justify-between gap-[40px] pt-[20px]">

                            <div class="w-[100%]">
                                <?php get_template_part('2025-anual-event-template/fields/personal-info-fields'); ?>  

                                <?php get_template_part('2025-anual-event-template/fields/other-checkboxes'); ?>  
                            </div>
                            
                            <!-- checkbox section -->
                            <div class="w-[100%] flex flex-col gap-[15px]">

                                <?php 
                                // get_template_part('2025-anual-event-template/fields/other-checkboxes'); 
                                ?>  

                                <!-- Sponsors -->
                                
                                <?php get_template_part('2025-anual-event-template/fields/sponsors-fields'); ?>  
                                
                                <div id="specify-sponsor" class="flex flex-col w-[100%] opacity-[0.4]">
                                    <p class="sub-bi-heading text-[#344054]">Please Specify your sponsor if it's not on the list</p>
                                    <input
                                        id="other-sponsor"
                                        name="other-sponsor"
                                        type="text"
                                        required
                                        placeholder="Enter your sponsor"
                                        class="w-full p-3 border-[1px] border-[#339544] rounded-md"
                                        disabled
                                    />
                                </div>
                                
                                <div id="upload-field" class="pt-[20px] relative flex flex-col transition-all duration-200 ease">
                                    <div class="flex flex-col gap-[10px] justify-between">
                                        <!-- <div class="w-[50%] flex flex-col gap-[5px] pb-[10px] pr-[10px]">
                                            <p class="sub-bi-heading text-[#344054]"><strong class="font-[700]">EARLY BIRD RATE:</strong></p>
                                            <p class="sub-bi-heading text-[#344054] pb-[5px] italic">Deadline of Payment June 30, 2025</p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">PHILSAN Members: <strong class="font-[600]">PHP 5,600.00/pax </strong></p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Non-PHILSAN Members: <strong class="font-[600]">PHP 6,000.00/pax </strong></p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Foreigner:	<strong class="font-[600]">USD 110.00/pax</strong></p>
                                        </div> -->

                                        <div class="w-[100%] flex flex-col gap-[5px] pb-[20px]">
                                            <p class="sub-bi-heading text-[#344054] pb-[5px]"><strong class="font-[700]">REGULAR RATE:</strong></p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">PHILSAN Members: <strong class="font-[600]">PHP 6,500.00/pax</strong></p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Non-PHILSAN Members: <strong class="font-[600]">PHP 7,000.00/pax</p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Foreigner: <strong class="font-[600]">USD 125.00/pax</strong></p>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Students: <strong class="font-[600]">PHP 3,500.00/pax with valid Agriculture or VetMed Student ID</strong></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p><strong class="font-[300] text-[12px]">*Rates are exclusive of tax</strong></p>
                                        <p>Convention Registration Fee includes:</p>
                                        <ol class="">
                                            <li class="text-[14px] font-[300]">Convention ID Badge</li>
                                            <li class="text-[14px] font-[300]">Certificate of Attendance</li>
                                            <li class="text-[14px] font-[300]">Convention Bag</li>
                                            <li class="text-[14px] font-[300]">Souvenir Program</li>
                                            <li class="text-[14px] font-[300]">Morning and Afternoon Snacks and Coffee</li>
                                            <li class="text-[14px] font-[300]">Lunch Buffet</li>
                                            <li class="text-[14px] font-[300]">CPD units certificate (to be confirmed before the convention)</li>
                                        </ol>
                                    </div>
                                    <div class="w-[100%] flex flex-col gap-[6px] md:gap-[5px] pt-[15px] pb-[10px]">
                                        <p class="sub-bi-heading text-[#344054]">Account name: <strong class="font-[700]">Philippine Society of Animal Nutritionists Inc.</strong></p>
                                        <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Bank: <strong class="font-[600]">Bank of the Philippine Islands (BPI)</strong></p>
                                        <div>
                                            <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Account number:</p>
                                            <div class="flex flex-col">
                                                <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]"><strong class="font-[600]">1593-0964-98 (Philippine Peso Account)</strong></p>
                                                <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]"><strong class="font-[600]">001594-0469-07 (USD Account</strong>)</p>
                                            </div>
                                        </div>
                                        <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">Address: <strong class="font-[600]">Alabang Town Center, Commerce Ave. corner Madrigal Ave., Ayala Alabang, Muntinlupa, 1780, Metro Manila, Philippines</strong></p>
                                        <p class="sub-bi-heading text-[#344054] font-[300] text-[14px]">SWIFT Code: <strong class="font-[600]">BOPIPHMM</strong></p>
                                    </div>
                                    <p id="upload-heading" class="sub-bi-heading text-[#344054]">Please upload your proof of payment if you don't have sponsor.</p>
                                    <div id="upload-area" class="flex items-center justify-center w-[100%] p-[14px] rounded-md border-dashed border-[1px] border-[#339544] bg-[#ffffff] cursor-pointer">
                                        <span id="upload-text">Upload</span>
                                    </div>
                                        <!-- Hidden file input -->
                                    <input name="upload-input-field" id="file-input"  type="file" class="absolute opacity-[0] bottom-[20px] z-[-1]" accept="image/*" required/>
                                </div>

                                <!-- agreement section now-->
                                <div class="flex py-[30px] items-start gap-[10px] z-[1]">
                                    <input
                                        id="agreement"
                                        name="agreement"
                                        type="checkbox"
                                        required
                                        class="w-[40px] h-[30px]  border-[1px] border-[#339544]" 
                                    />
                                    <div class="flex flex-col gap-[10px]">
                                        <p class="sub-bi-heading text-[#344054] font-[200] text-[14px]">* I understand that my participation in the 38th PHILSAN Annual Convention is voluntary, and I may choose not to proceed.</p>
                                        <p class="sub-bi-heading text-[#344054] font-[200] text-[14px]">I confirm that the personal information I provide is true and correct. This information will be kept confidential and used only for the PHILSAN Convention and PRC CPD units application.</p>
                                        <p class="sub-bi-heading text-[#344054] font-[200] text-[14px]">I agree to the processing of my personal data based on the PHILSAN Data Privacy Statement and the Data Privacy Act of 2012.</p>
                                        <p class="sub-bi-heading text-[#344054] font-[200] text-[14px]">I also allow PHILSAN to take and use photos and videos of me during the event and use for purposes related to the convention only.</p>
                                    </div>
                                </div>
                                <div class="flex gap-[20px] items-center z-[1] justify-center md:justify-start">
                                    <button id="submit-button" type="submit" class="py-[10px] px-[40px]  w-[148px] h-[60px] submit bg-[#1F773A] hover:bg-[#EDB221] text-[#ffffff] cursor-pointer rounded-tl-[30px] rounded-br-[30px] font-fraunces">Submit</button>
                                    <div id="spinner" class="hidden flex items-center justify-center">
                                    <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-500 border-t-green-600"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- agreement section before it started here -->
                        
                    <div class="poster-image absolute bottom-[-135px] w-[100%] left-[0px] z-[0] opacity-[0.5]">
                        <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-3@3x-8-1-scaled.png" alt="">
                    </div>
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
            const matchData = data.flat().find(i => i.token === token);

            console.log("match data", matchData)
            conosle.log("dtaflat", data.flat();)
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

                    console.log("alreadyInreg", alreadyInregistration)
                    if(alreadyInregistration) {
                        window.location.href = "https://philsan.org/38th-annual-convention/session-expired/";
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
                        const othersSponsor = document.getElementById('other-sponsor')?.value || null;
                        const sponsorValue = document.getElementById('sponsor-select');
                        const sponsor = sponsorValue.value === "Others" ? othersSponsor : sponsorValue.value ;

                        console.log("others", othersSponsor)
                        console.log("sponsor", sponsor)

                        const fileInput = document.getElementById('file-input');
                        const file = fileInput.files[0];

                        let filePath = null;
                        
                        spinner.classList.remove("hidden");
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
                            window.location.href = "https://philsan.org/38th-annual-convention/registration-successful/";
                        })
                        .catch(error => {
                            console.error("Supabase error:", error);
                            alert("Failed to submit form: " + (error.message || JSON.stringify(error)));
                        });
                    });
                    }
                })
            } 
            // else {
            //      window.location.href = "https://philsan.org/38th-annual-convention/session-expired/";
            // }
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
         const otherSponsor = document.getElementById('other-sponsor');

        const sponsorSelect = document.getElementById('sponsor-select');
        const agreementContainer = document.getElementById('upload-field');
        const specifySponsor = document.getElementById('specify-sponsor');

        if (sponsorSelect) {
        sponsorSelect.addEventListener('change', () => {
            if (sponsorSelect.value === 'Non-Sponsored') {
                agreementContainer.classList.remove('opacity-[0.4]');
                fileInput.setAttribute('required', 'true');
                fileInput.removeAttribute('disabled');
                otherSponsor.removeAttribute('required');
                otherSponsor.classList.add('opacity-[0.4]');
                otherSponsor.setAttribute('disabled', 'true');
                specifySponsor.classList.add('opacity-[0.4]');
            } else if (sponsorSelect.value === 'Others') {
                agreementContainer.classList.add('opacity-[0.4]');
                fileInput.removeAttribute('required');
                fileInput.setAttribute('disabled', 'true');
                otherSponsor.setAttribute('required', 'true');
                otherSponsor.classList.remove('opacity-[0.4]');
                otherSponsor.removeAttribute('disabled');
                specifySponsor.classList.remove('opacity-[0.4]');
            } else {
                agreementContainer.classList.add('opacity-[0.4]');
                fileInput.removeAttribute('required');
                fileInput.setAttribute('disabled', 'true');
                otherSponsor.removeAttribute('required');
                otherSponsor.classList.add('opacity-[0.4]');
                otherSponsor.setAttribute('disabled', 'true');
                specifySponsor.classList.add('opacity-[0.4]');
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

        if (sponsorSelect) {
            fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_2025_sponsors', {
                headers: {
                    'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                    'Content-Type': 'application/json',
                    'Prefer': 'return=minimal'
                }
            })
            .then(res => res.json())
            .then(data => {
                const filtered = data
                    .filter(item =>
                        item.name !== "Non-Sponsored" && item.name !== "Others"
                    )
                    .sort((a, b) => a.sponsor_name.localeCompare(b.sponsor_name)); // ✅ Sort alphabetically

                sponsorSelect.innerHTML = `
                    <option value="Non-Sponsored" selected>Non-Sponsored</option>
                    <option value="Others">Others</option>
                `;

                filtered.forEach(sponsor => {
                    const option = document.createElement("option");
                    option.value = sponsor.sponsor_name;
                    option.textContent = sponsor.sponsor_name;
                    sponsorSelect.appendChild(option);
                });

                // ✅ Event listener stays the same
                sponsorSelect.addEventListener("change", (e) => {
                    const selectedSponsor = e.target.value;
                    console.log("Selected sponsor:", selectedSponsor);
                });
            })
        }
    });

</script>

<?php 
        }

get_footer(); 

?>
