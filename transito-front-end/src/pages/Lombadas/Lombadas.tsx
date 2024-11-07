import styles from "./style.module.scss";

export const Lombadas: React.FC = () => {
  return (
    <div className={styles.container}>
      <h1>Lombadas</h1>
      <h2>Implantação de lombadas</h2>
      <p>
        Para solicitar a implantação de lombadas, deverá ser preenchido o
        <strong>
          {" "}
          Requerimento para Implantação de Redutor de Velocidade.
        </strong>
      </p>
      <p>
        Para baixar requerimento <a href="#">clique aqui</a>
      </p>

      <div className={styles.text_container}>
        <p>
          Nos casos em não possuir email, poderá depositar na Caixa de
          Documentos pela Setor de Trânsito, e caso falte algum documento
          entraremos em contato via email ou telefone. Por isso preencha
          corretamente o telefone e/ou email.
        </p>
        <p>
          Quando possível juntar assinatura dos moradores do trecho no local da
          instalação;
        </p>
        <p>
          Importante o preenchimento correto do local da implantação, bem como
          os dados e assinatura dos moradores que autorizarão a lombada defronte
          sua residência;
        </p>
        <p>
          O protocolo não caracteriza que o requerimento foi DEFERIDO, será
          realizado uma verificação do local, e estudo técnico para verificar a
          viabilidade da implantação;
        </p>
        <p>
          Caso seja constatado a necessidade da implantação, é preciso aguardar
          a disponibilidade de material (massa asfaltica) para confecção, o que
          pode demorar devido demandas de serviços;
        </p>
      </div>
      <h2>Retirada de Lombadas</h2>
      <p>
        Para solicitar a retirada de lombadas, deverá ser preenchido o
        <strong> Requerimento para Retirada de Redutor de Velocidade.</strong>
      </p>
      <p>
        Para baixar requerimento <a href="#">clique aqui</a>
      </p>
      <div className={styles.text_container}>
        <p>
          Após o preenchimento realizar o protocolo junto à PREFEITURA, de
          segunda à sexta-feira.
        </p>
        <p>
          Importante o preenchimento correto do local da retirada, bem como a
          motivação da retirada da lombada defronte sua residência;
        </p>
        <p>
          O protocolo não caracteriza que o requerimento foi DEFERIDO, será
          realizado uma verificação do local, e estudo técnico para verificar a
          possibilidade de retirada;
        </p>
        <p>
          Caso seja constatado a necessidade da retirada, é preciso aguardar a
          disponibilidade de material (massa asfaltica) para recomposição do
          asfalto, o que pode demorar devido demandas de serviços;
        </p>
      </div>
    </div>
  );
};
