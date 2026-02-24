// Evento para os dados dos idosos
document.addEventListener("DOMContentLoaded", () => {
  const inputSearchIdoso = document.getElementById("input-search-idoso");
  const tableBodyIdoso = document.getElementById("table-idoso-body");

  tableBodyIdoso.classList.add(
    "w-full",
    "text-sm",
    "text-left",
    "rtl:text-right",
    "text-gray-500",
    "dark:text-gray-800",
  );

  const fetchIdosos = async (params) => {
    try {
      const response = await axios.get("search.php", {
        params: {
          type: "form-idoso",
          ...params,
        },
      });
      return response.data.data;
    } catch (error) {
      console.error("Error fetching search results:", error);
      return [];
    }
  };

  const renderTable = (idosos) => {
    tableBodyIdoso.innerHTML = `
      <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">Nome</th>
          <th scope="col" class="px-6 py-3">RG</th>
          <th scope="col" class="px-6 py-3">Nº Registro</th>
          <th scope="col" class="px-6 py-3">Telefone</th>
          <th scope="col" class="px-6 py-3">Data de Nascimento</th>
          <th scope="col" class="px-6 py-3">Ações</th> 
        </tr>
      </thead>
      <tbody></tbody>
    `;

    const tbody = tableBodyIdoso.querySelector("tbody");

    if (idosos.length === 0) {
      tbody.innerHTML = `
        <tr>
          <td colspan="5" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
            Nenhum idoso encontrado
          </td>
        </tr>
      `;
      return;
    }

    idosos.forEach((idoso) => {
      tbody.innerHTML += `
        <tr class="bg-white border-b hover:bg-gray-50">
          <td class="px-6 py-4 text-lg">${idoso.id || ""}</td>
          <td class="px-6 py-4 text-lg">${idoso.nome_idoso || ""}</td>
          <td class="px-6 py-4 text-lg">${idoso.rg_idoso || ""}</td>
          ${
            parseInt(idoso.numero_registro) === 0
              ? `<td class="px-6 py-4 text-lg bg-red-200 text-center">${idoso.numero_registro || "0"}</td>`
              : `<td class="px-6 py-4 text-lg text-center bg-green-200">${
                  idoso.numero_registro || ""
                }</td>`
          }
          <td class="px-6 py-4 text-lg">${idoso.telefone_idoso || ""}</td>
          <td class="px-6 py-4 text-lg">${idoso.nascimento_idoso || ""}</td>
          <td class="px-6 py-4 font-bold text-lg">
            <a href="detalhes-card-idoso.php?id-idoso=${idoso.id || ""}" 
                class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200 inline-block text-center">
                <i class="fa-solid fa-pen-ruler"></i>
            </a>
          </td>
        </tr>
      `;
    });
  };

  const handleSearch = async (value) => {
    const idosos = await fetchIdosos({ term: value });
    renderTable(idosos);
  };

  inputSearchIdoso.addEventListener("input", async (e) => {
    const query = e.target.value;
    await handleSearch(query);
  });
});
