function exibirMenu() {
  const buttonClick = document.getElementById("click");

  buttonClick.addEventListener("click", function () {
    const menuItems = document.querySelectorAll(".menu ul li");

    menuItems.forEach(function (menuItem) {
      menuItem.classList.add("animate__animated", "animate__slideInDown");
      if (menuItem.style.display === "none") {
        menuItem.style.display = "block";
      } else {
        menuItem.style.display = "none";
      }
    });
  });
}

exibirMenu();
