document
  .getElementById("copia-rg-idoso")
  .addEventListener("change", function (e) {
    const file = e.target.files[0];
    const uploadArea = document.getElementById("upload-area");
    const fileNameSpan = document.getElementById("file-name");

    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.onload = function (e) {
        // Cria a prévia da imagem
        uploadArea.innerHTML = `
							<img src="${e.target.result}" 
									alt="Prévia do documento" 
									class="w-full h-56 object-cover md:w-30">
						`;
      };
      reader.readAsDataURL(file);
      fileNameSpan.textContent = file.name;
    } else {
      // Reset se não for imagem
      uploadArea.innerHTML = `
						<svg class="w-8 h-8 mb-4 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
						</svg>
						<p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Selecione uma cópia digitalizada do RG do Idoso</span></p>
						<p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong></p>
					`;
      fileNameSpan.textContent = "";
    }
  });

document
  .getElementById("copia-rg-representante")
  .addEventListener("change", function (e) {
    const file = e.target.files[0];
    const uploadArea = document.getElementById("upload-area-representante");
    const fileNameSpan = document.getElementById("file-name-representante");

    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.onload = function (e) {
        // Cria a prévia da imagem
        uploadArea.innerHTML = `
							<img src="${e.target.result}" 
									alt="Prévia do documento" 
									class="w-full h-56 object-cover md:w-30">
						`;
      };
      reader.readAsDataURL(file);
      fileNameSpan.textContent = file.name;
    } else {
      // Reset se não for imagem
      uploadArea.innerHTML = `
						<svg class="w-8 h-8 mb-4 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
						</svg>
						<p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Selecione uma cópia digitalizada do RG do Representante</span></p>
						<p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong></p>
					`;
      fileNameSpan.textContent = "";
    }
  });

document
  .getElementById("comprovante-representante")
  .addEventListener("change", function (e) {
    const file = e.target.files[0];
    const uploadArea = document.getElementById("upload-comprovante-rep-idoso");
    const fileNameSpan = document.getElementById(
      "file-name-comp-representante"
    );

    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.onload = function (e) {
        // Cria a prévia da imagem
        uploadArea.innerHTML = `
							<img src="${e.target.result}" 
									alt="Prévia do documento" 
									class="w-full h-56 object-cover md:w-30">
						`;
      };
      reader.readAsDataURL(file);
      fileNameSpan.textContent = file.name;
    } else {
      // Reset se não for imagem
      uploadArea.innerHTML = `
						<svg class="w-8 h-8 mb-4 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
						</svg>
						<p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Selecione uma cópia digitalizada do RG do Representante</span></p>
						<p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong></p>
					`;
      fileNameSpan.textContent = "";
    }
  });
