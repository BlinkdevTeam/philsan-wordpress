import SpeakerModal from "../javascripts/38thSpeakerModal";
import SidebarFilter from "../javascripts/sidebarFilter";
import NewsEventSearch from "../javascripts/newsEventSearch";
import HeaderScrollBehaviour from "../javascripts/headerScrollbehaviour";

document.addEventListener("DOMContentLoaded", function () {
    console.log("JS Running!!!")

    new HeaderScrollBehaviour();

    const annualSpeakerModal = new SpeakerModal();

    if (document.querySelector(".speaker-item")) {
        annualSpeakerModal.handleModal();
    }

    if(document.querySelector(".with-filters")) {
        new SidebarFilter();
        new NewsEventSearch();
    }
});