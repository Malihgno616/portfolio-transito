// Limpar campos

function limpaCampos(){
  var elements = document.getElementsByName("form_txt");
  elements.forEach(element => {
    console.log(element);
    element.value = "";
  })
}


