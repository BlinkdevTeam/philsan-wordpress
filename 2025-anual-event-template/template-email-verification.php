<?php 
/*
*Template Name: Verify Email
*Template Post Type: 38th-convention
*/

get_header();

    while (have_posts()) {

    the_post();
?>

<div class="bg-[url('https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png')] bg-cover bg-center h-[100vh] overflow-hidden w-full relative flex flex-col gap-[20px]">
  <div class="mx-auto w-[90%] xl:w-[1280px] h-[100vh] flex items-center">
      <div class="flex w-[100%] h-max">
          <div class="w-[50%] px-[50px] flex flex-col gap-[20px] justify-center items-center text-center">
              <img width="60%" src="https://philsan.org/wp-content/uploads/2025/06/Asset-2-1.png" alt="Logo" class="mx-auto" />
              <div class="flex flex-col justify-center items-center text-center gap-[20px]">
                  <p class="text-[22px] text-center font-poppins font-bold">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
                  <p class="text-[38px] font-bold text-[#1F773A] font-fraunces">September 30, 2025</p>
                  <div class="flex flex-col items-center bg-gradient-to-r from-[#1F773A] to-[#EDB221] w-max px-[90px] py-[10px] rounded-tl-[40px] rounded-br-[40px]">
                    <p class="text-[22px] text-[#ffffff] font-fraunces">Okada Manila Paranaque City,</p>
                    <p class="text-[22px] text-[#ffffff] font-fraunces">Philippines</p>
                  </div>
              </div>
          </div>
          <div class="flex w-[50%]">
              <form id="email-verification" class="w-[100%] text-black flex flex-col justify-center px-[50px]">
                  <div class="w-auto h-auto flex flex-col justify-center px-[50px] py-[50px] rounded text-start bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] shadow-lg rounded-lg">
                    <h2 class="text-[38px] text-[#1F773A] font-fraunces font-bold">Register</h2>
                    <div class="flex flex-col py-[20px]">
                        <p class="sub-bi-heading text-[#344054]">Your email</p>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            placeholder="Email address"
                            class="w-full p-3 border rounded-md border-[#339544]"
                        />
                        <p class="email-exist hidden">This email is already registered</p>
                        <p class="email-pending hidden">This email already has a pending registration</p>
                    </div>
                    <div class="flex gap-[20px] items-center ">
                        <button id="submit-button" type="submit" class="py-[10px] px-[40px]  w-[148px] h-[60px] submit bg-[#1F773A] hover:bg-[#EDB221] text-[#ffffff] cursor-pointer rounded-tl-[30px] rounded-br-[30px] font-fraunces">Submit</button>
                        <div id="spinner" class="hidden flex items-center justify-center">
                          <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-500 border-t-green-600"></div>
                        </div>
                    </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <div class="mb-[-170px]">
    <img src="https://philsan.org/wp-content/uploads/2025/06/Asset-3@3x-8-1-scaled.png" alt="">
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

      const spinner = document.getElementById('spinner');
      const submitButton = document.getElementById('submit-buttom')
      const token = generateToken(16);
      const email = document.getElementById("email").value

      spinner.classList.remove("hidden");

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

          const matchData = data.find(i => i.email === email);
          const emailExistEl = document.querySelector(".email-exist");
          const emailPendingEl = document.querySelector(".email-pending");
          
          console.log("matchData", matchData)
          if(matchData) {
            if (matchData["reg_status"] === "approved") {
              emailExistEl.classList.remove("hidden");
              emailPendingEl.classList.add("hidden");
              return;
            } else if (matchData["reg_status"] === "pending") {
              emailExistEl.classList.add("hidden");
              emailPendingEl.classList.remove("hidden");
              return;
            }
          } else {
            //send POST request to email verification database
            fetch('https://shvutlcgljqiidqxqrru.supabase.co/rest/v1/philsan_email_verification', {
              method: 'POST',
              headers: {
                'apikey': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNodnV0bGNnbGpxaWlkcXhxcnJ1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5MTM2NDgsImV4cCI6MjA2MTQ4OTY0OH0.UXJKk6iIyaVJsohEB6CwwauC21YPez1xwsOFy9qa34Q',
                'Content-Type': 'application/json',
                'Prefer': 'return=minimal'
              },
              body: JSON.stringify({ email, token: token+email })
            }).then(response => {
              if (response.ok) {
                // window.location.href = `/code-verification/?email=${encodeURIComponent(email)}`;
                emailjs.send('service_1qkyi2i', 'template_d71x79v', {
                    email: email,
                    verification_link: " https://philsan.org/38th-convention/complete-registration?t=" + token + email
                })
                    .then(function() {
                        // alert('Email sent successfully!');
                        spinner.classList.add("hidden");
                        window.location.href = "https://philsan.org/38th-convention/visit-email";
                    }, function(error) {
                        console.error('FAILED...', error);
                        alert('Email failed to send!');
                    });
              } else {
                alert('Failed to store code.');
              }
            });
          }
      })
      .catch(error => {
        console.error("Error fetching data:", error);
      });
    });
</script>

<?php 
        }

get_footer(); 

?>
