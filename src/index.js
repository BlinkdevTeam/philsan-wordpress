import SpeakerModal from "../javascripts/38thSpeakerModal";

document.addEventListener("DOMContentLoaded", function () {
    console.log("JS Running!!!")

    const annualSpeakerModal = new SpeakerModal();

    if(document.getElementById("speaker-item")) {
        annualSpeakerModal.handleModal()
    } 
});