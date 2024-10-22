import React from "react";
import logoLeme from "../../assets/image/file.jpeg";
import styles from "./style.module.scss";

export const Title: React.FC = () => {
  return (
    <div className={styles.title}>
      <div>
        <img src={logoLeme} alt="Logo Leme" />
        <h1>bem-vindo ao trânsito leme</h1>
      </div>
    </div>
  );
};
