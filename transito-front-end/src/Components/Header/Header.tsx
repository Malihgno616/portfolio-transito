import React, { useState } from "react";
import style from "./style.module.scss";
import logoLeme from "../../assets/image/file.jpeg";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars } from "@fortawesome/free-solid-svg-icons";

export const Header: React.FC = () => {
  const [menuVisible, setMenuVisible] = useState(false);
  const toggleMenu = () => {
    setMenuVisible((prevState) => !prevState);
  };

  return (
    <header className={`${style.header} ${menuVisible ? style.active : ""}`}>
      <img src={logoLeme} alt="Logo Transito Leme" />
      <button onClick={toggleMenu} className={style.menu_bar}>
        <FontAwesomeIcon icon={faBars} />
      </button>
      <ul className={menuVisible ? style.visible : ""}>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#">Serviços</a>
        </li>
        <li>
          <a href="#">Contato</a>
        </li>
      </ul>
    </header>
  );
};
