import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import "./styles/global.css";
import { Header } from "./Components/Header/Header";
import { Footer } from "./Components/Footer/Footer";
import { Copyright } from "./Components/Copyright/Copyright";
import { Title } from "./Components/Title/Title";
import { Infos } from "./Components/Infos/Infos";
import { CurrentDate } from "./Components/CurrentDate/CurrentDate";
import { Slide } from "./Components/Slide/Slide";
import { Articles } from "./Components/Articles/Articles";
import { TitleBeforeNews } from "./Components/TitleBeforeNews/TitleBeforeNews";
import { Services } from "./pages/Services"; // Importando a nova página
import { Contact } from "./pages/Contact"; // Importando a nova página

function App() {
  return (
    <Router>
      <Header />
      <Routes>
        <Route
          path="/"
          element={
            <>
              <Title />
              <CurrentDate />
              <Slide />
              <Infos />
              <TitleBeforeNews />
              <Articles />
            </>
          }
        />
        <Route path="/services" element={<Services />} />
        <Route path="/contact" element={<Contact />} />
      </Routes>
      <Footer />
      <Copyright />
    </Router>
  );
}

export default App;
