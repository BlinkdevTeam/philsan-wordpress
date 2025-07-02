// src/App.jsx
import React, { useEffect, useState } from "react";
import Modal from "../javascripts/38thSpeakerModal";

export default function App() {
  const [modalData, setModalData] = useState(null);

  const openModal = (data) => setModalData(data);
  const closeModal = () => setModalData(null);

  useEffect(() => {
    const items = document.querySelectorAll(".speaker-item");

    items.forEach((item) => {
      item.addEventListener("click", () => {
        const name = item.dataset.name;
        const title = item.dataset.title;
        const image = item.dataset.image;

        openModal({ title: name, content: title, image });
      });
    });

    return () => {
      items.forEach((item) => {
        item.removeEventListener("click", () => {}); // clean up
      });
    };
  }, []);

  return (
    <div>
      <Modal
        isOpen={!!modalData}
        onClose={closeModal}
        {...(modalData || {})}
      />
    </div>
  );
}
