function limpa_formulario_cep_idoso() {
    document.getElementById("rua").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
    document.getElementById("uf").value = "";
}

function meu_callback_idoso(conteudo) {
    console.log("Resposta do ViaCEP (Idoso):", conteudo);
    
    if (!conteudo.erro) {
        document.getElementById("rua").value = conteudo.logradouro || "";
        document.getElementById("bairro").value = conteudo.bairro || "";
        document.getElementById("cidade").value = conteudo.localidade || "";
        document.getElementById("uf").value = conteudo.uf || "";
    } else {
        limpa_formulario_cep_idoso();
        alert("CEP não encontrado para o idoso.");
    }
}

function pesquisacep(valor) {
    console.log("CEP idoso digitado:", valor);
    
    let cep = valor.replace(/\D/g, "");
    
    if (cep !== "") {
        let validacep = /^[0-9]{8}$/;
        
        if (validacep.test(cep)) {
            document.getElementById("rua").value = "Carregando...";
            document.getElementById("bairro").value = "Carregando...";
            document.getElementById("cidade").value = "Carregando...";
            document.getElementById("uf").value = "Carregando...";
            
            let script = document.createElement("script");
            
            window.meu_callback_viacep_idoso = function(conteudo) {
                meu_callback_idoso(conteudo);
            };
            
            script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback_viacep_idoso";
            
            const scriptsAntigos = document.querySelectorAll('script[src*="viacep.com.br"]');
            scriptsAntigos.forEach(oldScript => oldScript.remove());
            
            document.body.appendChild(script);
        } else {
            limpa_formulario_cep_idoso();
        }
    } else {
        limpa_formulario_cep_idoso();
    }
}

// Funções para o formulário do REPRESENTANTE
function limpa_formulario_cep_rep() {
    document.getElementById("rua-rep").value = "";
    document.getElementById("bairro-rep").value = "";
    document.getElementById("cidade-rep").value = "";
    document.getElementById("uf-rep").value = "";
}

function meu_callback_rep(conteudo) {
    console.log("Resposta do ViaCEP (Representante):", conteudo);
    
    if (!conteudo.erro) {
        document.getElementById("rua-rep").value = conteudo.logradouro || "";
        document.getElementById("bairro-rep").value = conteudo.bairro || "";
        document.getElementById("cidade-rep").value = conteudo.localidade || "";
        document.getElementById("uf-rep").value = conteudo.uf || "";
    } else {
        limpa_formulario_cep_rep();
        alert("CEP não encontrado para o representante.");
    }
}
