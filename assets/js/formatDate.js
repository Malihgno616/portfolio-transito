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
