document.querySelector("#file-input").addEventListener("change", function (e) {
  const fileInput = e.target;
  const fileNameDisplay = document.getElementById("file-name");
  const imagePreview = document.getElementById("image-preview");

  if (fileInput.files && fileInput.files[0]) {
    const file = fileInput.files[0];
    fileNameDisplay.textContent = file.name;
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = document.createElement("img");
      img.src = e.target.result;
      img.alt = "Pré-visualização da imagem";
      img.style.maxWidth = "80px";
      img.style.height = "80px";
      imagePreview.innerHTML = "";
      imagePreview.appendChild(img);
    };
    reader.readAsDataURL(file);
  } else {
    fileNameDisplay.textContent = "";
    imagePreview.innerHTML = "";
  }
});
