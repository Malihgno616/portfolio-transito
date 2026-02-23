document.addEventListener("DOMContentLoaded", () => {
  const inputContact = document.getElementById("input-contact");
  const modalContainer = document.getElementById("modal-container");
  const tableBodyContact = document.getElementById("table-contact-body");

  tableBodyContact.classList.add(
    "w-full",
    "text-sm",
    "text-left",
    "rtl:text-right",
    "text-gray-500",
    "dark:text-gray-800",
  );

  const fetchContacts = async (params) => {
    try {
      const response = await axios.get("search.php", {
        params: {
          type: "contact",
          ...params,
        },
      });

      return response.data.data;
    } catch (error) {
      console.error("Error fetching search results:", error);
      return [];
    }
  };

  const renderTable = (contacts) => {
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

    if (contacts.length === 0) {
      tbody.innerHTML = `
        <tr>
          <td colspan="5" class="px-6 py-4 text-center text-red-600 font-bold text-lg">
            Nenhum contato encontrado
          </td>
        </tr>
      `;
      return;
    }

    contacts.forEach((contact) => {
      tbody.innerHTML += `
        <tr class="bg-white border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-bold text-lg">${contact.id || ""}</td>
          <td class="px-6 py-4 font-bold text-lg">${contact.nome || ""}</td>
          <td class="px-6 py-4 font-bold text-lg">${contact.email || ""}</td>
          <td class="px-6 py-4 font-bold text-lg">${contact.telefone || ""}</td>
          <td class="px-6 py-4 font-bold text-lg">
            <a href="message-contact.php?id=${contact.id}" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">Mensagem</a>
          </td>
        </tr>
      `;
    });
  };

  const handleSearch = async (value) => {
    const contacts = await fetchContacts({ term: value });
    renderTable(contacts);
  };

  inputContact.addEventListener("input", async (e) => {
    const query = e.target.value;
    await handleSearch(query);
  });
});
