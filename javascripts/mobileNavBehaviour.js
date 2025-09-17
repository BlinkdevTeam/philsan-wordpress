class MobileNavBehaviour {
    constructor() {
        const header = document.getElementById('mobile-nav');

        window.addEventListener('click', (event) => {
            if (header.classList.contains('hide-header')) {
                header.classList.remove('hide-header');
            } else {
                header.classList.add('hide-header');
            }
        });
    }
}

export default MobileNavBehaviour;
