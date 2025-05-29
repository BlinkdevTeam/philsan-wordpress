<?php 
/*
*Template Name: Verify Email
*Template Post Type: 38th-convention
*/

get_header();

    while (have_posts()) {

    the_post();
?>


<div class="mx-auto w-[1280px]">
    <div class="flex w-[100%] py-[20px] h-[100vh]">
        <div class="bg-[#F6F5F3] w-[50%] p-[50px] flex justify-center items-center">
            <div class="flex flex-col gap-[20px]">
                <h2 class="text-[38px]">Philsan</h2>
                <h1 class="text-[48px] font-bold">Philippine Society of Animal Nutritionists' 38ᵗʰ ANNUAL CONVENTION</h1>
                <p class="text-[18px]">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
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
                        <p class="email-exist hidden text-[red]">Email already in use</p>
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
          console.log("Matching data:", data);
          const matchData = data.find(i => i.email === email);
          console.log("matchData", matchData)
          if(matchData) {
            const elem = document.querySelector(".email-exist");
            if (elem) {
              elem.classList.remove("hidden");            
            }
              return;
          }
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
                  verification_link: "https://philsan.org/annual-event-registration?t=" + token + email
              })
                  .then(function() {
                      // alert('Email sent successfully!');
                      window.location.href = "https://philsan.org/visit-email";
                  }, function(error) {
                      console.error('FAILED...', error);
                      alert('Email failed to send!');
                  });
            } else {
              alert('Failed to store code.');
            }
          });
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
