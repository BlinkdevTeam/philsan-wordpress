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

    handleSearch() {
        const value = this.searchInput.value.trim();
        console.log("Search value:", value);
    }
    }

// init class
export default NewsEventSearch;
