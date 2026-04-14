const evtSource = new EventSource("sse.php");
const msg = document.getElementById("msg");

evtSource.onmessage = (e) => {
  console.log(e.data);
  msg.textContent = e.data;
};

evtSource.onerror = (e) => {
  console.error("SSE Error:", e);

  if (evtSource.readyState === EventSource.CLOSED) {
    console.log("Connection closed permanently");
  } else if (evtSource.readyState === EventSource.CONNECTING) {
    console.log("Reconnecting...");
  }
};