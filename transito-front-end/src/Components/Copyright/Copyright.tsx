import React from "react";
import styles from "./styles.module.scss";

export const Copyright: React.FC = () => {
  return ( 
    <div className={styles.copyright}>
      <p>&copy; 2024. Todos os direitos reservados.</p>
    </div>
  );
};
