document.addEventListener("DOMContentLoaded", function () {
  const valTemporaria = document.getElementById("temporaria");
  const valPermanente = document.getElementById("permanente");
  const dataInicio = document.getElementById("data-inicio");
  const dataFim = document.getElementById("data-fim");
  const labelDataInicio = document.querySelector("label[for='data-inicio']");
  const labelDataFim = document.querySelector("label[for='data-fim']");

  function toggleDataFields() {
    if (valTemporaria.checked) {
      dataInicio.style.display = "block";
      labelDataInicio.style.display = "block";
      dataFim.style.display = "block";
      labelDataFim.style.display = "block";
    } else if (valPermanente.checked) {
      dataInicio.style.display = "block";
      labelDataInicio.style.display = "block";
      dataFim.style.display = "none";
      labelDataFim.style.display = "none";
    } else {
      dataInicio.style.display = "none";
      labelDataInicio.style.display = "none";
      dataFim.style.display = "none";
      labelDataFim.style.display = "none";
    }
  }

  valTemporaria.addEventListener("change", toggleDataFields);
  valPermanente.addEventListener("change", toggleDataFields);

  toggleDataFields();
});
