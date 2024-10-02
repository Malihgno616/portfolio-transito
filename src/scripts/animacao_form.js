function isElementeInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function animateForm() {
  const form = document.querySelector(".row.g-3");
  if (isElementeInViewport(form)) {
    form.classList.add("animate__animated", "animate__fadeInLeft");
    window.removeEventListener("scroll", animateForm);
  }
}

window.addEventListener("scroll", animateForm);