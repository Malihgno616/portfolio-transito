import React from "react";
import style from "./style.module.scss";
import logoLeme from "../../assets/image/file.jpeg";

import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars } from "@fortawesome/free-solid-svg-icons";

export const Header: React.FC = () => {
  return (
    <header className={style.header}>
      <img src={logoLeme} alt="" />
      <ul>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#">Serviços</a>
        </li>
        <li>
          <a href="#">Contato</a>
        </li>
        <li>
          <FontAwesomeIcon icon={faBars} className={style.menu_bar} />
        </li>
      </ul>
    </header>
  );
};
