import React from "react";
import styles from "./style.module.scss";
import logo from "../../assets/image/file.jpeg";

import {
  faClock,
  faMailBulk,
  faLocationDot,
  faPhone,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export const Footer: React.FC = () => {
  return (
    <footer className={styles.footer}>
      <div className={styles.container}>
        <img src={logo} alt="" />
        <ul>
          <li>
            <FontAwesomeIcon icon={faClock} /> Atendimento de Segunda à
            Sexta-Feira das 8:00 ás 16:00
          </li>
          <li>
            <FontAwesomeIcon icon={faMailBulk} /> email@email.com
          </li>
          <li>
            <address>
              <FontAwesomeIcon icon={faLocationDot} /> rua das ruas da silva,
              999
            </address>
          </li>
          <li>
            <FontAwesomeIcon icon={faPhone} /> (11) 99999-9999
          </li>
        </ul>
      </div>
    </footer>
  );
};
