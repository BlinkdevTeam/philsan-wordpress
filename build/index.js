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

/***/ "./javascripts/faqAccordion.js":
/*!*************************************!*\
  !*** ./javascripts/faqAccordion.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class FaqAcc {
  constructor() {}
  handleFaqAcc(elementId, index) {
    const accElement = document.getElementById(elementId);
    if (!accElement) return;
    const height = accElement.scrollHeight; // use scrollHeight instead of offsetHeight

    // Select all answer containers dynamically
    const allAnswers = document.querySelectorAll("[id^='answer-container-']");
    const allGroups = document.querySelectorAll("[id^='faq-group-']");
    allAnswers.forEach((container, i) => {
      if (i + 1 !== index) {
        container.style.height = 0;
        allGroups[i]?.classList.remove("active-faq");
      } else {
        container.style.height = height + "px";
        allGroups[i]?.classList.add("active-faq");
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FaqAcc);

/***/ }),

/***/ "./javascripts/headerScrollbehaviour.js":
/*!**********************************************!*\
  !*** ./javascripts/headerScrollbehaviour.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class HeaderScrollBehaviour {
  constructor() {
    let lastScrollTop = 0;
    const header = document.getElementById('header');
    const triggerHeight = 300;
    window.addEventListener('scroll', event => {
      const currentScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
      if (currentScrollTop > triggerHeight) {
        if (currentScrollTop > lastScrollTop) {
          header.classList.add('hide-header');
        } else {
          header.classList.remove('hide-header');
        }
      }
      lastScrollTop = Math.max(0, currentScrollTop); // Prevent negative values
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (HeaderScrollBehaviour);

/***/ }),

/***/ "./javascripts/informecialModal.js":
/*!*****************************************!*\
  !*** ./javascripts/informecialModal.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class InfomercialModal {
  constructor() {
    this.modal = document.getElementById("video-modal");
    this.iframe = document.getElementById("modal-video");
    this.closeBtn = document.getElementById("close-modal");
    this.registerEvents();
  }
  registerEvents() {
    // Open modal when any "Watch Video" button is clicked
    document.querySelectorAll(".watch-video-btn").forEach(btn => {
      btn.addEventListener("click", e => {
        e.preventDefault();
        console.log("click open video");
        const videoUrl = btn.getAttribute("data-video");
        if (videoUrl) this.open(videoUrl);
      });
    });

    // Close modal on close button or click outside
    this.closeBtn.addEventListener("click", () => this.close());
    this.modal.addEventListener("click", e => {
      if (e.target === this.modal) this.close();
    });
  }
  open(videoUrl) {
    this.iframe.src = videoUrl.includes("?") ? videoUrl + "&autoplay=1" : videoUrl + "?autoplay=1";
    this.modal.classList.remove("hidden");
    this.modal.classList.add("flex");
  }
  close() {
    this.iframe.src = ""; // stop video
    this.modal.classList.add("hidden");
    this.modal.classList.remove("flex");
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InfomercialModal);

/***/ }),

/***/ "./javascripts/mobileNavBehaviour.js":
/*!*******************************************!*\
  !*** ./javascripts/mobileNavBehaviour.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class MobileNavBehaviour {
  constructor() {
    const burger = document.getElementById("mobile-burger-icon");
    const closeBtn = document.getElementById('closeFilter');
    const header = document.getElementById('mobile-nav');
    const backdrop = document.getElementById('mobile-nav-backdrop');
    const openSidebar = () => {
      header.classList.remove('translate-x-full');
      backdrop.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    };
    const closeSidebar = () => {
      header.classList.add('translate-x-full');
      backdrop.classList.add('hidden');
      document.body.style.overflow = '';
    };
    burger.addEventListener('click', openSidebar);
    backdrop.addEventListener('click', closeSidebar);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileNavBehaviour);

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
    this.filterBtn = document.getElementById("applyFilterBtn");
    this.resultsContainer = document.getElementById("search-results");
    this.init();
  }
  init() {
    // Search button
    if (this.searchBtn) {
      this.searchBtn.addEventListener("click", () => this.handleSearch());
    }

    // Apply Filter button
    if (this.filterBtn) {
      this.filterBtn.addEventListener("click", () => this.handleSearch());
    }

    // Enter key in search input
    if (this.searchInput) {
      this.searchInput.addEventListener("keyup", e => {
        if (e.key === "Enter") {
          this.handleSearch();
        }
      });
    }
  }
  async handleSearch() {
    const keyword = this.searchInput ? this.searchInput.value.trim() : "";

    // collect taxonomy filters
    const taxonomyFilters = {};
    document.querySelectorAll(".taxonomy-filter-checkbox:checked").forEach(cb => {
      const taxonomy = cb.dataset.taxonomy;
      if (!taxonomyFilters[taxonomy]) {
        taxonomyFilters[taxonomy] = [];
      }
      taxonomyFilters[taxonomy].push(cb.value);
    });

    // collect meta filters (like date)
    const metaFilters = {};
    document.querySelectorAll(".date-filter-checkbox:checked").forEach(cb => {
      const metaKey = cb.dataset.meta;
      if (!metaFilters[metaKey]) {
        metaFilters[metaKey] = [];
      }
      metaFilters[metaKey].push(cb.value);
    });
    console.log("metaFilters", metaFilters);
    console.log("taxonomyFilters", taxonomyFilters);

    // build query string
    const params = new URLSearchParams();
    if (keyword) params.append("keyword", keyword);
    if (Object.keys(taxonomyFilters).length > 0) {
      params.append("taxonomies", JSON.stringify(taxonomyFilters));
    }
    if (Object.keys(metaFilters).length > 0) {
      params.append("meta", JSON.stringify(metaFilters));
    }
    try {
      console.log("params", params.toString());
      const res = await fetch(`/wp-json/global/v1/search?${params.toString()}`);
      const data = await res.json();
      console.log("API Results:", data);
      this.renderResults(data);
    } catch (error) {
      console.error("Search error:", error);
    }
  }
  renderResults(results) {
    if (!this.resultsContainer) return;
    this.resultsContainer.innerHTML = "";
    if (!results || results.length === 0) {
      this.resultsContainer.innerHTML = "<p>No results found.</p>";
      return;
    }
    results.forEach(item => {
      const div = document.createElement("div");
      div.classList.add("search-item");
      div.innerHTML = `<h3>${item.title}</h3>`;
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
/* harmony import */ var _javascripts_informecialModal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../javascripts/informecialModal */ "./javascripts/informecialModal.js");
/* harmony import */ var _javascripts_sidebarFilter__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../javascripts/sidebarFilter */ "./javascripts/sidebarFilter.js");
/* harmony import */ var _javascripts_newsEventSearch__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../javascripts/newsEventSearch */ "./javascripts/newsEventSearch.js");
/* harmony import */ var _javascripts_headerScrollbehaviour__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../javascripts/headerScrollbehaviour */ "./javascripts/headerScrollbehaviour.js");
/* harmony import */ var _javascripts_faqAccordion__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../javascripts/faqAccordion */ "./javascripts/faqAccordion.js");
/* harmony import */ var _javascripts_mobileNavBehaviour__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../javascripts/mobileNavBehaviour */ "./javascripts/mobileNavBehaviour.js");







document.addEventListener("DOMContentLoaded", function () {
  console.log("JS Running!!!");
  if (document.getElementById("mobile-nav")) {
    new _javascripts_headerScrollbehaviour__WEBPACK_IMPORTED_MODULE_4__["default"]();
    new _javascripts_mobileNavBehaviour__WEBPACK_IMPORTED_MODULE_6__["default"]();
  }
  const annualSpeakerModal = new _javascripts_38thSpeakerModal__WEBPACK_IMPORTED_MODULE_0__["default"]();
  if (document.querySelector(".speaker-item")) {
    annualSpeakerModal.handleModal();
  }
  if (document.querySelector(".with-filters")) {
    new _javascripts_sidebarFilter__WEBPACK_IMPORTED_MODULE_2__["default"]();
    new _javascripts_newsEventSearch__WEBPACK_IMPORTED_MODULE_3__["default"]();
  }
  if (document.getElementById("faq-section")) {
    window.handleFaqAccordion = function (elementId, index) {
      new _javascripts_faqAccordion__WEBPACK_IMPORTED_MODULE_5__["default"]().handleFaqAcc(elementId, index);
    };
  }
  if (document.querySelector(".watch-video-btn")) {
    console.log("there's modal here");
    new _javascripts_informecialModal__WEBPACK_IMPORTED_MODULE_1__["default"]();
  }
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map