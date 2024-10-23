import "./styles/global.css";
import { Header } from "./Components/Header/Header";
import { Title } from "./Components/Title/Title";
import { Infos } from "./Components/Infos/Infos";
import { CurrentDate } from "./Components/CurrentDate/CurrentDate";

function App() {
  return (
    <>
      <Header />
      <Title />
      <CurrentDate />
      <Infos />
    </>
  );
}

export default App;
