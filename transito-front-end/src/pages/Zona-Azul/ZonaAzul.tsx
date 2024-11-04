import * as s from "./styles";

export const ZonaAzul: React.FC = () => {
  return (
    <s.Container>
      <s.Title>Zona-Azul</s.Title>
      <s.SubTitle>
        Valores e Período comercializados a partir do dia 04 de Dezembro de 2023
      </s.SubTitle>
      <s.List>
        <s.ListItem>30 minutos: R$ 1,15</s.ListItem>
        <s.ListItem>1 hora: R$ 2,25 </s.ListItem>
        <s.ListItem>2 horas: R$ 4,50</s.ListItem>
      </s.List>
      <s.SubTitle>Tolerância</s.SubTitle>
      <s.Text>
        O usuário possui tolerância de 10 minutos para a aquisição de tíquete
        nos pontos de venda ou parquímetros e 10 minutos para renovação do mesmo
        desde que não ultrapasse o período máximo de 2 horas na mesma vaga, além
        de contar com a comodidade e praticidade disponível para aquisição do
        tíquete via App Digipare, disponível smartphones com sistemas Android ou
        IOS.
      </s.Text>
      <s.SubTitle>Número de Vagas</s.SubTitle>
      <s.Text>
        Leme conta hoje com 1286 vagas de estacionamento rotativo Zona Azul
        distribuídas da seguinte forma. Idosos possuem 30 minutos de tolerância
        por dia para aquisição do tíquete e é obrigatória a utilização do cartão
        do idoso, dentro da validade e em via original no painel do veículo
        estacionado.
      </s.Text>
      <s.SubTitle>Perímetro Escolar</s.SubTitle>
      <s.Text>
        15 minutos para embarque e desembarque. Obrigatório uso do pisca alerta
        na região sinalizada. Escola Maria Joaquina de Arruda: de Segunda-Feira
        a Sexta-Feira das 15h40 às 16h20 EMEI Madre Eduarda Schaeffers: de
        Segunda-Feira a Sexta-Feira das 11h10 às 11h50, 12h10 às 12h50 e das
        16h40 às 17h20 Escola Coronel Augusto César: de Segunda-Feira a
        Sexta-Feira das 11h10 às 11h50, 12h10 às 12h50 e das 16h40 às 17h20.
      </s.Text>
      <s.SubTitle>Vagas para Idosos</s.SubTitle>
      <s.Text>
        Idosos possuem 30 minutos de tolerância por dia para aquisição do
        tíquete e é obrigatória a utilização do cartão do idoso, dentro da
        validade e em via original no painel do veículo estacionado. – Número de
        vagas de Idosos 72 vagas disponíveis para idosos devidamente
        identificadas, os mesmos possuem 30 minutos de tolerância por dia para
        aquisição do tíquete, é obrigatória a utilização do cartão do idoso,
        dentro da validade e em via original no painel do veículo estacionado.
      </s.Text>
      <s.SubTitle>Vagas para PcD - Pessoas com Deficiência </s.SubTitle>
      <s.Text>
        Os veículos estacionados nas referidas vagas, tem a obrigação de portar
        no painel o “CARTÃO DEFICIENTE-PcD” pessoal e intransferível, tendo
        ISENÇÃO DE ATÉ 2 HORAS POR VAGA, conforme regulamentação. – Número de
        vagas de Deficientes 34 vagas disponíveis estão devidamente
        identificadas, os mesmos devem deixar o cartão de deficiente físico em
        via original no painel do veículo estacionado.
      </s.Text>
      <s.SubTitle>Regularização</s.SubTitle>
      <s.Text>
        AVISO DE IRREGULARIDADE para pagamento em até 3 dias úteis: R$ 13,00.
        Caso não tenha efetuado a compra do tíquete em até 10 minutos.
      </s.Text>
      <s.SubTitle>COMAS</s.SubTitle>
      <s.Text>
        A Zona Azul Brasil desenvolve trabalho social ativo na cidade de Leme –
        SP, onde realiza participação financeira colaborativa repassando ao
        COMAS a renda bruta arrecadada de cada segunda quarta feira de cada mês
        do estacionamento rotativo administrado pela empresa Zona Azul Brasil,
        junto ao Conselho Municipal da Assistência Social – COMAS, do Município
        de Leme, o qual foi instituído pela Lei Municipal Complementar nº 176,
        de 26.04.1996, Lei Complementar nº 187 de 13/11/1996 e Lei Complementar
        nº 558 16/12/2009, revogadas pela Lei Municipal Complementar nº 661 de
        27 de junho de 2013. O COMAS se constitui em Órgão colegiado do sistema
        descentralizado e participativo da Assistência Social do Município, com
        caráter deliberativo, normativo, fiscalizador e permanente de composição
        paritária entre Poder Público e Sociedade Civil, vinculado à Secretaria
        de Assistência e Desenvolvimento Social – SADS. - Informações sobre a
        notificação O AIT – Aviso de Irregularidade de Trânsito do
        estacionamento rotativo municipal zona azul, o mesmo possui prazo de 3
        dias para regularização do Aviso de Infração junto a central de
        atendimento do munícipio pagando o valor de R$ 12,00, caso não tenha
        sido adquirido o tíquete em até 10 minutos. Caso nenhum aviso seja
        regularizado, estará sujeito à infração de trânsito com multa no valor
        de R$ R$ 195,23 e 5 pontos na CNH.
      </s.Text>
      <s.Text>Para mais informações, acesse o site da Zona-Azul.</s.Text>
      <s.Link href="https://zonaazulbrasil.com.br/leme/" target="_blank">
        Zona-Azul de Leme/SP
      </s.Link>
      <s.List>
        <s.ListItem>Email: contato@zonaazulbrasil.com.br</s.ListItem>
        <s.ListItem>Telefone: (19) 3555-3155</s.ListItem>
        <s.ListItem>R. Dr. Querubino Soeiro, 143 - Centro</s.ListItem>
        <s.ListItem>CEP: 13610-070 </s.ListItem>
        <s.ListItem>Leme, SP</s.ListItem>
      </s.List>
    </s.Container>
  );
};
