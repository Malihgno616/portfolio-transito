const quill = new Quill("#editor", {
  modules: {
    syntax: true,
    toolbar: "#toolbar-container",
  },
  placeholder: "Compose an epic...",
  theme: "snow",
});
