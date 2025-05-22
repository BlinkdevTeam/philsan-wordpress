<?php 

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="mx-auto w-[1280px]">
    <div class="flex w-[100%] py-[20px] h-[100vh]">
        <h2 class="text-[42px]">Token Verified!!!</h2>
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
        console.log("response", response)
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
