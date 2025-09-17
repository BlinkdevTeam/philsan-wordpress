class MobileNavBehaviour {
    constructor() {
        const header = document.getElementById('mobile-nav');
        const burger =  document.getElementById("mobile-burger-icon")

        burger.addEventListener('click', (event) => {
            console.log("mobile navbar trigger")
            if (header.classList.contains('hide-mobile-nav')) {
                header.classList.remove('hide-mobile-nav');
            } else {
                header.classList.add('hide-mobile-nav');
            }
        });
    }
}

export default MobileNavBehaviour;
