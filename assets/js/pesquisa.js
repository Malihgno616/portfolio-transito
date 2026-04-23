document.addEventListener("DOMContentLoaded", () => {
  const termInput = document.getElementById("term");
  const formSubmit = document.getElementById("form-submit");
  const resultsContainer = document.getElementById("results");

  const fetchResults = async (query) => {
    try {
      const response = await axios.get("search-api.php", {
        params: { term: query },
      });
      console.log("Search results:", response.data);
      return response.data;
    } catch (error) {
      console.error("Error fetching search results:", error);
      return [];
    }
  };

  formSubmit.addEventListener("submit", async (e) => {
    e.preventDefault();
    const query = termInput.value.trim();
    const results = await fetchResults(query);
    console.log("Fetched results:", results);
  });

  termInput.addEventListener("input", async () => {
    const query = termInput.value.trim();
    const results = await fetchResults(query);
    console.log("Fetched results:", results);
  });

  resultsContainer.addEventListener("click", (e) => {
    
  });
});
