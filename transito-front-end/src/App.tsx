import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import "./styles/global.css";
import "animate.css";
import { Header } from "./Components/Header/Header";
import { Footer } from "./Components/Footer/Footer";
import { Copyright } from "./Components/Copyright/Copyright";
import { Title } from "./Components/Title/Title";
import { Infos } from "./Components/Infos/Infos";
import { CurrentDate } from "./Components/CurrentDate/CurrentDate";
import { Slide } from "./Components/Slide/Slide";
import { Articles } from "./Components/Articles/Articles";
import { TitleBeforeNews } from "./Components/TitleBeforeNews/TitleBeforeNews";
import { Services } from "./pages/Services/Services";
import { Contact } from "./pages/Contact/Contact";
import { UsefulLinks } from "./Components/UsefulLinks/UsefulLinks";
import React, { useEffect, useState } from "react";
import { TailSpin } from "react-loader-spinner";
import { Bicicletas } from "./pages/Bicicletas/Bicletas";
import { ZonaAzul } from "./pages/Zona-Azul/ZonaAzul";
import { VagasEspeciais } from "./pages/VagasEspeciais/VagasEspeciais";
import { FormularioIdoso } from "./pages/FormularioIdoso/FormularioIdoso";

function App() {
  const [loading, setLoading] = useState<boolean>(true);

  useEffect(() => {
    const loadData = async () => {
      // Simula um carregamento de dados
      await new Promise((resolve) => setTimeout(resolve, 2000));
      setLoading(false);
    };

    loadData();
  }, []);

  return (
    <Router>
      <Header />
      {loading ? (
        <div
          className="spinner-container"
          style={{
            display: "flex",
            alignItems: "center",
            justifyContent: "center",
            padding: "5rem",
          }}
        >
          <TailSpin color="#4e4e4e" height={80} width={80} />
        </div>
      ) : (
        <Routes>
          <Route
            path="/"
            element={
              <>
                <Title />
                <CurrentDate />
                <Slide />
                <Infos />
                <UsefulLinks />
                <TitleBeforeNews />
                <Articles />
              </>
            }
          />
          <Route path="/services" element={<Services />} />
          <Route path="/contact" element={<Contact />} />
          <Route path="/Bicicletas" element={<Bicicletas />} />
          <Route path="/Zona-Azul" element={<ZonaAzul />} />
          <Route path="/Vagas-especiais" element={<VagasEspeciais />} />
          <Route path="/formulario-idoso" element={<FormularioIdoso />} />
        </Routes>
      )}
      <Footer />
      <Copyright />
    </Router>
  );
}

export default App;
