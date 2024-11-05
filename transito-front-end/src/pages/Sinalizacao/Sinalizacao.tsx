import styles from "./styles.module.scss";

export const Sinalizacao: React.FC = () => {
  return (
    <div className={styles.container}>
      <h1>Sinalizações</h1>
      <p>
        Para solicitar qualquer tipo de sinalização, basta encaminhar uma
        mensagem para este email.
      </p>
      <a href="#">email@email.com.gov.br</a>
    </div>
  );
};
