import * as s from "./styles";
import { BrowserRouter as Router, Route, Routes, Link } from "react-router-dom";

export const VagasEspeciais: React.FC = () => {
  return (
    <s.Container>
      <s.Title>Vagas Especiais</s.Title>
      <s.Text>
        As credenciais para vagas exclusivas contemplam as Resoluções 303 e 304
        do Conselho Nacional de Trânsito (Contran), ambas publicadas em
        18/12/2008, que destinam, respectivamente, 5% das vagas de uso público
        às pessoas idosas (a partir de 60 anos) e 2% para veículos que
        transportem pessoas "portadoras de deficiência e com dificuldade de
        locomoção"; e também Portaria Municipal xxxxxxxx.
      </s.Text>
      <s.SubTitle>CARTÃO IDOSO</s.SubTitle>
      <s.List>
        <s.ListItem>
          Pode realizar o cadastro pela internet para solicitar o cartão
          gratuitamente.
        </s.ListItem>
        <s.ListItem>
          O prazo para o cartão ficar pronto é de até 7 (sete) dias úteis.
        </s.ListItem>
        <s.ListItem>
          Assim que o cartão estiver pronto, será feito contato para agendamento
          da retirada do cartão.
        </s.ListItem>
      </s.List>
      <s.SubTitle>
        Para solicitar o Cartão do Idoso preencha este formulário.
      </s.SubTitle>
      <s.Link as={Link} to={"/formulario-idoso"}>
        CARTÃO DO IDOSO
      </s.Link>
      <s.SubTitle>CARTÃO DEFICIENTE FÍSICO</s.SubTitle>
      <s.List>
        <s.ListItem>
          Pode realizar o cadastro pela internet para solicitar o cartão
          gratuitamente.
        </s.ListItem>
        <s.ListItem>
          O prazo para o cartão ficar pronto é de até 7 (sete) dias úteis.
        </s.ListItem>
        <s.ListItem>
          Assim que o cartão estiver pronto, será feito contato para agendamento
          da retirada do cartão.
        </s.ListItem>
      </s.List>
      <s.SubTitle>
        Para solicitar o Cartão do Deficiente Físico preencha este formulário.
      </s.SubTitle>
      <s.Link as={Link} to={"/formulario-deficiente"}>
        CARTÃO DO DEFICIENTE FÍSICO
      </s.Link>
    </s.Container>
  );
};
