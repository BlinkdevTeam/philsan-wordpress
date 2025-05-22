<?php 

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="mx-auto w-[1280px]">
    <div class="flex w-[100%] py-[20px]">
        <div class="bg-[#F6F5F3] w-[50%] p-[50px] flex justify-center items-center">
            <div class="flex flex-col gap-[20px]">
                <h2 class="text-[38px]">Philsan</h2>
                <h1 class="text-[48px] font-bold">Philippine Society of Animal Nutritionists' 38ᵗʰ ANNUAL CONVENTION</h1>
                <p class="text-[18px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="w-[50%]">
          <form id="email-verification" class="text-black flex flex-col justify-center">
              <div class="w-auto h-auto flex flex-col justify-center px-8 md:px-20 lg:px-24 py-12 rounded space-y-6 text-start">
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
                  <div class="flex flex-col">
                      <p class="sub-bi-heading text-[#344054]">Are you a Philsan Member</p>
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
                      <p class="sub-bi-heading text-[#344054]">Sponsored Registration</p>
                      <input
                          id="sponsored"
                          name="sponsored"
                          type="checkbox"
                          required
                          placeholder="Sponsored Registration"
                          class="w-full p-3 border"
                      />
                  </div>
                  <div class="flex flex-col">
                      <p class="sub-bi-heading text-[#344054]">Souvenir Program</p>
                      <input
                          id="souvenir"
                          name="souvenir"
                          type="checkbox"
                          required
                          placeholder="Souvenir Program"
                          class="w-full p-3 border"
                      />
                  </div>
                   <div class="flex flex-col">
                      <p class="sub-bi-heading text-[#344054]">Do you need a Certificate of Attendance?</p>
                      <input
                          id="certificate"
                          name="certificate"
                          type="checkbox"
                          required
                          placeholder="Do you need a Certificate of Attendance"
                          class="w-full p-3 border"
                      />
                  </div>
                  <div class="flex flex-col">
                      <p class="sub-bi-heading text-[#344054]">* Include a Data Privacy Statement and Photo/Video Consent agreement</p>
                      <input
                          id="first_name"
                          name="first_name"
                          type="checkbox"
                          required
                          placeholder="First Name"
                          class="w-full p-3 border"
                      />
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

    function generateToken(length = 16) {
        const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let token = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            token += charset[randomIndex];
        }
        return token;
    }



    document.getElementById('email-verification').addEventListener('submit', function(e) {
    e.preventDefault();


    const token = generateToken(16);
    const email = document.getElementById("email").value

    console.log("email", email)
    console.log("Generated Token:", token);

    //this will be used to filter the email from the regsitration database
    fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_email_verification', {
      method: 'GET',
      headers: {
        'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
        'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
        'Content-Type': 'application/json',
      }
    })
    .then(response => response.json())
    .then(data => {
    console.log("Matching data:", data);
    })
    .catch(error => {
    console.error("Error fetching data:", error);
    });
    //---------------------------------------------


    fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_email_verification', {
      method: 'POST',
      headers: {
        'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
        'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
        'Content-Type': 'application/json',
        'Prefer': 'return=minimal'
      },
      body: JSON.stringify({ email, token })
    }).then(response => {
      if (response.ok) {
        // window.location.href = `/code-verification/?email=${encodeURIComponent(email)}`;
        emailjs.send('service_1qkyi2i', 'template_d71x79v', {
            email: email,
            verification_link: "https://beige-fly-587526.hostingersite.com/annual-event-registration?t=" + token
        })
            .then(function() {
                alert('Email sent successfully!');
            }, function(error) {
                console.error('FAILED...', error);
                alert('Email failed to send!');
            });
      } else {
        alert('Failed to store code.');
      }
    });
  });
</script>

<?php 
        }

get_footer(); 

?>
