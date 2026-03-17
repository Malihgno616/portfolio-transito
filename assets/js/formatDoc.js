function formatDoc(input) {
  let value = input.value.replace(/\D/g, "");

  if (value.length > 9) {
    value = value.slice(0, 11);

    if (value.length <= 3) {
      value = value;
    } else if (value.length <= 6) {
      value = value.replace(/(\d{3})(\d+)/, "$1.$2");
    } else if (value.length <= 9) {
      value = value.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
    } else {
      value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }

  } else {
    value = value.slice(0, 9);

    if (value.length <= 2) {
      value = value;
    } else if (value.length <= 5) {
      value = value.replace(/(\d{2})(\d+)/, "$1.$2");
    } else if (value.length <= 8) {
      value = value.replace(/(\d{2})(\d{3})(\d+)/, "$1.$2.$3");
    } else {
      value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, "$1.$2.$3-$4");
    }
  }

  input.value = value;
}