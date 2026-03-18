class SidebarFilter {
    constructor() {
        const openBtn  = document.getElementById('openFilter');
        const closeBtn = document.getElementById('closeFilter');
        const sidebar  = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');

        const openSidebar = () => {
            sidebar.classList.add('is-open');
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };

        const closeSidebar = () => {
            sidebar.classList.remove('is-open');
            backdrop.classList.add('hidden');
            document.body.style.overflow = '';
        };

        openBtn.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);
        backdrop.addEventListener('click', closeSidebar);
    }
}

export default SidebarFilter;