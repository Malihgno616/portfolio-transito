document.addEventListener("DOMContentLoaded", () => {
  const inputSearchNews = document.getElementById("input-search");
  const tableNewsBody = document.getElementById("table-news-body");

  tableNewsBody.classList.add(
    "w-full",
    "text-sm",
    "text-left",
    "rtl:text-right",
    "text-gray-500",
  );

  const fetchNews = async (params) => {
    try {
      const response = await axios.get("search.php", {
        params: {
          type: "news",
          ...params,
        },
      });
      return response.data.data;
    } catch (error) {}
  };

  const renderTable = (news) => {
    tableNewsBody.innerHTML = `
        <thead class="w-2xl text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">Título</th>
            <th scope="col" class="px-6 py-3">Subtítulo</th>
            <th scope="col" class="px-6 py-3">Texto</th>
            <th scope="col" class="px-6 py-3">Ações</th> 
          </tr>
        </thead>
        <tbody></tbody>
        `;

    const tbody = tableNewsBody.querySelector("tbody");

    if (news.length === 0) {
      tbody.innerHTML = `
            <tr>
              <td colspan="7" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
                  Nenhuma notícia encontrada
              </td>
            </tr>
        `;
      return;
    }

    news.forEach((noticia) => {
      tbody.innerHTML += `
            <tr class="bg-white border-b  hover:bg-gray-50">
            <td class="px-6 py-4 text-lg">${noticia.titulo_principal}</td>
            <td class="px-6 py-4 text-lg">${noticia.subtitulo_principal}</td>
            <td class="px-6 py-4 text-lg">
              <div class="truncate max-w-lg">${noticia.texto}</div>
            </td>
            <td class="px-6 py-4 text-left">
                <a href="edit-news.php?id=${noticia.id_noticia}&id-content=${noticia.id_conteudo}" class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200"><i class="fa-solid fa-pen-ruler"></i></a>
            </td>
            </tr>
        `;
    });
  };

  const handleSearch = async (value) => {
    const news = await fetchNews({ term: value });
    renderTable(news);
  };

  inputSearchNews.addEventListener("input", async (e) => {
    const query = e.target.value;
    await handleSearch(query);
  });

});