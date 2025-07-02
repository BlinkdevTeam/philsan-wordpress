// src/Modal.jsx
import React from "react";

export default function Modal({ isOpen, onClose, title, content, image }) {
  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
      <div className="bg-white p-6 rounded-xl max-w-md w-full relative">
        <button onClick={onClose} className="absolute top-2 right-3 text-2xl">
          &times;
        </button>
        <h2 className="text-xl font-bold mb-2">{title}</h2>
        <img src={image} alt={title} className="rounded mb-4" />
        <p className="text-gray-700">{content}</p>
      </div>
    </div>
  );
}
