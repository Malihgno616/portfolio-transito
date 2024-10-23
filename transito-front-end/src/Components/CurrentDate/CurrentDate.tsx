import React, { useState, useEffect } from "react";
import styles from "./style.module.scss";

export const CurrentDate: React.FC = () => {
  const [currentDate, setCurrentDate] = useState<string>("");

  useEffect(() => {
    const updateDate = () => {
      const now = new Date();
      const options: Intl.DateTimeFormatOptions = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      };
      setCurrentDate(now.toLocaleDateString("pt-BR", options));
    };

    updateDate();
    const intervalId = setInterval(updateDate, 60000); // Atualiza a cada 60 segundos

    return () => clearInterval(intervalId); // Limpa o intervalo ao desmontar
  }, []);

  return <div className={styles.date}>{currentDate}</div>;
};


