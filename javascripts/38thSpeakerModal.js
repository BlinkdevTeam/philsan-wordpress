class SpeakerModal {
    constructor() {
        this.modal = document.getElementById('dynamicModal');
    }
    
    openModal({ title, image, content }) {
        console.log("modal", modal);
        modal.querySelector('#modalTitle').textContent = title;
        modal.querySelector('#modalImage').src = image;
        modal.querySelector('#modalContent').textContent = content;
        modal.classList.remove('hidden');
    }

    closeModal(){
        modal.classList.add('hidden');
    }

    handleModal() {
        document.getElementById("closeModal").addEventListener('click', () => {
            console.log("modal trigerring")
            this.closeModal();
        });

        document.querySelectorAll('.speaker-item').forEach((card) => {
            console.log("card", card)

            card.addEventListener('click', () => {
                console.log("modal trigerring")
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