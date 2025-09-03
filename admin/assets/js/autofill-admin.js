function limpa_formulario_cep() {
    document.getElementById("rua").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
    document.getElementById("uf").value = "";
}

function meu_callback(conteudo) {
    console.log("Resposta do ViaCEP:", conteudo);
    
    if (!conteudo.erro) {
        document.getElementById("rua").value = conteudo.logradouro || "";
        document.getElementById("bairro").value = conteudo.bairro || "";
        document.getElementById("cidade").value = conteudo.localidade || "";
        document.getElementById("uf").value = conteudo.uf || "";
    } else {
        limpa_formulario_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    console.log("CEP digitado:", valor);
    
    let cep = valor.replace(/\D/g, "");
    
    if (cep !== "") {
        let validacep = /^[0-9]{8}$/;
        
        if (validacep.test(cep)) {
            // Mostra loading
            document.getElementById("rua").value = "Carregando...";
            document.getElementById("bairro").value = "Carregando...";
            document.getElementById("cidade").value = "Carregando...";
            document.getElementById("uf").value = "Carregando...";
            
            // Cria o script para chamar a API
            let script = document.createElement("script");
            
            // Define a função de callback com nome único
            window.meu_callback_viacep = function(conteudo) {
                meu_callback(conteudo);
            };
            
            script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback_viacep";
            
            // Remove scripts anteriores
            const scriptsAntigos = document.querySelectorAll('script[src*="viacep.com.br"]');
            scriptsAntigos.forEach(oldScript => oldScript.remove());
            
            document.body.appendChild(script);
        } else {
            limpa_formulario_cep();
            // alert("Formato de CEP inválido. Digite 8 números.");
        }
    } else {
        limpa_formulario_cep();
    }
}