class NewsEventSearch {
    constructor() {
        this.searchInput = document.getElementById("news-event-search-input");
        this.searchBtn = document.getElementById("searchBtn");
        this.resultsContainer = document.getElementById("search-results");

        this.init();
    }

    init() {
        if (this.searchBtn && this.searchInput) {
        this.searchBtn.addEventListener("click", () => this.handleSearch());
        }
    }

        async handleSearch() {
            const value = this.searchInput.value.trim();

            if (!value) return;

            try {
                // Example: search in "news" post type
                const res = await fetch(`/wp-json/global/v1/search?keyword=${encodeURIComponent(value)}`);
                const data = await res.json();

                console.log("API Results:", data);

                this.renderResults(data);
            } catch (error) {
                console.error("Search error:", error);
            }
        }

        renderResults(results) {
            if (!this.resultsContainer) return;

            this.resultsContainer.innerHTML = ""; // clear old results

            if (results.length === 0) {
                this.resultsContainer.innerHTML = "<p>No results found.</p>";
                return;
            }

            results.forEach(item => {
                const div = document.createElement("div");
                div.classList.add("search-item");
                div.innerHTML = `
                    <h3>${item.title.rendered}</h3>
                    <a href="${item.link}">Read more</a>
                `;
                this.resultsContainer.appendChild(div);
            });
        }
    }

// init class
export default NewsEventSearch;
