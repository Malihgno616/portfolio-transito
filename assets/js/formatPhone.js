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
