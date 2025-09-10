class FaqAcc {
    constructor() {}

    handleFaqAcc(elementId, index) {
        const accElement = document.getElementById(elementId);
        if (!accElement) return;

        const height = accElement.scrollHeight; // use scrollHeight instead of offsetHeight

        // Select all answer containers dynamically
        const allAnswers = document.querySelectorAll("[id^='answer-container-']");
        const allGroups = document.querySelectorAll("[id^='faq-group-']");

        allAnswers.forEach((container, i) => {
            if (i + 1 !== index) {
                container.style.height = 0;
                allGroups[i]?.classList.remove("active-faq");
            } else {
                container.style.height = height + "px";
                allGroups[i]?.classList.add("active-faq");
            }
        });
    }
}

export default FaqAcc;
