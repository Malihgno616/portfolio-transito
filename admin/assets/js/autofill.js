function limpa_formulário_cep() {
    document.getElementById("rua").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
    document.getElementById("uf").value = "";
}

function meu_callback(conteudo) {
    console.log("Resposta do ViaCEP:", conteudo); // Debug
    
    if (!("erro" in conteudo)) {
        document.getElementById("rua").value = conteudo.logradouro;
        document.getElementById("bairro").value = conteudo.bairro;
        document.getElementById("cidade").value = conteudo.localidade;
        document.getElementById("uf").value = conteudo.uf;
    } else {
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    console.log("CEP digitado:", valor); // Debug
    
    let cep = valor.replace(/\D/g, "");
    
    if (cep !== "") {
        let validacep = /^[0-9]{8}$/;
        
        if (validacep.test(cep)) {
            document.getElementById("rua").value = "...";
            document.getElementById("bairro").value = "...";
            document.getElementById("cidade").value = "...";
            document.getElementById("uf").value = "...";
            
            let script = document.createElement("script");
            script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";
            
            // Remove scripts anteriores para evitar acúmulo
            const scriptsAntigos = document.querySelectorAll('script[src*="viacep.com.br"]');
            scriptsAntigos.forEach(script => script.remove());
            
            document.body.appendChild(script);
        } else {
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } else {
        limpa_formulário_cep();
    }
}