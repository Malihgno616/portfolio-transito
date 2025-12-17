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
        <tbody>
             <tr class="bg-white border-b  hover:bg-gray-50">
                <td class="px-6 py-4 font-bold text-lg">${
                  response.id || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.nome || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.email || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.telefone || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg"></td>
             </tr>
        </tbody>
      `;
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
        <tbody>
             <tr class="bg-white border-b  hover:bg-gray-50">
                <td class="px-6 py-4 font-bold text-lg">${
                  response.id || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.nome || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.email || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.telefone || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg"></td>
             </tr>
        </tbody>
      `;
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
        <tbody>
             <tr class="bg-white border-b  hover:bg-gray-50">
                <td class="px-6 py-4 font-bold text-lg">${
                  response.id || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.nome || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.email || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg">${
                  response.telefone || ""
                }</td>
                <td class="px-6 py-4 font-bold text-lg"></td>
             </tr>
        </tbody>
      `;
    } catch (error) {
      console.error("Error fetching search results:", error);
    }
  });
});
