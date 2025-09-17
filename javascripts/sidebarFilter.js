class SidebarFilter {
    constructor() {
        const openBtn = document.getElementById('openFilter');
        const closeBtn = document.getElementById('closeFilter');
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');
        
        const openSidebar = () => {
            sidebar.classList.remove('translate-x-full');
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            console.log("trigger filter");
        };

        const closeSidebar = () => {
            sidebar.classList.add('translate-x-full');
            backdrop.classList.add('hidden');
            document.body.style.overflow = '';
        };

        openBtn.addEventListener('click', openSidebar);
        backdrop.addEventListener('click', closeSidebar);
    }
}

export default SidebarFilter;
