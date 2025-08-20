import SpeakerModal from "../javascripts/38thSpeakerModal";
import SidebarFilter from "../javascripts/sidebarFilter";

document.addEventListener("DOMContentLoaded", function () {
    console.log("JS Running!!!")

    const annualSpeakerModal = new SpeakerModal();

    if (document.querySelector(".speaker-item")) {
        annualSpeakerModal.handleModal();
    }

    if(document.querySelector(".with-filters")) {
        new SidebarFilter();
    }
});