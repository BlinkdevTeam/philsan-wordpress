class NewsEventSearch {
    constructor() {
        document.addEventListener("DOMContentLoaded", () => {
            this.init();
        });
    }

    init() {
        const searchBtn = document.getElementById("searchBtn");
        if (!searchBtn) return; // safe check

        searchBtn.addEventListener("click", () => {
            this.fetchResults({
                postType: this.getValue("postType"),
                keyword: this.getValue("searchKeyword"),
                date: this.getValue("filterDate"),
                // author: this.getValue("filterAuthor"),
                category: this.getValue("filterCategory"),
            });
        });
    }

    getValue(id) {
        const el = document.getElementById(id);
        return el ? el.value : "";
    }

    async fetchResults(params) {
        try {
            const query = new URLSearchParams(params).toString();
            const response = await fetch(`/wp-json/global-search/v1/search?${query}`);
            const data = await response.json();

            this.renderResults(data);
        } catch (error) {
            console.error("Search error:", error);
        }
    }

    renderResults(data) {
        const resultsContainer = document.getElementById("resultsContainer");
        if (!resultsContainer) return;

        if (!data.length) {
            resultsContainer.innerHTML = "<p>No results found.</p>";
            return;
        }

        resultsContainer.innerHTML = data
            .map(
                (item) => `
                <div class="search-result">
                    <h3><a href="${item.link}">${item.title}</a></h3>
                    <p>${item.excerpt}</p>
                </div>
            `
            )
            .join("");
    }
}

// init class
export default NewsEventSearch;
