class NewsEventSearch {
    constructor() {
        this.searchInput = document.getElementById("news-event-search-input");
        this.searchBtn = document.getElementById("searchBtn");

        this.init();
    }

    init() {
        if (this.searchBtn && this.searchInput) {
        this.searchBtn.addEventListener("click", () => this.handleSearch());
        }
    }

        async handleSearch() {
            const value = this.searchInput.value.trim();
            console.log("Search value:", value);

            if (!value) return;

            console.log("Search value:", value);

            try {
                // Example: search in "news" post type
                const res = await fetch(`/wp-json/global/v1/search?keyword=${encodeURIComponent(value)}`);
                const data = await res.json();

                console.log("res", res)
                console.log("API Results:", data);

                // this.renderResults(data);
            } catch (error) {
                console.error("Search error:", error);
            }
        }
    }

// init class
export default NewsEventSearch;
