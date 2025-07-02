class SpeakerModal {
    constructor() {
        this.modal = document.getElementById('dynamicModal');
    }

    openModal({ title, image, content }) {
        console.log("modal", this.modal);
        this.modal.querySelector('#modalTitle').textContent = title;
        this.modal.querySelector('#modalImage').src = image;
        this.modal.querySelector('#modalContent').textContent = content;
        this.modal.classList.remove('hidden');
    }

    closeModal() {
        this.modal.classList.add('hidden');
    }

    handleModal() {
        document.getElementById("closeModal").addEventListener('click', () => {
            this.closeModal();
        });

        document.querySelectorAll('.speaker-item').forEach((card) => {
            card.addEventListener('click', () => {
                this.openModal({
                    title: card.dataset.name,
                    image: card.dataset.image,
                    content: card.dataset.title,
                });
            });
        });
    }
}

export default SpeakerModal;
