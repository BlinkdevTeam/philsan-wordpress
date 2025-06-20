<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide p-[20px]">
            <div class="bg-[#1F773A] py-[5px] px-[10px] rounded-tl-xl rounded-br-xl">
                <p class="font-fraunces font-bold text-[#ffffff]">Diamond</p>
            </div>
            <img class="w-[50%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226337.png" alt="">
        </div>
        <div class="swiper-slide p-[20px]">
            <div class="bg-[#1F773A] py-[5px] px-[10px] rounded-tl-xl rounded-br-xl">
                <p class="font-fraunces font-bold text-[#ffffff]">Gold</p>
            </div>
            <img class="w-[50%] mt-[20px]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226338.png" alt="">
        </div>
        <div class="swiper-slide p-[20px]">
            <div class="bg-[#1F773A] py-[5px] px-[10px] rounded-tl-xl rounded-br-xl">
                <p class="font-fraunces font-bold text-[#ffffff]">Event Sponsors</p>
            </div>
            <img class="w-[80%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226341-scaled.png" alt="">
        </div>
        <div class="swiper-slide p-[20px]">
            <div class="bg-[#1F773A] py-[5px] px-[10px] rounded-tl-xl rounded-br-xl">
                <p class="font-fraunces font-bold text-[#ffffff]">Event Sponsors</p>
            </div>
            <img class="w-[80%] mt-[-20px]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226340-1-scaled.png" alt="">
        </div>
        <div class="swiper-slide p-[20px]">
            <div class="bg-[#1F773A] py-[5px] px-[10px] rounded-tl-xl rounded-br-xl">
                <p class="font-fraunces font-bold text-[#ffffff]">Platinum</p>
            </div>
            <img class="w-[80%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226339-scaled.png" alt="">
        </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {

    slidesPerView: 1,
    spaceBetween: 30,
    loop: true, // optional: for continuous loop
    autoplay: {
        delay: 3000, // time in milliseconds between slides (3 seconds here)
        disableOnInteraction: false, // keeps autoplay after user interacts
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        640: {
        slidesPerView: 1
        },
        768: {
        slidesPerView: 1
        },
        1024: {
        slidesPerView: 1
        }
    }
    
    });

  });
</script>