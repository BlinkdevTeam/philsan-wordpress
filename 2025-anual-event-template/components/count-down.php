<div class="countdown-block flex flex-col justify-end items-end">
  <div class="flex flex-col items-center gap-[10px]">
    <p class="text-[#1F773A] text-center font-bold">Event Starts at:</p>
    <div class="flex gap-4 text-[#1F773A]">
      <div class="flex flex-col items-center justify-center">
        <span class="font-[800] text-[42px] countdown-days">00</span>
        <div class="text-sm">Days</div>
      </div>
      <div class="pt-[10px] text-[22px] font-bold">:</div>
      <div class="flex flex-col items-center justify-center">
        <span class="font-[800] text-[42px] countdown-hours">00</span>
        <div class="text-sm">Hours</div>
      </div>
      <div class="pt-[10px] text-[22px] font-bold">:</div>
      <div class="flex flex-col items-center justify-center">
        <span class="font-[800] text-[42px] countdown-minutes">00</span>
        <div class="text-sm">Minutes</div>
      </div>
      <div class="pt-[10px] text-[22px] font-bold">:</div>
      <div class="flex flex-col items-center justify-center">
        <span class="font-[800] text-[42px] countdown-seconds">00</span>
        <div class="text-sm">Seconds</div>
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const eventDate = new Date("2025-09-30T14:30:00").getTime();

    function pad(num, size = 2) {
      return num.toString().padStart(size, "0");
    }

    function updateCountdowns() {
      const now = new Date().getTime();
      const diff = eventDate - now;

      if (diff <= 0) {
        document.querySelectorAll(".countdown-block").forEach(block => {
          block.innerHTML = "🎉 The event has started!";
        });
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
      const minutes = Math.floor((diff / (1000 * 60)) % 60);
      const seconds = Math.floor((diff / 1000) % 60);

      document.querySelectorAll(".countdown-block").forEach(block => {
        block.querySelector(".countdown-days").innerText = pad(days);
        block.querySelector(".countdown-hours").innerText = pad(hours);
        block.querySelector(".countdown-minutes").innerText = pad(minutes);
        block.querySelector(".countdown-seconds").innerText = pad(seconds);
      });
    }

    setInterval(updateCountdowns, 1000);
  });
</script>
