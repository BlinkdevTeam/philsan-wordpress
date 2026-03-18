class NewsSearch {
    constructor() {
        this.$input      = document.getElementById('news-event-search-input');
        this.$searchBtn  = document.getElementById('searchBtn');
        this.$grid       = document.getElementById('news-grid');
        this.$pagination = document.getElementById('news-pagination');

        if (!this.$input || !this.$grid) return;

        this.originalGrid       = this.$grid.innerHTML;
        this.originalPagination = this.$pagination ? this.$pagination.innerHTML : '';
        this.timer              = null;

        this.bindEvents();
    }

    bindEvents() {
        // Real-time debounced search as user types
        this.$input.addEventListener('input', () => {
            const kw = this.$input.value.trim();
            clearTimeout(this.timer);

            if (kw === '') {
                this.restoreOriginal();
                return;
            }

            this.timer = setTimeout(() => this.doSearch(kw), 400);
        });

        // Also trigger on Enter
        this.$input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                clearTimeout(this.timer);
                const kw = this.$input.value.trim();
                kw ? this.doSearch(kw) : this.restoreOriginal();
            }
        });

        // Trigger on search icon click
        if (this.$searchBtn) {
            this.$searchBtn.addEventListener('click', () => {
                clearTimeout(this.timer);
                const kw = this.$input.value.trim();
                kw ? this.doSearch(kw) : this.restoreOriginal();
            });
        }
    }

    doSearch(kw) {
        this.renderLoading();

        const fd = new FormData();
        fd.append('action',  'news_search');
        fd.append('keyword', kw);
        fd.append('nonce',   NewsSearchData.nonce);

        fetch(NewsSearchData.ajax_url, { method: 'POST', body: fd })
            .then(r => r.json())
            .then(res => {
                if (res.success) {
                    this.$grid.innerHTML = res.data.html;
                    if (this.$pagination) this.$pagination.style.display = 'none';
                } else {
                    this.renderError();
                }
            })
            .catch(() => this.renderError());
    }

    renderLoading() {
        this.$grid.innerHTML = `
            <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 14px; color: #9ca3af;">
                <div style="width: 28px; height: 28px; border: 3px solid #e5e7eb; border-top-color: #096936; border-radius: 50%; animation: news-spin .7s linear infinite;"></div>
                <span style="font-size: 14px;">Searching news…</span>
                <style>@keyframes news-spin { to { transform: rotate(360deg); } }</style>
            </div>
        `;
        if (this.$pagination) this.$pagination.style.display = 'none';
    }

    renderError() {
        this.$grid.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #9ca3af; font-size: 14px;">
                Something went wrong. Please try again.
            </div>
        `;
    }

    restoreOriginal() {
        this.$grid.innerHTML = this.originalGrid;
        if (this.$pagination) {
            this.$pagination.innerHTML = this.originalPagination;
            this.$pagination.style.display = '';
        }
    }
}

export default NewsSearch;