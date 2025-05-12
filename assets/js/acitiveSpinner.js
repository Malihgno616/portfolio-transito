document.querySelector("form").addEventListener("submit", () => {

  const btnEnvio = document.getElementById("btn-enviar");
  const btnTxt = document.getElementById("btn-txt");
  const spinner = document.getElementById("spinner");

  btnEnvio.disabled = true;

  spinner.classList.remove("hidden");

  spinner.classList.add("flex");

  btnTxt.textContent = "Enviando...";
});
