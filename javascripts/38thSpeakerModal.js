class SpeakerModal {
    constructor() {}

    openModal({ title, image, content }) {
        const modal = document.getElementById('dynamicModal');
        modal.querySelector('#modalTitle').textContent = title;
        modal.querySelector('#modalImage').src = image;
        modal.querySelector('#modalContent').textContent = content;
        modal.classList.remove('hidden');
    }

    handleModal() {
        document.querySelectorAll('.speaker-item').forEach((card) => {
            card.addEventListener('click', () => {
                this.openModal({
                    title: card.dataset.name,
                    image: card.dataset.image,
                    content: card.dataset.title, // or whatever you want to show
                });
            });
        });
    }
}

export default SpeakerModal;