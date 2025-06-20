<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <p>Diamond</p>
            <img src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226337.png" alt="">
        </div>
        <div class="swiper-slide">
            <p>Gold</p>
            <img src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226338.png" alt="">
        </div>
        <div class="swiper-slide">
            <p>3rd Level</p>
            <img src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226341-scaled.png" alt="">
        </div>
        <div class="swiper-slide">
            <p>2nd Level</p>
            <img src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226340-1-scaled.png" alt="">
        </div>
        <div class="swiper-slide">
            <p>Platinum</p>
            <img src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226339-scaled.png" alt="">
        </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
    });
  </script>