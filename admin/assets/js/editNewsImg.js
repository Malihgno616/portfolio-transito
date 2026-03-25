document.addEventListener("DOMContentLoaded", () => {
  const mainImageInput = document.querySelector("#dropzone-img-news");
  const defaultContent = document.querySelector("#default-content-news");
  const previewContent = document.querySelector("#preview-content-news");
  const previewContainer = document.querySelector("#news-image-preview");
  const fileNameSpan = document.querySelector("#news-file-name");
  const hiddenFileName = document.querySelector("#nome-aqv-news");

  if (mainImageInput) {
    mainImageInput.addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (!file) return;

      if (!file.type.match("image.*")) {
        alert("Por favor, selecione uma imagem válida");
        mainImageInput.value = "";
        return;
      }

      const reader = new FileReader();
      reader.onload = (ev) => {
        previewContainer.innerHTML = `
          <img src="${ev.target.result}" class="max-h-40 mx-auto rounded-lg object-contain">
        `;
        fileNameSpan.textContent = file.name;
        hiddenFileName.value = file.name;

        defaultContent.style.display = "none";
        previewContent.style.display = "flex";
      };
      reader.readAsDataURL(file);
    });
  }
});
