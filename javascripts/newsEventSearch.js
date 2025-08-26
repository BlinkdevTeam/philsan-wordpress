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
        this.resultsContainer = document.getElementById("search-results");

        this.init();
    }

    init() {
        if (this.searchBtn && this.searchInput) {
            this.searchBtn.addEventListener("click", () => this.handleSearch());
        }

        // allow pressing "Enter" in the input
        if (this.searchInput) {
            this.searchInput.addEventListener("keyup", (e) => {
                if (e.key === "Enter") {
                    this.handleSearch();
                }
            });
        }
    }

    async handleSearch() {
        const value = this.searchInput.value.trim();

        if (!value) return;

        try {
            // call our REST API endpoint with keyword
            const res = await fetch(`/wp-json/global/v1/search?keyword=${encodeURIComponent(value)}`);
            const data = await res.json();

            console.log("API Results:", data);

            // filter results on the frontend as well (case-insensitive partial match)
            const filtered = data.filter(item =>
                item.title.toLowerCase().includes(value.toLowerCase())
            );

            this.renderResults(filtered);
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
            div.innerHTML = `<h3>${item.title}</h3>`;
            this.resultsContainer.appendChild(div);
        });
    }
}

// init class
export default NewsEventSearch;

