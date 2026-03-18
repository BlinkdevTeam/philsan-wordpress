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

/***/ "./javascripts/globalSearch.js":
/*!*************************************!*\
  !*** ./javascripts/globalSearch.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class GlobalSearch {
  constructor() {
    this.timer = null;
    this.activeIndex = -1;
    this.liveResults = [];

    // WordPress REST API endpoint — no PHP needed
    this.API_URL = '/wp-json/wp/v2/search';
    this.SEARCH_PAGE = '/?s=';

    // ── DOM refs ──────────────────────────────────────────────────────────
    this.$trigger = document.getElementById('philsan-search-trigger');
    this.$panel = document.getElementById('philsan-search-panel');
    this.$backdrop = document.getElementById('philsan-search-backdrop');
    this.$input = document.getElementById('philsan-search-input');
    this.$close = document.getElementById('philsan-search-close');
    this.$results = document.getElementById('philsan-search-results');
    this.$footer = document.getElementById('philsan-search-footer');
    this.$count = document.getElementById('philsan-search-count');
    this.$allLink = document.getElementById('philsan-search-all-link');
    this.bindEvents();
  }

  // ── Open / Close ──────────────────────────────────────────────────────────
  openSearch() {
    this.$panel.classList.add('is-open');
    this.$panel.setAttribute('aria-hidden', 'false');
    document.body.classList.add('philsan-search-open');
    setTimeout(() => this.$input.focus(), 80);
  }
  closeSearch() {
    this.$panel.classList.remove('is-open');
    this.$panel.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('philsan-search-open');
    setTimeout(() => {
      this.$input.value = '';
      this.renderEmpty();
    }, 250);
  }

  // ── Bind Events ───────────────────────────────────────────────────────────
  bindEvents() {
    this.$trigger.addEventListener('click', () => this.openSearch());
    this.$close.addEventListener('click', () => this.closeSearch());
    this.$backdrop.addEventListener('click', () => this.closeSearch());
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') this.closeSearch();
    });

    // Typing — debounced live search
    this.$input.addEventListener('input', () => {
      const kw = this.$input.value.trim();
      this.activeIndex = -1;
      clearTimeout(this.timer);
      if (kw.length < 2) {
        this.renderEmpty();
        return;
      }
      this.renderLoading();
      this.timer = setTimeout(() => this.doSearch(kw), 320);
    });

    // Arrow keys + Enter navigation
    this.$input.addEventListener('keydown', e => {
      const items = this.$results.querySelectorAll('.philsan-result-item');
      if (!items.length) return;
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        this.activeIndex = Math.min(this.activeIndex + 1, items.length - 1);
        this.updateActive(items);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        this.activeIndex = Math.max(this.activeIndex - 1, 0);
        this.updateActive(items);
      } else if (e.key === 'Enter') {
        if (this.activeIndex >= 0 && this.liveResults[this.activeIndex]) {
          window.location.href = this.liveResults[this.activeIndex].url;
        } else {
          this.goFull(this.$input.value.trim());
        }
      }
    });

    // "View all results" link
    this.$allLink.addEventListener('click', e => {
      e.preventDefault();
      this.goFull(this.$input.value.trim());
    });

    // Click a result row
    this.$results.addEventListener('click', e => {
      const item = e.target.closest('.philsan-result-item');
      if (item) window.location.href = item.dataset.url;
    });
  }

  // ── Navigate to full WP search results page ───────────────────────────────
  goFull(kw) {
    if (kw) window.location.href = this.SEARCH_PAGE + encodeURIComponent(kw);
  }

  // ── Fetch from WP REST API ────────────────────────────────────────────────
  async doSearch(kw) {
    try {
      const params = new URLSearchParams({
        search: kw,
        per_page: 8,
        type: 'post',
        // covers posts, pages, and CPTs
        subtype: 'any',
        // all subtypes
        _fields: 'id,title,url,type,subtype'
      });
      const res = await fetch(`${this.API_URL}?${params}`);
      const total = parseInt(res.headers.get('X-WP-Total') || '0', 10);
      const data = await res.json();
      if (!res.ok) throw new Error(data.message || 'API error');
      this.liveResults = data;
      this.renderResults(data, total, kw);
    } catch (err) {
      console.error('[GlobalSearch]', err);
      this.renderError();
    }
  }

  // ── Renderers ─────────────────────────────────────────────────────────────
  renderEmpty() {
    this.$results.innerHTML = '';
    this.$footer.classList.remove('is-visible');
    this.liveResults = [];
  }
  renderLoading() {
    this.$results.innerHTML = `
            <div class="philsan-state">
                <div class="philsan-spinner"></div>
                <span>Searching…</span>
            </div>`;
    this.$footer.classList.remove('is-visible');
  }
  renderError() {
    this.$results.innerHTML = `
            <div class="philsan-state philsan-state--error">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <span>Something went wrong. Please try again.</span>
            </div>`;
    this.$footer.classList.remove('is-visible');
  }
  renderResults(results, total, kw) {
    if (!results.length) {
      this.$results.innerHTML = `
                <div class="philsan-state">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="7"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <span>No results for <strong>${this.esc(kw)}</strong></span>
                </div>`;
      this.$footer.classList.remove('is-visible');
      return;
    }
    this.$results.innerHTML = results.map((r, i) => `
            <div class="philsan-result-item" role="option" tabindex="-1"
                 data-url="${this.esc(r.url)}" data-index="${i}">
                <div><span class="philsan-result-type">${this.esc(r.subtype)}</span></div>
                <div class="philsan-result-title">${this.esc(r.title)}</div>
                <div class="philsan-result-url">${this.esc(r.url)}</div>
            </div>`).join('');
    this.$count.textContent = `Showing ${results.length} of ${total} result${total !== 1 ? 's' : ''}`;
    this.$allLink.href = this.SEARCH_PAGE + encodeURIComponent(kw);
    this.$footer.classList.add('is-visible');
    this.activeIndex = -1;
  }

  // ── Arrow key highlight ───────────────────────────────────────────────────
  updateActive(items) {
    items.forEach(el => el.classList.remove('is-active'));
    if (this.activeIndex >= 0) {
      items[this.activeIndex].classList.add('is-active');
      items[this.activeIndex].scrollIntoView({
        block: 'nearest'
      });
    }
  }

  // ── Escape HTML ───────────────────────────────────────────────────────────
  esc(s) {
    return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GlobalSearch);

/***/ }),

/***/ "./javascripts/gsap.js":
/*!*****************************!*\
  !*** ./javascripts/gsap.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class GsapScrollAnimation {
  constructor() {
    gsap.registerPlugin(ScrollTrigger);

    // Loop through all sections
    gsap.utils.toArray(".gsap-container").forEach(section => {
      const elements = section.querySelectorAll(".gsap-fade-up");
      console.log("elements", elements);
      // Only animate if section has elements
      if (elements.length > 0) {
        gsap.from(elements, {
          scrollTrigger: {
            trigger: section,
            start: "top 80%",
            // when section top hits 80% of viewport height
            toggleActions: "play none none none" // play once
          },
          opacity: 0,
          y: 40,
          duration: 0.8,
          ease: "power2.out",
          stagger: 0.2
        });
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GsapScrollAnimation);

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
        const videoUrl = btn.getAttribute("data-video");
        console.log("videoUrl", videoUrl);
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
    this.$grid = document.getElementById("news-grid");
    this.$pagination = document.getElementById("news-pagination");

    // Store original grid so we can restore it when search is cleared
    this.originalGrid = this.$grid ? this.$grid.innerHTML : '';
    this.originalPagination = this.$pagination ? this.$pagination.innerHTML : '';
    this.timer = null;
    this.init();
  }
  init() {
    // Search icon click
    if (this.searchBtn) {
      this.searchBtn.addEventListener("click", () => this.handleSearch());
    }

    // Apply Filter button
    if (this.filterBtn) {
      this.filterBtn.addEventListener("click", () => {
        // Close sidebar
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');
        if (sidebar) sidebar.classList.remove('is-open');
        if (backdrop) backdrop.classList.add('hidden');
        document.body.style.overflow = '';
        this.handleSearch();
      });
    }

    // Real-time debounced search as user types
    if (this.searchInput) {
      this.searchInput.addEventListener("input", () => {
        clearTimeout(this.timer);
        const kw = this.searchInput.value.trim();
        if (kw === '' && !this.hasActiveFilters()) {
          this.restoreOriginal();
          return;
        }
        this.timer = setTimeout(() => this.handleSearch(), 400);
      });

      // Enter key
      this.searchInput.addEventListener("keydown", e => {
        if (e.key === "Enter") {
          clearTimeout(this.timer);
          this.handleSearch();
        }
      });
    }
  }
  hasActiveFilters() {
    return document.querySelectorAll(".taxonomy-filter-checkbox:checked, .date-filter-checkbox:checked").length > 0;
  }
  async handleSearch() {
    if (!this.$grid) return;
    const keyword = this.searchInput ? this.searchInput.value.trim() : "";

    // Collect taxonomy filters
    const taxonomyFilters = {};
    document.querySelectorAll(".taxonomy-filter-checkbox:checked").forEach(cb => {
      const taxonomy = cb.dataset.taxonomy;
      if (!taxonomyFilters[taxonomy]) taxonomyFilters[taxonomy] = [];
      taxonomyFilters[taxonomy].push(cb.value);
    });

    // Collect meta filters (date)
    const metaFilters = {};
    document.querySelectorAll(".date-filter-checkbox:checked").forEach(cb => {
      const metaKey = cb.dataset.meta;
      if (!metaFilters[metaKey]) metaFilters[metaKey] = [];
      metaFilters[metaKey].push(cb.value);
    });

    // If nothing to search, restore
    if (!keyword && !this.hasActiveFilters()) {
      this.restoreOriginal();
      return;
    }
    this.renderLoading();

    // Build query params
    const params = new URLSearchParams();
    if (keyword) params.append("keyword", keyword);
    if (Object.keys(taxonomyFilters).length > 0) params.append("taxonomies", JSON.stringify(taxonomyFilters));
    if (Object.keys(metaFilters).length > 0) params.append("meta", JSON.stringify(metaFilters));
    try {
      // Use AJAX to get fully rendered card HTML from PHP
      const fd = new FormData();
      fd.append('action', 'news_search');
      fd.append('keyword', keyword);
      fd.append('taxonomies', JSON.stringify(taxonomyFilters));
      fd.append('meta', JSON.stringify(metaFilters));
      fd.append('nonce', NewsSearchData.nonce);
      const res = await fetch(NewsSearchData.ajax_url, {
        method: 'POST',
        body: fd
      });
      const data = await res.json();
      if (data.success) {
        this.$grid.innerHTML = data.data.html;
        if (this.$pagination) this.$pagination.style.display = 'none';
      } else {
        this.renderError();
      }
    } catch (error) {
      console.error("Search error:", error);
      this.renderError();
    }
  }
  renderLoading() {
    if (!this.$grid) return;
    this.$grid.innerHTML = `
            <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 14px; color: #9ca3af;">
                <div style="width: 28px; height: 28px; border: 3px solid #e5e7eb; border-top-color: #096936; border-radius: 50%; animation: news-spin .7s linear infinite;"></div>
                <span style="font-size: 14px;">Searching…</span>
                <style>@keyframes news-spin { to { transform: rotate(360deg); } }</style>
            </div>
        `;
    if (this.$pagination) this.$pagination.style.display = 'none';
  }
  renderError() {
    if (!this.$grid) return;
    this.$grid.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #9ca3af; font-size: 14px;">
                Something went wrong. Please try again.
            </div>
        `;
  }
  restoreOriginal() {
    if (this.$grid) this.$grid.innerHTML = this.originalGrid;
    if (this.$pagination) {
      this.$pagination.innerHTML = this.originalPagination;
      this.$pagination.style.display = '';
    }
  }
}
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
      sidebar.classList.add('is-open');
      backdrop.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    };
    const closeSidebar = () => {
      sidebar.classList.remove('is-open');
      backdrop.classList.add('hidden');
      document.body.style.overflow = '';
    };
    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
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
/* harmony import */ var _javascripts_globalSearch__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../javascripts/globalSearch */ "./javascripts/globalSearch.js");
/* harmony import */ var _javascripts_faqAccordion__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../javascripts/faqAccordion */ "./javascripts/faqAccordion.js");
/* harmony import */ var _javascripts_mobileNavBehaviour__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../javascripts/mobileNavBehaviour */ "./javascripts/mobileNavBehaviour.js");
/* harmony import */ var _javascripts_gsap__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../javascripts/gsap */ "./javascripts/gsap.js");









document.addEventListener("DOMContentLoaded", function () {
  console.log("JS Running!!!");
  if (document.getElementById("mobile-nav")) {
    new _javascripts_headerScrollbehaviour__WEBPACK_IMPORTED_MODULE_4__["default"]();
    new _javascripts_mobileNavBehaviour__WEBPACK_IMPORTED_MODULE_7__["default"]();
  }
  const annualSpeakerModal = new _javascripts_38thSpeakerModal__WEBPACK_IMPORTED_MODULE_0__["default"]();
  if (document.querySelector(".speaker-item")) {
    annualSpeakerModal.handleModal();
  }
  if (document.getElementById("philsan-search-trigger")) {
    new _javascripts_globalSearch__WEBPACK_IMPORTED_MODULE_5__["default"]();
  }
  if (document.querySelector(".with-filters")) {
    new _javascripts_sidebarFilter__WEBPACK_IMPORTED_MODULE_2__["default"]();
    new _javascripts_newsEventSearch__WEBPACK_IMPORTED_MODULE_3__["default"]();
  }
  if (document.getElementById("faq-section")) {
    window.handleFaqAccordion = function (elementId, index) {
      new _javascripts_faqAccordion__WEBPACK_IMPORTED_MODULE_6__["default"]().handleFaqAcc(elementId, index);
    };
  }
  if (document.querySelector(".watch-video-btn")) {
    console.log("there's modal here");
    new _javascripts_informecialModal__WEBPACK_IMPORTED_MODULE_1__["default"]();
  }
  if (document.querySelector(".gsap-container")) {
    console.log("gsap starting..");
    new _javascripts_gsap__WEBPACK_IMPORTED_MODULE_8__["default"]();
  }
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map