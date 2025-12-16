axios
  .get("http://localhost/portfolio-transito/admin/search.php", {
    params: {
      type: "contact",
      name: "A",
    },
  })
  .then(function (response) {
    console.log(response.data);
  });


