// Evento para os dados dos idosos
document.addEventListener("DOMContentLoaded", () => {
  const inputIdIdoso = document.getElementById("input-id-idoso");
  const inputNomeIdoso = document.getElementById("input-nome-idoso");
  const inputRgIdoso = document.getElementById("input-rg-idoso");
  const inputNumRegIdoso = document.getElementById("input-num-reg-idoso");
  const inputPhoneIdoso = document.getElementById("input-phone-idoso");
  const tableBodyIdoso = document.getElementById("table-idoso-body");

  tableBodyIdoso.classList.add(
    "w-full",
    "text-sm",
    "text-left",
    "rtl:text-right",
    "text-gray-500",
    "dark:text-gray-800"
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
          <td class="px-6 py-4 text-lg text-center">${
            idoso.numero_registro || "0"
          }</td>
          <td class="px-6 py-4 text-lg">${
            idoso.telefone_idoso || ""
          }</td>
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

  const handleSearch = async (field, value) => {
    const params = { id: "", name: "", rg: "", reg_number: "", phone: "" };
    params[field] = value;

    const idosos = await fetchIdosos(params);
    renderTable(idosos);
  };

  const addSearchListener = (input, field) => {
    input.addEventListener("input", async (e) => {
      const query = e.target.value;
      await handleSearch(field, query);
    });
  };

  addSearchListener(inputIdIdoso, "id");
  addSearchListener(inputNomeIdoso, "name");
  addSearchListener(inputRgIdoso, "rg");
  addSearchListener(inputNumRegIdoso, "reg_number");
  addSearchListener(inputPhoneIdoso, "phone");
});
