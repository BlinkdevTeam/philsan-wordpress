class MobileNavBehaviour {
    constructor() {
        const burger =  document.getElementById("mobile-burger-icon")
        const closeBtn = document.getElementById('closeFilter');
        const header = document.getElementById('mobile-nav');
        const backdrop = document.getElementById('mobile-nav-backdrop');
        
        const openSidebar = () => {
            header.classList.remove('translate-x-full');
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };

        const closeSidebar = () => {
            header.classList.add('translate-x-full');
            backdrop.classList.add('hidden');
            document.body.style.overflow = '';
        };

        burger.addEventListener('click', openSidebar);
        backdrop.addEventListener('click', closeSidebar);
    }
}

export default MobileNavBehaviour;
