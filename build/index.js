/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./javascripts/38thSpeakerModal.js":
/*!*****************************************!*\
  !*** ./javascripts/38thSpeakerModal.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class SpeakerModal {
  constructor() {
    this.modal = document.getElementById('dynamicModal');
    this.backdrop = this.modal; // for backdrop click
  }
  openModal({
    title,
    image,
    content,
    description
  }) {
    this.modal.querySelector('#modalTitle').textContent = title;
    this.modal.querySelector('#modalImage').src = image;
    this.modal.querySelector('#modalContent').textContent = content;
    this.modal.querySelector('#modalDescription').textContent = description;
    this.modal.classList.remove('hidden');
  }
  closeModal() {
    this.modal.classList.add('hidden');
  }
  handleModal() {
    // Click on backdrop
    this.modal.addEventListener('click', e => {
      if (e.target === this.modal) {
        this.closeModal();
      }
    });

    // Card click
    document.querySelectorAll('.speaker-item').forEach(card => {
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SpeakerModal);

/***/ }),

/***/ "./javascripts/newsEventSearch.js":
/*!****************************************!*\
  !*** ./javascripts/newsEventSearch.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class NewsEventSearch {
  constructor() {
    this.searchInput = document.getElementById("news-event-search-input");
    this.searchBtn = document.getElementById("searchBtn");
    this.resultsContainer = document.getElementById("search-results");
    this.init();
  }
  init() {
    if (this.searchBtn && this.searchInput) {
      this.searchBtn.addEventListener("click", () => this.handleSearch());
    }
  }
  async handleSearch() {
    const value = this.searchInput.value.trim();
    if (!value) return;
    try {
      // Example: search in "news" post type
      const res = await fetch(`/wp-json/global/v1/search?keyword=${encodeURIComponent(value)}`);
      const data = await res.json();
      console.log("API Results:", data);
      this.renderResults(data);
    } catch (error) {
      console.error("Search error:", error);
    }
  }
  renderResults(results) {
    if (!this.resultsContainer) return;
    this.resultsContainer.innerHTML = ""; // clear old results

    if (results.length === 0) {
      this.resultsContainer.innerHTML = "<p>No results found.</p>";
      return;
    }
    results.forEach(item => {
      console.log("item", item);
      const div = document.createElement("div");
      div.classList.add("search-item");
      div.innerHTML = `
                    <h3>${item.title.rendered}</h3>
                    <a href="${item.link}">Read more</a>
                `;
      this.resultsContainer.appendChild(div);
    });
  }
}

// init class
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (NewsEventSearch);

/***/ }),

/***/ "./javascripts/sidebarFilter.js":
/*!**************************************!*\
  !*** ./javascripts/sidebarFilter.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class SidebarFilter {
  constructor() {
    const openBtn = document.getElementById('openFilter');
    const closeBtn = document.getElementById('closeFilter');
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('backdrop');

    // if (!openBtn || !closeBtn || !sidebar || !backdrop) {
    //     console.warn("Sidebar elements missing");
    //     return;
    // }

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
    // closeBtn.addEventListener('click', closeSidebar);
    backdrop.addEventListener('click', closeSidebar);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SidebarFilter);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _javascripts_38thSpeakerModal__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../javascripts/38thSpeakerModal */ "./javascripts/38thSpeakerModal.js");
/* harmony import */ var _javascripts_sidebarFilter__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../javascripts/sidebarFilter */ "./javascripts/sidebarFilter.js");
/* harmony import */ var _javascripts_newsEventSearch__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../javascripts/newsEventSearch */ "./javascripts/newsEventSearch.js");



document.addEventListener("DOMContentLoaded", function () {
  console.log("JS Running!!!");
  const annualSpeakerModal = new _javascripts_38thSpeakerModal__WEBPACK_IMPORTED_MODULE_0__["default"]();
  if (document.querySelector(".speaker-item")) {
    annualSpeakerModal.handleModal();
  }
  if (document.querySelector(".with-filters")) {
    new _javascripts_sidebarFilter__WEBPACK_IMPORTED_MODULE_1__["default"]();
    new _javascripts_newsEventSearch__WEBPACK_IMPORTED_MODULE_2__["default"]();
  }
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map