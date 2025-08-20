class NewsEventSearch {
    constructor() {
        this.searchInput = document.querySelector("#news-event-search-input");
        this.resultsContainer = document.querySelector("#resultsContainer");

        if (!this.searchInput || !this.resultsContainer) return; // stop if not on a page with search

        this.registerEvents();
    }

    registerEvents() {
        this.searchInput.addEventListener("input", () => {
            const keyword = this.searchInput.value.trim();
            this.fetchResults({
                postType: this.detectPostType(),
                keyword,
            });
        });
    }

    detectPostType() {
        // Detect based on <body> classes (WordPress always adds these)
        if (document.body.classList.contains("post-type-archive-news")) {
            return "news";
        }
        if (document.body.classList.contains("post-type-archive-event")) {
            return "event";
        }
        // fallback
        return "post";
    }

    async fetchResults(params) {
        const query = new URLSearchParams(params).toString();

        try {
            const response = await fetch(`/wp-json/myplugin/v1/search?${query}`);
            const results = await response.json();

            this.renderResults(results);
        } catch (error) {
            console.error("Search failed:", error);
        }
    }

    renderResults(results) {
        if (!results || results.length === 0) {
            this.resultsContainer.innerHTML = `<p>No results found.</p>`;
            return;
        }

        this.resultsContainer.innerHTML = results
            .map(
                (item) => `
                <div class="search-item">
                    <a href="${item.link}">${item.title}</a>
                </div>
            `
            )
            .join("");
    }
}

// init class
export default NewsEventSearch;
