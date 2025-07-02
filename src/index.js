import SpeakerModal from "../javascripts/38thSpeakerModal";

document.addEventListener("DOMContentLoaded", function () {
    console.log("JS Running!!!")

    const annualSpeakerModal = new SpeakerModal();

    if (document.querySelector(".speaker-item")) {
        annualSpeakerModal.handleModal();
    }
});