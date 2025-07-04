document
  .getElementById("boletim-ocorrencia")
  .addEventListener("change", function (e) {
    const file = e.target.files[0];
    const uploadArea = document.getElementById("upload-boletim");
    const fileNameInput = document.getElementById("file-name"); // Corrigido o ID

    if (
      file &&
      (file.type.startsWith("image/") || file.type === "application/pdf")
    ) {
      const reader = new FileReader();

      fileNameInput.value = file.name;

      if (file.type.startsWith("image/")) {
        reader.onload = function (e) {
          uploadArea.innerHTML = `
                  <img src="${e.target.result}" 
                       alt="Prévia do documento" 
                       class="w-full h-56 object-cover md:w-30">
              `;
        };
        reader.readAsDataURL(file);
      } else {
        // Se for PDF
        uploadArea.innerHTML = `
              <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <p class="mt-2 font-medium">Arquivo PDF selecionado</p>
          `;
      }
    } else {
      uploadArea.innerHTML = `
          <svg class="w-8 h-8 mb-4 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
          </svg>
          <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Cópia digitalizada do boletim de ocorrência.</span></p>
          <p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong></p>
      `;
      fileNameInput.value = "";
    }
  });
