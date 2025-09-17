class MobileNavBehaviour {
    constructor() {
        const header = document.getElementById('mobile-nav');

        window.addEventListener('click', (event) => {
            if (header.classList.contains('hide-mobile-nav')) {
                header.classList.remove('hide-mobile-nav');
            } else {
                header.classList.add('hide-mobile-nav');
            }
        });
    }
}

export default MobileNavBehaviour;
