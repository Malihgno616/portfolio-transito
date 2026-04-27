document.addEventListener("DOMContentLoaded", () => {
  const termInput = document.getElementById("term");
  const resultsContainer = document.getElementById("results");

  const fetchResults = async (query) => {
    try {
      const response = await axios.get("search-api.php", {
        params: { term: query },
      });
      return response.data;
    } catch (error) {
      console.error("Erro:", error);
      return { data: [] };
    }
  };

  const renderResults = (news) => {
    if (!news.length) {
      resultsContainer.innerHTML = "<p>Nenhum resultado encontrado</p>";
      return;
    }

    resultsContainer.innerHTML = news.map(item => `
      <div class="bg-white border border-gray-200 shadow-sm rounded-md">
        <a href="#" class="block overflow-hidden">
          <img class="w-full h-48 object-cover"
            src="display-news-img?id=${item.id}&type=main"/>
        </a>

        <div class="p-5">
          <div class="ql-editor" style="max-height:150px; overflow:auto;">
            ${item.conteudo}
          </div>

          <form action="detalhe-noticia" method="get">
            <input type="hidden" name="id" value="${item.id}">
            <button type="submit" class="mt-3 bg-yellow-500 px-4 py-2 rounded">
              Ler mais
            </button>
          </form>
        </div>
      </div>
    `).join("");
  };

  termInput.addEventListener("input", async () => {
    const query = termInput.value.trim();

    if (query.length < 2) {
      resultsContainer.innerHTML = "";
      return;
    }

    const response = await fetchResults(query);
    renderResults(response.data || []);
  });
});