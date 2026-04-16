const evtSource = new EventSource("sse.php");
const toastContainer = document.getElementById("toast-container");

evtSource.onmessage = (e) => {
  const data = JSON.parse(e.data);
  // console.log("Received SSE:", data);
  toastContainer.insertAdjacentHTML(
    "beforeend",
    `
    <div class="toast animate__animated animate__fadeInDownBig flex items-center p-4 text-gray-500 bg-yellow-100 rounded-base shadow-xs" role="alert">

      <div class="ms-3 text-sm font-normal text-yellow-700">
        <a href="${data.link}" target="_blank" class="hover:underline">${data.descricao}</a>
      </div>

      <button type="button" class="btn-close text-black ms-auto flex items-center justify-center h-8 w-8" aria-label="Close">✕</button>

    </div>`,
  );
};

toastContainer.addEventListener("click", (event) => {
  if (event.target.classList.contains("btn-close")) {
    const toast = event.target.closest(".toast");
    if (toast) {
      toast.classList.remove("animate__fadeInDownBig");
      toast.classList.add("animate__fadeOut");

      setTimeout(() => {
        toast.remove();
      }, 500);
    }
  }
});

/*

evtSource.onerror = (e) => {
  console.error("SSE Error:", e);

  if (evtSource.readyState === EventSource.CLOSED) {
    console.log("Connection closed permanently");
  } else if (evtSource.readyState === EventSource.CONNECTING) {
    console.log("Reconnecting...");
  }
};

*/
