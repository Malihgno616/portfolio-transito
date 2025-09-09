document.addEventListener('DOMContentLoaded', () => {

    document.getElementById("form-add-idoso").addEventListener("submit", (e) => {
        const btnEnvio = document.getElementById("submit-btn");
        const btnTxt = document.getElementById("btn-text");
        const spinner = document.getElementById("spinner");
        
            btnEnvio.disabled = true;
            spinner.classList.remove("hidden");
            btnEnvio.classList.add("flex")
            btnTxt.textContent = "Registrando...";
    });

});

document.addEventListener('DOMContentLoaded', () => {

    document.getElementById("form-edit-idoso").addEventListener("submit", (e) => {
        const btnEnvio = document.getElementById("submit-btn-edit");
        const btnTxt = document.getElementById("btn-text-edit");
        const spinner = document.getElementById("spinner-edit");
        
            btnEnvio.disabled = true;
            spinner.classList.remove("hidden");
            btnEnvio.classList.add("flex")
            btnTxt.textContent = "Atualizando...";
    });
    
});