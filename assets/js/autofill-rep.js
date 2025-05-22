function limpa_formulário_cepRep() {
  document.getElementById("rua-rep").value = "";
  document.getElementById("bairro-rep").value = "";
  document.getElementById("cidade-rep").value = "";
  document.getElementById("uf-rep").value = "";
}

function meu_callbackRep(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById("rua-rep").value = conteudo.logradouro;
    document.getElementById("bairro-rep").value = conteudo.bairro;
    document.getElementById("cidade-rep").value = conteudo.localidade;
    document.getElementById("uf-rep").value = conteudo.uf;
  } //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_cepRep();
    alert("CEP não encontrado.");
  }
}

function pesquisacepRep(valor) {
  //Nova variável "cep" somente com dígitos.
  let cep = valor.replace(/\D/g, "");

  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    let validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById("rua-rep").value = "...";
      document.getElementById("bairro-rep").value = "...";
      document.getElementById("cidade-rep").value = "...";
      document.getElementById("uf-rep").value = "...";

      //Cria um elemento javascript.
      let script = document.createElement("script");

      //Sincroniza com o callback.
      script.src =
        "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callbackRep";

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_cepRep();
      alert("Formato de CEP inválido.");
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cepRep();
  }
}
