// src/index.js
import React from "react";
import { createRoot } from "react-dom/client";
import App from "./App";

const rootElement = document.getElementById("react-modal-root");

if (rootElement) {
  createRoot(rootElement).render(<App />);
}
