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
        this.applyFiltersBtn = document.querySelector("#sidebar button"); // Apply Filters button

        this.init();
    }

    init() {
        // Search button click
        if (this.searchBtn && this.searchInput) {
            this.searchBtn.addEventListener("click", () => this.handleSearch());
        }

        // Apply filters button click
        if (this.applyFiltersBtn) {
            this.applyFiltersBtn.addEventListener("click", () => this.handleSearch());
        }

        // Optional: Enter key in search input
        if (this.searchInput) {
            this.searchInput.addEventListener("keypress", e => {
                if (e.key === "Enter") {
                    this.handleSearch();
                }
            });
        }
    }

    // Helper to get all checked values
    getCheckedValues(selector) {
        return Array.from(document.querySelectorAll(selector + ":checked")).map(cb => cb.value);
    }

    async handleSearch() {
        const value = this.searchInput ? this.searchInput.value.trim() : "";

        // Build query params
        const params = new URLSearchParams();
        if (value) params.set("keyword", value);

        // Add selected dates
        const selectedDates = this.getCheckedValues(".date-filter-checkbox");
        
        if (selectedDates.length > 0) {
            params.set("date", selectedDates.join(","));
        }

        // Add selected categories
        const selectedCategories = this.getCheckedValues(".taxonomy-filter-checkbox");
        
        if (selectedCategories.length > 0) {
            params.set("category_filters", selectedCategories.join(","));
        }

        console.log("selectedDates", selectedDates)
        console.log("selectedCategories", selectedCategories)
        
        try {
            const res = await fetch(`/wp-json/global/v1/search?${params.toString()}`);
            const data = await res.json();

            console.log("API Results:", data);

            this.renderResults(data);
        } catch (error) {
            console.error("Search error:", error);
            if (this.resultsContainer) {
                this.resultsContainer.innerHTML = "<p class='text-red-600'>Error loading results.</p>";
            }
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
            div.classList.add("search-item", "p-4", "border-b");
            div.innerHTML = `
                <h3 class="font-bold text-lg">
                  <a href="${item.link}" target="_blank">${item.title}</a>
                </h3>
                <p class="text-sm text-gray-600">${item.date || ""} — ${item.author || ""}</p>
                <p class="text-sm text-gray-500">Categories: ${(item.categories || []).join(", ")}</p>
            `;
            this.resultsContainer.appendChild(div);
        });
    }
}

// init class
export default NewsEventSearch;
