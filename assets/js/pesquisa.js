document.addEventListener("DOMContentLoaded", function () {
  const formSubmit = document.getElementById("form-submit");
  const searchInput = document.getElementById("term");

  formSubmit.addEventListener("click", async (e) => {
    e.preventDefault();
    const searchTerm = searchInput.value.trim();
    const data = await axios.get(`search-api.php?term=${searchTerm}`);
    data.then((response) => {
      const results = response.data.data;
      if (results.length > 0) {
        results.forEach((result) => {
          console.log(result);
        });
      } else {
        console.log("No results found.");
      }
    });
  });

});
