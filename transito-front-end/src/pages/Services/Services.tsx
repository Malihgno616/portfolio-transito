import React, { useEffect, useState } from "react";
import styles from "./styles.module.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faCar,
  faWheelchair,
  faBan,
  faTrafficLight,
  faRoadBarrier,
  faLocationDot,
  faBicycle,
} from "@fortawesome/free-solid-svg-icons";
import { TailSpin } from "react-loader-spinner";
import lombadaImg from "../../assets/image/lombada.png";

export const Services: React.FC = () => {
  const [loading, setLoading] = useState<boolean>(true);

  useEffect(() => {
    const loadData = async () => {
      // Simula um carregamento de dados
      await new Promise((resolve) => setTimeout(resolve, 2000));
      setLoading(false);
    };

    loadData();
  }, []);

  return (
    <div id={styles.title_services_info}>
      <h1>Serviços Online</h1>
      <p>
        Abaixo, há opções dos serviços que oferecemos e de acordo com a sua
        necessidade.
      </p>
      <div className={styles.service_options}>
        {loading ? (
          <div
            style={{
              display: "flex",
              justifyContent: "center",
              marginTop: "20px",
            }}
          >
            <TailSpin height={80} width={80} color="black" ariaLabel="loading" />
          </div>
        ) : (
          <ul>
            <li>
              <a href="#">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faCar} />
                </div>
              </a>
              <span>multas</span>
            </li>
            <li>
              <a href="">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faWheelchair} />
                </div>
              </a>
              <span>vagas especiais</span>
            </li>
            <li>
              <a href="">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faBan} />
                </div>
              </a>
              <span>sinalizações</span>
            </li>
            <li>
              <a href="">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faRoadBarrier} />
                </div>
              </a>
              <span>interdições</span>
            </li>
            <li>
              <a href="">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faTrafficLight} />
                </div>
              </a>
              <span>semáforos</span>
            </li>
            <li>
              <a href="">
                <div className={styles.icon_service}>
                  <img src={lombadaImg} alt="lombadas" />
                </div>
              </a>
              <span>lombadas</span>
            </li>
            <div className={styles.center_wrapper}>
              <li>
                <a href="">
                  <div className={styles.icon_service}>
                    <FontAwesomeIcon icon={faLocationDot} />
                  </div>
                </a>
                <span>zona-azul</span>
              </li>
              <li>
                <a href="">
                  <div className={styles.icon_service}>
                    <FontAwesomeIcon icon={faBicycle} />
                  </div>
                </a>
                <span>bicicletas</span>
              </li>
            </div>
          </ul>
        )}
      </div>
    </div>
  );
};
