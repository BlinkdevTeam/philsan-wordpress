class SpeakerModal {
    constructor() {
        this.modal = document.getElementById('dynamicModal');
        this.backdrop = this.modal; // for backdrop click
    }

    openModal({ title, image, content, description }) {
        this.modal.querySelector('#modalTitle').textContent = title;
        this.modal.querySelector('#modalImage').src = image;
         this.modal.querySelector('#modalImage-mobile').src = image;
        this.modal.querySelector('#modalContent').textContent = content;
        this.modal.querySelector('#modalDescription').textContent = description;
        this.modal.classList.remove('hidden');
        document.body.classList.add('modal-open'); // ⛔ Prevent scroll
    }

    closeModal() {
        this.modal.classList.add('hidden');
        document.body.classList.remove('modal-open'); // ⛔ Remove Prevent scroll
    }

    handleModal() {
        // Close button
        // document.getElementById("closeModal").addEventListener('click', () => {
        //     this.closeModal();
        // });

        // Click on backdrop
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.closeModal();
            }
        });

        // Card click
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
