class FaqAcc {
    constructor() {}

    handleFaqAcc(elementId, index) {
        const accElement = document.getElementById(elementId)

        const height = accElement.offsetHeight;

        for(let i = 0; i < 6; i++) {
            if(index !== i) {
                document.getElementById(`answer-container-${i}`).style.height = 0;
                document.getElementById(`faq-group-${i}`).classList.remove("active-faq")
            } else {
                document.getElementById(`answer-container-${i}`).style.height = height+"px";
                document.getElementById(`faq-group-${i}`).classList.add("active-faq")
            }
        }

        // if( accContainer.classList.contains("active") ) {
        //     accContainer.style.height = 0
        //     accContainer.classList.remove("active")
        //     accHead.style.paddingBottom = 0
        // } else {
        //     accContainer.style.height = height+"px"
        //     accContainer.classList.add("active")
        //     accHead.style.paddingBottom = "10px"
        // }
    }
}

export default FaqAcc;