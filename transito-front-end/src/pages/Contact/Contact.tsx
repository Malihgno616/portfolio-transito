import styles from "./style.module.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEraser, faMailBulk } from "@fortawesome/free-solid-svg-icons";

export const Contact: React.FC = () => {
  return (
    <div className={styles.contact_form}>
      <h2>Entre em contato conosco preenchendo este formulário.</h2>
      <form>
        <div className={styles.input_container}>
          <input type="text" placeholder="Digite seu nome..." />
          <input type="email" placeholder="Digite seu e-mail..." />
          <input type="tel" placeholder="Número do telefone..." />
        </div>
        <textarea placeholder="Mensagem..."></textarea>
        <button id={styles.clear_messages}>
          Limpar <FontAwesomeIcon icon={faEraser} />
        </button>
        <button type="submit">
          Enviar <FontAwesomeIcon icon={faMailBulk} />
        </button>
      </form>
    </div>
  );
};
