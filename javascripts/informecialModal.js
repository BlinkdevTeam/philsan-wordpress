class InfomercialModal {
  constructor() {
    this.modal = document.getElementById("video-modal");
    this.iframe = document.getElementById("modal-video");
    this.closeBtn = document.getElementById("close-modal");

    this.registerEvents();
  }

  registerEvents() {
    // Open modal when any "Watch Video" button is clicked
    document.querySelectorAll(".watch-video-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        const videoUrl = btn.getAttribute("data-video");
        console.log("videoUrl", videoUrl)
        if (videoUrl) this.open(videoUrl);
      });
    });

    // Close modal on close button or click outside
    this.closeBtn.addEventListener("click", () => this.close());
    this.modal.addEventListener("click", (e) => {
      if (e.target === this.modal) this.close();
    });
  }

  open(videoUrl) {
    this.iframe.src = videoUrl.includes("?")
      ? videoUrl + "&autoplay=1"
      : videoUrl + "?autoplay=1";
    this.modal.classList.remove("hidden");
    this.modal.classList.add("flex");
  }

  close() {
    this.iframe.src = ""; // stop video
    this.modal.classList.add("hidden");
    this.modal.classList.remove("flex");
  }
}

export default InfomercialModal;
