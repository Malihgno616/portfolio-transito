document.querySelector("form").addEventListener("submit", (e) => {
  const btnEnvio = document.getElementById("submit-btn");
  const btnTxt = document.getElementById("btn-text");
  const spinner = document.getElementById("spinner");

  btnEnvio.disabled = true;
  spinner.classList.remove("hidden");
  btnEnvio.classList.add("flex")
  btnTxt.textContent = "Acessando...";

});
