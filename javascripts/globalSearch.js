class GlobalSearch {
    constructor() {
        this.timer       = null;
        this.activeIndex = -1;
        this.liveResults = [];

        // WordPress REST API endpoint — no PHP needed
        this.API_URL     = '/wp-json/wp/v2/search';
        this.SEARCH_PAGE = '/?s=';

        // ── DOM refs ──────────────────────────────────────────────────────────
        this.$trigger  = document.getElementById('philsan-search-trigger');
        this.$panel    = document.getElementById('philsan-search-panel');
        this.$backdrop = document.getElementById('philsan-search-backdrop');
        this.$input    = document.getElementById('philsan-search-input');
        this.$close    = document.getElementById('philsan-search-close');
        this.$results  = document.getElementById('philsan-search-results');
        this.$footer   = document.getElementById('philsan-search-footer');
        this.$count    = document.getElementById('philsan-search-count');
        this.$allLink  = document.getElementById('philsan-search-all-link');

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
        this.$trigger.addEventListener('click',  () => this.openSearch());
        this.$close.addEventListener('click',    () => this.closeSearch());
        this.$backdrop.addEventListener('click', () => this.closeSearch());

        document.addEventListener('keydown', (e) => {
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
        this.$input.addEventListener('keydown', (e) => {
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
        this.$allLink.addEventListener('click', (e) => {
            e.preventDefault();
            this.goFull(this.$input.value.trim());
        });

        // Click a result row
        this.$results.addEventListener('click', (e) => {
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
                search:   kw,
                per_page: 8,
                type:     'post',   // covers posts, pages, and CPTs
                subtype:  'any',    // all subtypes
                _fields:  'id,title,url,type,subtype',
            });

            const res   = await fetch(`${this.API_URL}?${params}`);
            const total = parseInt(res.headers.get('X-WP-Total') || '0', 10);
            const data  = await res.json();

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
            </div>`
        ).join('');

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
            items[this.activeIndex].scrollIntoView({ block: 'nearest' });
        }
    }

    // ── Escape HTML ───────────────────────────────────────────────────────────
    esc(s) {
        return String(s)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }
}

export default GlobalSearch;