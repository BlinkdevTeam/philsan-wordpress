class SpeakerModal {
    constructor() {
        this.modal = document.getElementById('dynamicModal');
    }

    openModal({ title, image, content, description }) {
        this.modal.querySelector('#modalTitle').textContent = title;
        this.modal.querySelector('#modalImage').src = image;
        this.modal.querySelector('#modalContent').textContent = content;
        this.modal.querySelector('#modalDescription').textContent = description;
        this.modal.classList.remove('hidden');
        document.body.classList.add('modal-open'); // ⛔ Prevent scroll
    }

    closeModal() {
        this.modal.classList.add('hidden');
        document.body.classList.remove('modal-open'); // ✅ Allow scroll again
    }

    handleModal() {
        // Close when clicking the close button
        document.getElementById("closeModal").addEventListener('click', () => {
            this.closeModal();
        });

        // Close when clicking the background (not content)
        this.modal.addEventListener('click', (event) => {
            if (event.target === this.modal) {
                this.closeModal();
            }
        });

        // Open modal on speaker click
        document.querySelectorAll('.speaker-item').forEach((card) => {
            card.addEventListener('click', () => {
                this.openModal({
                    title: card.dataset.name,
                    image: card.dataset.image,
                    content: card.dataset.title,
                    description: card.dataset.desc
                });
            });
        });
    }

}

export default SpeakerModal;
