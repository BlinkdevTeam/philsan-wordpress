<?php 
 /* Template Name: 38th Convention */

get_header(); 

while (have_posts()) {
the_post();

$page = get_page_by_title('38th convention Test Page');
?>

<div class="hero-section relative bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_60%,#CBF9B6_100%)] overflow-hidden">
    <div class="flex gap-[50px] w-[1280px] mx-auto pt-[60px]">
        <div class="flex flex-col w-[50%] gap-[40px]">
            <img class="w-[80px] ml-[-15px]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226390.png" alt="">
            <div class="flex flex-col gap-[10px] pt-[50px]">
                <img class="w-[80%]" src="https://philsan.org/wp-content/uploads/2025/06/Frame-2147226387-1.png" alt="">
                <p class="font-bold text-[#000000]">Innovating for a Sustainable Future: Harnessing Technology and Alternative Solutions in Animal Nutrition and Health</p>
            </div>
            <div class="flex flex-col">
                <p class="font-bold text-[#1F773A] text-[28px]">SEPTEMBER 30, 2025</p>
                <p class="font-bold text-[#EDB221] text-[18px]">Okada Manila, Paranaque City, Philippines</p>
            </div>
            <a class="font-bold w-max bg-gradient-to-r from-[#1F773A] to-[#EDB221] text-[#ffffff] text-[38px] py-[10px] px-[50px] rounded-tl-[40px] rounded-br-[40px]" href="">Register</a>
        </div>
        <div class="relative w-[50%] pb-[50px]">
            <img class="z-[2]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
            <img class="absolute z-[1] bottom-[-50px] transform scale-[1.3] opacity-[0.05]" src="https://philsan.org/wp-content/uploads/2025/06/Philsan-Ticket-BG@3x-8-2.png" alt="">
            <div class="flex flex-col justify-end items-end pt-[50px]">
                <div class="flex flex-col items-center gap-[10px]">
                    <p class="text-[#1F773A] text-center font-bold">Event Starts at:</p>
                    <div id="countdown" class="flex gap-4 text-[#1F773A]">
                        <div class="flex flex-col items-center justify-center">
                            <span class="font-[800] text-[42px]" id="days">00</span>
                            <div class="text-sm">Days</div>
                        </div>
                        <div class="pt-[10px] text-[22px] font-bold">:</div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="font-[800] text-[42px]" id="hours">00</span>
                            <div class="text-sm">Hours</div>
                        </div>
                        <div class="pt-[10px] text-[22px] font-bold">:</div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="font-[800] text-[42px]" id="minutes">00</span>
                            <div class="text-sm">Minutes</div>
                        </div>
                        <div class="pt-[10px] text-[22px] font-bold">:</div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="font-[800] text-[42px]" id="seconds">00</span>
                            <div class="text-sm">Seconds</div>
                        </div>
                        <!-- <div class="flex flex-col itmes-center justify-center">
                            <span id="milliseconds">000</span>
                            <div class="text-sm">Milliseconds</div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-convention relative ">
    <div>
       <?php if ($page) : ?>
            <!--  Use $page->ID to get the ID of the page we fetched above.
            ACF requires the post ID to know where to get the custom field from.  -->
            <?php if (get_field("about_title", $page->ID)) : ?> 
                <h6><?php echo get_field("about_title", $page->ID); ?></h6>
            <?php endif; ?>

            <?php if (have_rows('about_description', $page->ID))): ?>
                <?php while (have_rows('about_description', $page->ID))): the_row(); ?>
                <p><?php echo esc_html(get_sub_field('description', $page->ID))); ?></p>
            <?php endif; ?>    
            
            <?php if (get_field("about_video", $page->ID)) : ?> 
                 <video id="sde" loop playsinline class="absolute inset-0 w-full h-full object-cover">
                    <source src="<?php echo get_field("about_video", $page->ID);; ?>" type="video/mp4">
                </video>
            <?php endif; ?>

           
        <?php endif; ?>
    </div>
    <img class="absolute top-[0] w-full h-full object-cover z-[1]" src="https://philsan.org/wp-content/uploads/2025/06/17580-1-scaled.png" alt="">
</div>

<script>
    // 🎯 Set your event date here (YYYY-MM-DDTHH:MM:SS)
    const eventDate = new Date("2025-09-30T14:30:00").getTime();

    function pad(num, size = 2) {
      return num.toString().padStart(size, "0");
    }

    function updateCountdown() {
      const now = new Date().getTime();
      const diff = eventDate - now;

      if (diff <= 0) {
        document.getElementById("countdown").innerHTML = "🎉 The event has started!";
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
      const minutes = Math.floor((diff / (1000 * 60)) % 60);
      const seconds = Math.floor((diff / 1000) % 60);
    //   const milliseconds = diff % 1000;

      document.getElementById("days").innerText = pad(days);
      document.getElementById("hours").innerText = pad(hours);
      document.getElementById("minutes").innerText = pad(minutes);
      document.getElementById("seconds").innerText = pad(seconds);
    //   document.getElementById("milliseconds").innerText = pad(milliseconds, 3);
    }

    // ⚡ Update every 50ms for smoother milliseconds display
    setInterval(updateCountdown, 50);
  </script>
<?php 
        }

get_footer(); 

?>