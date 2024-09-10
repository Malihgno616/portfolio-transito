const currentDate = new Date();
const options = {
  weekday: 'long',
  year: 'numeric',
  month: 'long',
  day: 'numeric'
};
const formattedDate = currentDate.toLocaleDateString('pt-BR', options);
document.getElementById("current-date").textContent = formattedDate;


