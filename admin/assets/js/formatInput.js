const formatDate = (input) => {
  let value = input.value.replace(/\D/g, "");

  if (value.length > 8) value = value.slice(0, 8);

  let day = value.slice(0, 2);
  let month = value.slice(2, 4);
  let year = value.slice(4, 8);

  let result = day; 

  if (month) result += "/" + month;
  if (year) result += "/" + year;

  input.value = result;
}

function formatPhone(input) {
  let value = input.value.replace(/\D/g, "");

  if (value.length > 11) value = value.slice(0, 11);

  let formatted = "";

  if (value.length <= 10) {
    // Telefone fixo
    formatted = value.replace(
      /^(\d{0,2})(\d{0,4})(\d{0,4})/,
      (_, ddd, prefix, sufix) => {
        return `${ddd ? "(" + ddd : ""}${ddd && prefix ? ")" : ""}${prefix}${
          sufix ? "-" + sufix : ""
        }`;
      }
    );
  } else {
    // Nº de Celular
    formatted = value.replace(
      /^(\d{0,2})(\d{0,5})(\d{0,4})/,
      (_, ddd, prefix, sufix) => {
        return `${ddd ? "(" + ddd : ""}${ddd && prefix ? ")" : ""}${prefix}${
          sufix ? "-" + sufix : ""
        }`;
      }
    );
  }

  input.value = formatted;
}

function formatRG(input) {
  let value = input.value.replace(/\D/g, "");

  value = value.slice(0, 9);

  if (value.length >= 1 && value.length <= 2) {
    value = value;
  } else if (value.length <= 5) {
    value = value.replace(/(\d{2})(\d+)/, "$1.$2");
  } else if (value.length <= 8) {
    value = value.replace(/(\d{2})(\d{3})(\d+)/, "$1.$2.$3");
  } else {
    value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, "$1.$2.$3-$4");
  }

  input.value = value;
}
