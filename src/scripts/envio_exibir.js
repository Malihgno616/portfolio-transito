function exibirAlerta(event) {
  event.preventDefault(); // Impede o envio padrão do formulário

  // Captura os valores dos campos
  const nome = document.getElementById("Nome").value;
  const email = document.getElementById("Email").value;
  const telefone = document.getElementById("Telefone").value;
  const mensagem = document.getElementById("Mensagem").value;

  // Verifica se todos os campos estão preenchidos
  if (nome && email && telefone && mensagem) {
    alert("Mensagem enviada!");
    // Aqui você pode adicionar a lógica para enviar os dados para o servidor, se necessário
  } else {
    alert("Por favor, preencha todos os campos.");
  }
}