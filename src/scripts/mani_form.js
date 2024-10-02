function showForm() {
  // Esconde todos os formulários
  const forms = document.querySelectorAll(".hidden-form");
  forms.forEach((form) => (form.style.display = "none"));

  // Obtém o valor selecionado
  const selectedValue = document.getElementById("inputState").value;

  // Exibe o formulário correspondente
  if (selectedValue) {
    const formToShow = document.getElementById(
      `form${selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1)}`
    );
    if (formToShow) {
      formToShow.style.display = "block";
    }
  }
}
