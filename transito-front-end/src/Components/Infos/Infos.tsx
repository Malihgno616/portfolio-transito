import React from "react";
import styles from "./style.module.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faPhone, faMailBulk } from "@fortawesome/free-solid-svg-icons";

export const Infos: React.FC = () => {
  return (
    <div id={styles.infos_container}>
      <div className={styles.infos}>
        <h1>O que oferecemos? </h1>
        <p>
          Oferecemos serviços e informações atualizadas sobre o trânsito de
          Leme/SP para que você navegue melhor em nossa cidade.
        </p>
        <h2>Meios de contato</h2>
        <p>Disponibilizamos meios de contato para esclarecer suas dúvidas.</p>
        <ul className={styles.meios_contato}>
          <li id={styles.whatsapp}>
            <a href="#">
              <FontAwesomeIcon icon={faPhone} />
              <span>Whatsapp</span>
            </a>
          </li>
          <li id={styles.Email}>
            <FontAwesomeIcon icon={faMailBulk} />
            <span>email@email.com</span>
          </li>
          <li id={styles.Telefone}>
            <FontAwesomeIcon icon={faPhone} />
            <span>(19)1234-1234</span>
          </li>
        </ul>
      </div>
    </div>
  );
};
