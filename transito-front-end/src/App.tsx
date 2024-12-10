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
import { Services } from "./pages/Services/Services";
import { Contact } from "./pages/Contact/Contact";
import { UsefulLinks } from "./Components/UsefulLinks/UsefulLinks";
import React, { useEffect, useState } from "react";
import { TailSpin } from "react-loader-spinner";
import { Bicicletas } from "./pages/Bicicletas/Bicletas";
import { ZonaAzul } from "./pages/Zona-Azul/ZonaAzul";
import { VagasEspeciais } from "./pages/VagasEspeciais/VagasEspeciais";
import { FormularioIdoso } from "./pages/FormularioIdoso/FormularioIdoso";
import { Sinalizacao } from "./pages/Sinalizacao/Sinalizacao";
import { Semaforos } from "./pages/Semaforos/Semaforos";
import { Lombadas } from "./pages/Lombadas/Lombadas";
import { Interdicoes } from "./pages/Interdicoes/Interdicoes";
import { Multas } from "./pages/Multas/Multas";
import { FormAIT } from "./pages/FormAIT/FormAIT";
import { FormDeficiente } from "./pages/FormDeficiente/FormDeficiente";
import { InfosMedicas } from "./pages/InfosMedicas/InfosMedicas";

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
      <Title />
      <Header />
      {loading ? (
        <div
          className="spinner-container"
          style={{
            display: "flex",
            alignItems: "center",
            justifyContent: "center",
            height: "100vh",
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
                <Slide />
                <CurrentDate />
                <Infos />
                <Articles />
                <UsefulLinks />
              </>
            }
          />
          <Route path="/services" element={<Services />} />
          <Route path="/contact" element={<Contact />} />
          <Route path="/bicicletas" element={<Bicicletas />} />
          <Route path="/zona-Azul" element={<ZonaAzul />} />
          <Route path="/vagas-especiais" element={<VagasEspeciais />} />
          <Route path="/formulario-idoso" element={<FormularioIdoso />} />
          <Route path="/sinalizacoes" element={<Sinalizacao />} />
          <Route path="/semaforos" element={<Semaforos />} />
          <Route path="/lombadas" element={<Lombadas />} />
          <Route path="/interdicoes" element={<Interdicoes />} />
          <Route path="/multas" element={<Multas />} />
          <Route path="/multas/formulario-ait" element={<FormAIT />} />
          <Route path="/formulario-deficiente" element={<FormDeficiente />} />
          <Route path="/informacoes-medicas" element={<InfosMedicas />} />
        </Routes>
      )}
      <Footer />
      <Copyright />
    </Router>
  );
}

export default App;
