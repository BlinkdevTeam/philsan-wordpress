class NewsSearch {
    constructor() {
        this.$input      = document.getElementById('news-event-search-input');
        this.$searchBtn  = document.getElementById('searchBtn');
        this.$grid       = document.getElementById('news-grid');
        this.$pagination = document.getElementById('news-pagination');

        if (!this.$input || !this.$grid) return;

        // Store original grid HTML so we can restore it on clear
        this.originalGrid       = this.$grid.innerHTML;
        this.originalPagination = this.$pagination ? this.$pagination.innerHTML : '';

        this.API_URL = '/wp-json/wp/v2/news'; // custom post type endpoint

        this.bindEvents();
    }

    bindEvents() {
        // Search on Enter key
        this.$input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const kw = this.$input.value.trim();
                kw.length >= 2 ? this.doSearch(kw) : this.restoreOriginal();
            }
        });

        // Search on icon click
        if (this.$searchBtn) {
            this.$searchBtn.addEventListener('click', () => {
                const kw = this.$input.value.trim();
                kw.length >= 2 ? this.doSearch(kw) : this.restoreOriginal();
            });
        }

        // Clear → restore original
        this.$input.addEventListener('input', () => {
            if (this.$input.value.trim() === '') {
                this.restoreOriginal();
            }
        });
    }

    async doSearch(kw) {
        this.renderLoading();

        try {
            const params = new URLSearchParams({
                search:        kw,
                per_page:      12,
                _embed:        true,  // includes featured image + categories
                _fields:       'id,title,excerpt,link,date,_embedded',
            });

            const res  = await fetch(`${this.API_URL}?${params}`);
            const data = await res.json();

            if (!res.ok) throw new Error('API error');

            this.renderResults(data, kw);

        } catch (err) {
            console.error('[NewsSearch]', err);
            this.renderError();
        }
    }

    renderLoading() {
        this.$grid.innerHTML = `
            <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 14px; color: #9ca3af;">
                <div style="width: 28px; height: 28px; border: 3px solid #e5e7eb; border-top-color: #096936; border-radius: 50%; animation: news-spin .7s linear infinite;"></div>
                <span style="font-size: 14px;">Searching news…</span>
            </div>
            <style>@keyframes news-spin { to { transform: rotate(360deg); } }</style>
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

    renderResults(posts, kw) {
        if (!posts.length) {
            this.$grid.innerHTML = `
                <div style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; gap: 12px; color: #9ca3af;">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <p style="font-size: 15px; font-weight: 600; color: #374151;">No results for "${this.esc(kw)}"</p>
                    <p style="font-size: 13px;">Try a different keyword</p>
                </div>
            `;
            if (this.$pagination) this.$pagination.style.display = 'none';
            return;
        }

        this.$grid.innerHTML = posts.map(post => {
            const title    = post.title?.rendered || '';
            const excerpt  = wp_strip_tags(post.excerpt?.rendered || '');
            const link     = post.link || '#';
            const img      = post._embedded?.['wp:featuredmedia']?.[0]?.source_url || '';
            const date     = post.date ? new Date(post.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : '';
            const cats     = post._embedded?.['wp:term']?.[0] || [];

            const catHTML = cats.map(c => `
                <span style="display: inline-block; font-size: 11px; font-weight: 600; color: #096936; background: #e9f5ee; border-radius: 999px; padding: 2px 10px; margin-right: 4px;">${this.esc(c.name)}</span>
            `).join('');

            const imgHTML = img
                ? `<img style="width: 100%; height: 300px; object-fit: cover; border-radius: 16px 0 16px 0;" src="${this.esc(img)}" alt="${this.esc(title)}">`
                : `<div style="width: 100%; height: 300px; background: #f3f4f6; border-radius: 16px 0 16px 0; display: flex; align-items: center; justify-content: center;">
                     <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                   </div>`;

            const descTrimmed = excerpt.length > 80 ? excerpt.substring(0, 80) + '...' : excerpt;
            const titleTrimmed = title.length > 60 ? title.substring(0, 60) + '...' : title;

            return `
                <div>
                    ${imgHTML}
                    <div style="padding-top: 16px;">
                        <div style="margin-bottom: 8px;">${catHTML}</div>
                        <div style="display: inline-block; padding: 2px 14px; margin-bottom: 12px; border: 1px solid #000; border-radius: 999px;">
                            <p style="font-size: 13px;">${this.esc(date)}</p>
                        </div>
                        <h2 style="font-size: 18px; font-weight: 600; color: #1f773a; margin-bottom: 6px;">${this.esc(titleTrimmed)}</h2>
                        <p style="font-size: 14px; color: #374151;">${this.esc(descTrimmed)}</p>
                    </div>
                    <div style="padding-top: 24px;">
                        <a href="${this.esc(link)}" style="display: inline-flex; align-items: center; gap: 8px; background: #f5c400; color: #1a1a1a; font-size: 14px; font-weight: 600; padding: 10px 20px; border-radius: 999px; text-decoration: none; transition: background .2s;">
                            View More →
                        </a>
                    </div>
                </div>
            `;
        }).join('');

        // Hide pagination during search results
        if (this.$pagination) this.$pagination.style.display = 'none';
    }

    restoreOriginal() {
        this.$grid.innerHTML = this.originalGrid;
        if (this.$pagination) {
            this.$pagination.innerHTML  = this.originalPagination;
            this.$pagination.style.display = '';
        }
    }

    // Strip basic HTML tags from excerpt
    wp_strip_tags(str) {
        return str.replace(/<[^>]*>/g, '').trim();
    }

    esc(s) {
        return String(s)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }
}

// Helper used inside renderResults
function wp_strip_tags(str) {
    return str.replace(/<[^>]*>/g, '').trim();
}

export default NewsSearch;