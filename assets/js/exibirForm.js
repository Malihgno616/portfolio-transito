document.addEventListener("DOMContentLoaded", function () {
  const sim = document.getElementById("sim");
  const nao = document.getElementById("nao");

  const formRepresentante = document.getElementById("representante");

  const toggleRepresentanteForm = () => {
    if (sim.checked) {
      formRepresentante.style.display = "block";
    } else {
      formRepresentante.style.display = "none";
    }
  };

  sim.addEventListener("change", toggleRepresentanteForm);
  nao.addEventListener("change", toggleRepresentanteForm);

  toggleRepresentanteForm();
});
