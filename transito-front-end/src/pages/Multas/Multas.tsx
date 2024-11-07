import styles from "./style.module.scss";

export const Multas: React.FC = () => {
  return (
    <div className={styles.container}>
      <h1>Multas</h1>
      <p>
        Disponibilizamos vários meios alternativos para serviços referente a
        multas de trânsito.
      </p>
      <p>
        Para Indicação de Condutor <a href="#">clique aqui</a>
      </p>
      <p>
        Para Recurso de Multa <a href="#">clique aqui</a>
      </p>
      <p>
        Para Formulário de Cópia de AIT <a href={"/FormAIT"}>clique aqui</a>
      </p>
      <p>Para demais solicitações entre em contato conosco neste email;</p>
      <a href="#">email@email.com</a>
      <p>
        Disponibilizamos nosso número de WhatsApp <strong>(12)1234-1234</strong>
      </p>
      <p>Nos envie mensagem diretamente pelo WhatsApp</p>
      <a href="#">Clique Aqui</a>
    </div>
  );
};
