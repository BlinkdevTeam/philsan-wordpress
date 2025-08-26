// class NewsEventSearch {
//     constructor() {
//         this.searchInput = document.getElementById("news-event-search-input");
//         this.searchBtn = document.getElementById("searchBtn");
//         this.resultsContainer = document.getElementById("search-results");

//         this.init();
//     }

//     init() {
//         if (this.searchBtn && this.searchInput) {
//         this.searchBtn.addEventListener("click", () => this.handleSearch());
//         }
//     }

//         async handleSearch() {
//             const value = this.searchInput.value.trim();

//             if (!value) return;

//             try {
//                 // Example: search in "news" post type
//                 const res = await fetch(`/wp-json/global/v1/search?keyword=${encodeURIComponent(value)}`);
//                 const data = await res.json();

//                 console.log("API Results:", data);

//                 this.renderResults(data);
//             } catch (error) {
//                 console.error("Search error:", error);
//             }
//         }

//         renderResults(results) {
//             if (!this.resultsContainer) return;

//             this.resultsContainer.innerHTML = ""; // clear old results

//             if (results.length === 0) {
//                 this.resultsContainer.innerHTML = "<p>No results found.</p>";
//                 return;
//             }

//             results.forEach(item => {
//                 console.log("item", item)
//                 const div = document.createElement("div");
//                 div.classList.add("search-item");
//                 div.innerHTML = `<h3>${item.title}</h3>`;
//                 this.resultsContainer.appendChild(div);
//             });
//         }
//     }

// // init class
// export default NewsEventSearch;


class NewsEventSearch {
    constructor() {
        this.searchInput = document.getElementById("news-event-search-input");
        this.searchBtn = document.getElementById("searchBtn");
        this.filterBtn = document.getElementById("applyFilterBtn");
        this.resultsContainer = document.getElementById("search-results");

        this.init();
    }

    init() {
        // Normal search button
        if (this.searchBtn) {
            this.searchBtn.addEventListener("click", () => this.handleSearch());
        }

        // Apply Filter button
        if (this.filterBtn) {
            this.filterBtn.addEventListener("click", () => this.handleSearch());
        }

        // Enter key triggers search
        if (this.searchInput) {
            this.searchInput.addEventListener("keyup", (e) => {
                if (e.key === "Enter") {
                    this.handleSearch();
                }
            });
        }
    }

    async handleSearch() {
        const keyword = this.searchInput.value.trim();

        // collect selected filters
        const checkedFilters = [...document.querySelectorAll('#sidebar-filters input[type="checkbox"]:checked')]
            .map(cb => cb.value);

        // build query string
        const params = new URLSearchParams();
        if (keyword) params.append("keyword", keyword);
        if (checkedFilters.length > 0) params.append("filters", checkedFilters.join(","));

        try {
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

