const temporarioOuPermanente = () => {
  const tempForm = document.getElementById("form-temp");
  const permForm = document.getElementById("form-perm");

  if (document.getElementById("flexRadioDefault1").checked) {
    tempForm.classList.remove("d-none");
    permForm.classList.add("d-none");
  } else {
    permForm.classList.remove("d-none");
    tempForm.classList.add("d-none");
  }
  window.onload = function () {
    temporarioOuPermanente();
  };
};
