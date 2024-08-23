 // Função para formatar a data
 function formatDate(date) {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return date.toLocaleDateString('pt-BR', options);
}

// Função para definir a data no elemento
function displayDate() {
  const today = new Date();
  document.getElementById('date').textContent = formatDate(today);
}

// Adiciona a data assim que o conteúdo da página for carregado
window.onload = displayDate;


