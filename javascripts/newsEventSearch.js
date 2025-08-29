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
            this.searchInput.addEventListener("keyup", (e) => {
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

        console.log("metaFilters", metaFilters)
        console.log("taxonomyFilters", taxonomyFilters)

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
            console.log("params", params.toString())
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
export default NewsEventSearch;

