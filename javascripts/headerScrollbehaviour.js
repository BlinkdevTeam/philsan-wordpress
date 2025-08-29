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

            //This will close all open modal in the header
            for (let id in listenerStatus) {
                const popup = document.getElementById(id);
                
                if (listenerStatus[id].isOpen && popup && !popup.contains(event.target)) {
                    popup.style.display = "none"; // Close it
                    listenerStatus[id].isOpen = false;
                }
            }
        });
    }
}

export default HeaderScrollBehaviour;
