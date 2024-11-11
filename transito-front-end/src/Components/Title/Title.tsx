import React from "react";
import logoLeme from "../../assets/image/logo-transito-2018.png";
import styles from "./style.module.scss";

export const Title: React.FC = () => {
  return (
    <div className={styles.title}>
      <div>
        <img src={logoLeme} alt="Logo Leme" />
      </div>
    </div>
  );
};
