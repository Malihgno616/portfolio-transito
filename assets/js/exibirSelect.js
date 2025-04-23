// JavaScript Corrigido
document.addEventListener("DOMContentLoaded", function () {
  const motivoContainer = document.getElementById("motivoContainer");
  const radios = document.querySelectorAll('input[name="solicitacao"]');

  const updateMotivoVisibility = () => {
    const isSegundaVia =
      document.querySelector('input[name="solicitacao"]:checked')?.value ===
      "4";
    motivoContainer.classList.toggle("hidden", !isSegundaVia);
  };

  radios.forEach((radio) => {
    radio.addEventListener("change", updateMotivoVisibility);
  });

  // Atualizar estado inicial
  updateMotivoVisibility();
});
