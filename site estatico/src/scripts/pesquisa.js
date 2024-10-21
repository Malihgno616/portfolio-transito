document
  .getElementById("searchForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const searchQuery = document
      .getElementById("searchInput")
      .value.trim();

    if (searchQuery) {
      console.log("Pesquisar por:", searchQuery);
    } else {
      console.log("Por favor, insira um termo para pesquisa.");
    }


  });
