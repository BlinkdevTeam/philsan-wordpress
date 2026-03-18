class NewsEventSearch {
    constructor() {
        this.searchInput = document.getElementById("news-event-search-input");
        this.searchBtn   = document.getElementById("searchBtn");
        this.filterBtn   = document.getElementById("applyFilterBtn");

        // Detect which page we're on
        this.isEventsPage = !!document.getElementById("events-grid");
        this.isNewsPage   = !!document.getElementById("news-grid");

        this.$grid       = document.getElementById(this.isEventsPage ? "events-grid" : "news-grid");
        this.$gridMobile = document.getElementById("events-grid-mobile") || null;
        this.$pagination = document.getElementById(this.isEventsPage ? "events-pagination" : "news-pagination");

        if (!this.$grid) return;

        this.originalGrid         = this.$grid.innerHTML;
        this.originalGridMobile   = this.$gridMobile ? this.$gridMobile.innerHTML : '';
        this.originalPagination   = this.$pagination ? this.$pagination.innerHTML : '';

        this.ajaxAction = this.isEventsPage ? 'event_search' : 'news_search';
        this.timer      = null;

        this.init();
    }

    init() {
        if (this.searchBtn) {
            this.searchBtn.addEventListener("click", () => this.handleSearch());
        }

        if (this.filterBtn) {
            this.filterBtn.addEventListener("click", () => {
                const sidebar  = document.getElementById('sidebar');
                const backdrop = document.getElementById('backdrop');
                if (sidebar)  sidebar.classList.remove('is-open');
                if (backdrop) backdrop.classList.add('hidden');
                document.body.style.overflow = '';
                this.handleSearch();
            });
        }

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

            this.searchInput.addEventListener("keydown", (e) => {
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

        const taxonomyFilters = {};
        document.querySelectorAll(".taxonomy-filter-checkbox:checked").forEach(cb => {
            const taxonomy = cb.dataset.taxonomy;
            if (!taxonomyFilters[taxonomy]) taxonomyFilters[taxonomy] = [];
            taxonomyFilters[taxonomy].push(cb.value);
        });

        const metaFilters = {};
        document.querySelectorAll(".date-filter-checkbox:checked").forEach(cb => {
            const metaKey = cb.dataset.meta;
            if (!metaFilters[metaKey]) metaFilters[metaKey] = [];
            metaFilters[metaKey].push(cb.value);
        });

        if (!keyword && !this.hasActiveFilters()) {
            this.restoreOriginal();
            return;
        }

        this.renderLoading();

        const fd = new FormData();
        fd.append('action',     this.ajaxAction);
        fd.append('keyword',    keyword);
        fd.append('taxonomies', JSON.stringify(taxonomyFilters));
        fd.append('meta',       JSON.stringify(metaFilters));
        fd.append('nonce',      NewsSearchData.nonce);

        try {
            const res  = await fetch(NewsSearchData.ajax_url, { method: 'POST', body: fd });
            const data = await res.json();

            if (data.success) {
                this.$grid.innerHTML = data.data.html;
                if (this.$gridMobile) this.$gridMobile.innerHTML = data.data.html;
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
        const loadingHTML = `
            <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 14px; color: #9ca3af;">
                <div style="width: 28px; height: 28px; border: 3px solid #e5e7eb; border-top-color: #096936; border-radius: 50%; animation: news-spin .7s linear infinite;"></div>
                <span style="font-size: 14px;">Searching…</span>
                <style>@keyframes news-spin { to { transform: rotate(360deg); } }</style>
            </div>
        `;
        this.$grid.innerHTML = loadingHTML;
        if (this.$gridMobile) this.$gridMobile.innerHTML = loadingHTML;
        if (this.$pagination) this.$pagination.style.display = 'none';
    }

    renderError() {
        const errorHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #9ca3af; font-size: 14px;">
                Something went wrong. Please try again.
            </div>
        `;
        this.$grid.innerHTML = errorHTML;
        if (this.$gridMobile) this.$gridMobile.innerHTML = errorHTML;
    }

    restoreOriginal() {
        this.$grid.innerHTML = this.originalGrid;
        if (this.$gridMobile) this.$gridMobile.innerHTML = this.originalGridMobile;
        if (this.$pagination) {
            this.$pagination.innerHTML     = this.originalPagination;
            this.$pagination.style.display = '';
        }
    }
}

export default NewsEventSearch;