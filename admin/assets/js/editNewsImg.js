document.addEventListener("DOMContentLoaded", () => {

  const mainImageInput = document.querySelector("#dropzone-file-main-news");
  const mainImagePreview = document.querySelector("#main-image-preview");

  if (mainImageInput) {
    mainImageInput.addEventListener("change", e => {
      const file = e.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = ev => {
        mainImagePreview.innerHTML = `
          <img src="${ev.target.result}" class="max-h-40 mx-auto rounded-lg">
        `;
        document.querySelector('input[name="name-img-file-main"]').value = file.name;
      };
      reader.readAsDataURL(file);
    });
  }

  const contentImageInput = document.querySelector("#dropzone-file-content-news");
  const contentImagePreview = document.querySelector("#image-preview-content");

  if (contentImageInput) {
    contentImageInput.addEventListener("change", e => {
      const file = e.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = ev => {
        contentImagePreview.innerHTML = `
          <img src="${ev.target.result}" class="max-h-40 mx-auto rounded-lg">
        `;
        document.querySelector('input[name="name-img-file-content"]').value = file.name;
      };
      reader.readAsDataURL(file);
    });
  } 

});