// Evento para pesquisa de contatos
document.addEventListener("DOMContentLoaded", () => {
  const inputIdContact = document.getElementById("input-contact-id");

  const inputNameContact = document.getElementById("input-contact-name");

  const inputPhoneContact = document.getElementById("input-contact-phone");

  const tableBodyContact = document.getElementById("table-contact-body");

  tableBodyContact.classList.add(
    "w-full",
    "text-sm",
    "text-left",
    "rtl:text-right",
    "text-gray-500",
    "dark:text-gray-800"
  );

  inputNameContact.addEventListener("input", async (e) => {
    const query = e.target.value;

    try {
      const response = await axios.get(
        "http://localhost/portfolio-transito/admin/search.php",
        {
          params: {
            type: "contact",
            id: "",
            name: query,
            phone: "",
          },
        }
      );

      tableBodyContact.innerHTML = `
      <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">ID</th>
                  <th scope="col" class="px-6 py-3">Nome</th>
                  <th scope="col" class="px-6 py-3">Email</th>
                  <th scope="col" class="px-6 py-3">Telefone</th>
                  <th scope="col" class="px-6 py-3">Ações</th> 
              </tr>
      </thead>
      <tbody></tbody>
      `;

      const tbody = tableBodyContact.querySelector("tbody");

      if (response.data.data.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
              Nenhum contato encontrado
            </td>
          </tr>
        `;
      } else {
        response.data.data.forEach((contacts) => {
          tbody.innerHTML += `
            <tr class="bg-white border-b  hover:bg-gray-50">
              <td class="px-6 py-4 font-bold text-lg">${contacts.id || ""}</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.nome || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.email || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.telefone || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">
                <button type="button" data-modal-target="modal-${
                  contacts.id
                }" data-modal-toggle="modal-${
            contacts.id
          }" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">Mensagem</button>
              </td>
            </tr>
          `;
        });
      }
    } catch (error) {
      console.error("Error fetching search results:", error);
    }
  });

  inputIdContact.addEventListener("input", async (e) => {
    const query = e.target.value;

    try {
      const response = await axios.get(
        "http://localhost/portfolio-transito/admin/search.php",
        {
          params: {
            type: "contact",
            id: query,
            name: "",
            phone: "",
          },
        }
      );

      tableBodyContact.innerHTML = `
      <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">ID</th>
                  <th scope="col" class="px-6 py-3">Nome</th>
                  <th scope="col" class="px-6 py-3">Email</th>
                  <th scope="col" class="px-6 py-3">Telefone</th>
                  <th scope="col" class="px-6 py-3">Ações</th> 
              </tr>
      </thead>
      <tbody></tbody>
      `;

      const tbody = tableBodyContact.querySelector("tbody");

      if (response.data.data.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
              Nenhum contato encontrado
            </td>
          </tr>
        `;
      } else {
        response.data.data.forEach((contacts) => {
          tbody.innerHTML += `
            <tr class="bg-white border-b  hover:bg-gray-50">
              <td class="px-6 py-4 font-bold text-lg">${contacts.id || ""}</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.nome || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.email || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.telefone || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">
                <button type="button" data-modal-target="modal-${
                  contacts.id
                }" data-modal-toggle="modal-${
            contacts.id
          }" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">Mensagem</button>
              </td>
            </tr>
          `;
        });
      }
    } catch (error) {
      console.error("Error fetching search results:", error);
    }
  });

  inputPhoneContact.addEventListener("input", async (e) => {
    const query = e.target.value;

    try {
      const response = await axios.get(
        "http://localhost/portfolio-transito/admin/search.php",
        {
          params: {
            type: "contact",
            id: "",
            name: "",
            phone: query,
          },
        }
      );

      console.log(response);

      tableBodyContact.innerHTML = `
      <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">ID</th>
                  <th scope="col" class="px-6 py-3">Nome</th>
                  <th scope="col" class="px-6 py-3">Email</th>
                  <th scope="col" class="px-6 py-3">Telefone</th>
                  <th scope="col" class="px-6 py-3">Ações</th> 
              </tr>
      </thead>
      <tbody></tbody>
      `;

      const tbody = tableBodyContact.querySelector("tbody");

      if (response.data.data.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
              Nenhum contato encontrado
            </td>
          </tr>
        `;
      } else {
        response.data.data.forEach((contacts) => {
          tbody.innerHTML += `
            <tr class="bg-white border-b  hover:bg-gray-50">
              <td class="px-6 py-4 font-bold text-lg">${contacts.id || ""}</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.nome || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.email || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">${
                contacts.telefone || ""
              }</td>
              <td class="px-6 py-4 font-bold text-lg">
                <button type="button" data-modal-target="modal-${
                  contacts.id
                }" data-modal-toggle="modal-${
            contacts.id
          }" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">Mensagem</button>
              </td>
            </tr>
          `;
        });
      }
    } catch (error) {
      console.error("Error fetching search results:", error);
    }
  });
});

// Evento para pesquisa dos dados dos idosos
document.addEventListener("DOMContentLoaded", () => {});

// Evento para pesquisa dos dados dos deficientes/beneficiários
document.addEventListener("DOMContentLoaded", () => {});
