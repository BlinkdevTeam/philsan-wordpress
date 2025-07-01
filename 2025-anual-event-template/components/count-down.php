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

<script>
    document.addEventListener("DOMContentLoaded", function () {
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
    });
  </script>