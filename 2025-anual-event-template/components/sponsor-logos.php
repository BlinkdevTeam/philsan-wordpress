<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide p-[20px] shadow-lg">
            <p>Diamond</p>
            <img class="w-[50%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226337.png" alt="">
        </div>
        <div class="swiper-slide p-[20px] shadow-lg">
            <p>Gold</p>
            <img class="w-[50%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226338.png" alt="">
        </div>
        <div class="swiper-slide p-[20px] shadow-lg">
            <p>3rd Level</p>
            <img class="w-[100%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226341-scaled.png" alt="">
        </div>
        <div class="swiper-slide p-[20px] shadow-lg">
            <p>2nd Level</p>
            <img class="w-[100%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226340-1-scaled.png" alt="">
        </div>
        <div class="swiper-slide p-[20px] shadow-sm">
            <p>Platinum</p>
            <img class="w-[100%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226339-scaled.png" alt="">
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