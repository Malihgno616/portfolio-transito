import React, { useState } from "react";
import style from "./style.module.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars } from "@fortawesome/free-solid-svg-icons";
import { Link } from "react-router-dom";

export const Header: React.FC = () => {
  const [menuVisible, setMenuVisible] = useState(false);
  const toggleMenu = () => {
    setMenuVisible((prevState) => !prevState);
  };

  return (
    <header className={`${style.header} ${menuVisible ? style.active : ""}`}>
      <button onClick={toggleMenu} className={style.menu_bar}>
        <FontAwesomeIcon icon={faBars} />
      </button>
      <ul className={menuVisible ? style.visible : ""}>
        <li>
          <Link to="/">Home</Link>
        </li>
        <li>
          <a href="/services">Serviços</a>
        </li>
        <li>
          <a href="/contact">Contato</a>
        </li>
      </ul>
    </header>
  );
};
