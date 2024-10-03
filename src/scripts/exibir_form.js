// Função para exibir ou ocultar os campos de representante legal
function toggleRepresentanteLegal(mostrar) {
  const formRepresentante = document.getElementById("representante-legal-form");
  if (mostrar) {
    formRepresentante.classList.remove("d-none");
  } else {
    formRepresentante.classList.add("d-none");
  }
}
