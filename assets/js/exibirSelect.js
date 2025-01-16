document.addEventListener("DOMContentLoaded", function () {
  const cartao4 = document.getElementById("cartao4");

  const motivos = document.querySelector(".motivo");

  const radios = document.querySelectorAll(
    'input[type="radio"][name="solicitacao"]'
  );

  radios.forEach(function (radio) {
    radio.addEventListener("change", function () {
      if (cartao4.checked) {
        motivos.style.display = "flex";
      } else {
        motivos.style.display = "none";
      }
    });
  });
});
