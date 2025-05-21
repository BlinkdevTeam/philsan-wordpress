<?php 

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
                <p class="text-[18px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
         <div class="w-[50%]">
            <?php if( !isset($_GET['code']) ) { ?>
                <?php get_template_part("template_part/annual_reg/email_verification"); ?>
            <?php } else { ?>
                <?php get_template_part("template_part/annual_reg/code_verification"); ?>
            <?php } ?>
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

function generateCode() {
    return Math.floor(100000 + Math.random() * 900000); // 6-digit
  }



  document.getElementById('email-verification').addEventListener('submit', function(e) {
    e.preventDefault();


    const code = generateCode();
    document.getElementById("code").value = code;

    console.log("email,", document.getElementById("code").value);

    // emailjs.sendForm('service_1qkyi2i', 'template_d71x79v', '#email-verification')
    //   .then(function() {
    //     alert('Email sent successfully!');
    //   }, function(error) {
    //     console.error('FAILED...', error);
    //     alert('Email failed to send!');
    //   });
  });
</script>

<?php 
        }

get_footer(); 

?>
