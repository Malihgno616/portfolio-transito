import "./styles/global.css";
import { Header } from "./Components/Header/Header";
import { Title } from "./Components/Title/Title";
import { Infos } from "./Components/Infos/Infos";
import { CurrentDate } from "./Components/CurrentDate/CurrentDate";
import { Slide } from "./Components/Slide/Slide";
import { Articles } from "./Components/Articles/Articles";
import { TitleBeforeNews } from "./Components/TitleBeforeNews/TitleBeforeNews";

function App() {
  return (
    <>
      <Header />
      <Title />
      <CurrentDate />
      <Slide />
      <Infos />
      <TitleBeforeNews />
      <Articles />
    </>
  );
}

export default App;
