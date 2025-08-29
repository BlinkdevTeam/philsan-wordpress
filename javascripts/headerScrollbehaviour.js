class HeaderScrollBehaviour {
    constructor() {
        let lastScrollTop = 0;
        const header = document.getElementById('header');
        const triggerHeight = 300;
        

        window.addEventListener('scroll', (event) => {
            const currentScrollTop = document.documentElement.scrollTop || document.body.scrollTop;

            if (currentScrollTop > triggerHeight) {
                if (currentScrollTop > lastScrollTop) {
                    header.classList.add('hide-header');
                } else {
                    header.classList.remove('hide-header');
                }
            }

            lastScrollTop = Math.max(0, currentScrollTop); // Prevent negative values
        });
    }
}

export default HeaderScrollBehaviour;
