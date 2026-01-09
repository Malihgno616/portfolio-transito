document.addEventListener("DOMContentLoaded", () => {
  const inputIdBeneficiario = document.getElementById("input-id-beneficiario");
  const inputNomeBeneficiario = document.getElementById("input-nome-beneficiario");
  const inputRgBeneficiario = document.getElementById("input-rg-beneficiario");
  const inputNascBeneficiario = document.getElementById("input-nasc-beneficiario");
  const inputNumRegBeneficiario = document.getElementById("input-num-reg-beneficiario");
  const inputPhoneBeneficiario = document.getElementById("input-phone-beneficiario");
  const tableBodyBeneficiario = document.getElementById("table-deficiente-body");
  
  tableBodyBeneficiario.classList.add(
    "w-full",
    "text-sm",
    "text-left",
    "rtl:text-right",
    "text-gray-500",
    "dark:text-gray-800"
  );
  
  const fetchBeneficiarios = async (params) => {
    try {
      const response = await axios.get("search.php", {
        params: {
          type: "form-deficiente",
          ...params,
        },
      });
      return response.data.data;
    } catch (error) {
      console.error("Error fetching search results:", error);
      return [];
    }
  };

  const renderTable = (beneficiarios) => {
    tableBodyBeneficiario.innerHTML = `
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

    const tbody = tableBodyBeneficiario.querySelector("tbody");

    if (beneficiarios.length === 0) {
      tbody.innerHTML = `
        <tr>
          <td colspan="7" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
            Nenhum beneficiário encontrado
          </td>
        </tr>
      `;
      return;
    }

    beneficiarios.forEach((beneficiario) => {
      tbody.innerHTML += `
        <tr class="bg-white border-b hover:bg-gray-50">
          <td class="px-6 py-4 text-lg">${beneficiario.id || ""}</td>
          <td class="px-6 py-4 text-lg">${beneficiario.nome_beneficiario || ""}</td>
          <td class="px-6 py-4 text-lg">${beneficiario.rg_beneficiario || ""}</td>
          ${
            parseInt(beneficiario.numero_registro) === 0
              ? `<td class="px-6 py-4 text-lg bg-red-200 text-center">${beneficiario.numero_registro || "0"}</td>`
              : `<td class="px-6 py-4 text-lg text-center bg-green-200">${beneficiario.numero_registro || ""}</td>`
          }
          <td class="px-6 py-4 text-lg">${beneficiario.telefone_beneficiario || ""}</td>
          <td class="px-6 py-4 text-lg">${beneficiario.nasc_beneficiario || ""}</td>
          <td class="px-6 py-4 text-lg">
            <a href="detalhes-card-deficiente.php?id-beneficiario=${beneficiario.id}" class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200 inline-block text-center"><i class="fa-solid fa-pen-ruler"></i></a>
          </td>
        </tr>
      `;
    });
  };

  const handleSearch = async (field, value) => {
    const params = {
      id: "",
      name: "",
      rg: "",
      reg_number: "",
      birth_date: "",
      phone: "",
    };
    params[field] = value;

    const beneficiarios = await fetchBeneficiarios(params);
    renderTable(beneficiarios);
  };

  const addSearchListener = (input, field) => {
    input.addEventListener("input", async (e) => {
      const query = e.target.value;
      await handleSearch(field, query);
    });
  };

  addSearchListener(inputIdBeneficiario, "id");
  addSearchListener(inputNomeBeneficiario, "name");
  addSearchListener(inputRgBeneficiario, "rg");
  addSearchListener(inputNascBeneficiario, "date");
  addSearchListener(inputNumRegBeneficiario, "reg-number");
  addSearchListener(inputPhoneBeneficiario, "phone");
});
