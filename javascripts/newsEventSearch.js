class NewsEventSearch {
    constructor() {
        this.searchInput = document.getElementById("news-event-search-input");
        this.searchBtn   = document.getElementById("searchBtn");
        this.filterBtn   = document.getElementById("applyFilterBtn");
        this.$grid       = document.getElementById("news-grid");
        this.$pagination = document.getElementById("news-pagination");

        // Store original grid so we can restore it when search is cleared
        this.originalGrid       = this.$grid ? this.$grid.innerHTML : '';
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
                const sidebar  = document.getElementById('sidebar');
                const backdrop = document.getElementById('backdrop');
                if (sidebar)  sidebar.classList.remove('is-open');
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
        if (Object.keys(metaFilters).length > 0)     params.append("meta", JSON.stringify(metaFilters));

        try {
            // Use AJAX to get fully rendered card HTML from PHP
            const fd = new FormData();
            fd.append('action',     'news_search');
            fd.append('keyword',    keyword);
            fd.append('taxonomies', JSON.stringify(taxonomyFilters));
            fd.append('meta',       JSON.stringify(metaFilters));
            fd.append('nonce',      NewsSearchData.nonce);

            const res  = await fetch(NewsSearchData.ajax_url, { method: 'POST', body: fd });
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
            this.$pagination.innerHTML   = this.originalPagination;
            this.$pagination.style.display = '';
        }
    }
}

export default NewsEventSearch;