const quill = new Quill("#editor", {
  theme: "snow",
  modules: {
    toolbar: "#toolbar-container",
  },
});

const conteudoBanco =
  document.getElementById("conteudo-original").value;

quill.root.innerHTML = conteudoBanco;

document.getElementById("form-edit-news").onsubmit = function () {

  document.getElementById("conteudo-edit").value =
    quill.root.innerHTML;

  return true;
};