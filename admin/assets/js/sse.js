const evtSource = new EventSource("./sse.php");

evtSource.onmessage = (e) => {
  console.log(e.data);
};

evtSource.onerror = (e) => {
  console.log(e.data);
};
