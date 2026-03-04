let quill = new Quill("#editor", {
  modules: {
    toolbar: "#toolbar-container",
  },
  theme: "snow",
});

let form = document.querySelector("form");

form.onsubmit = function () {
  let conteudo = document.querySelector("input[name=conteudo]");
  conteudo.value = quill.root.innerHTML; // pega o HTML do editor
};
