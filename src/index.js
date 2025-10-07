import SpeakerModal from "../javascripts/38thSpeakerModal";
import InfomercialModal from "../javascripts/informecialModal";
import SidebarFilter from "../javascripts/sidebarFilter";
import NewsEventSearch from "../javascripts/newsEventSearch";
import HeaderScrollBehaviour from "../javascripts/headerScrollbehaviour";
import FaqAcc from "../javascripts/faqAccordion";
import MobileNavBehaviour from "../javascripts/mobileNavBehaviour";

document.addEventListener("DOMContentLoaded", function () {
    console.log("JS Running!!!")

    if(document.getElementById("mobile-nav")) {
        new HeaderScrollBehaviour();
        new MobileNavBehaviour();
    }

    const annualSpeakerModal = new SpeakerModal();

    if (document.querySelector(".speaker-item")) {
        annualSpeakerModal.handleModal();
    }

    if(document.querySelector(".with-filters")) {
        new SidebarFilter();
        new NewsEventSearch();
    }

    if(document.getElementById("faq-section")) {
        window.handleFaqAccordion = function(elementId, index) {
            new FaqAcc().handleFaqAcc(elementId, index);
        }
    }

    if(document.getElementById("video-modal")) {
        new InfomercialModal();
    }
});