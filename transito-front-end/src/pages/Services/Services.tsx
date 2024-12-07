import React from "react";
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
import lombadaImg from "../../assets/image/lombada.png";
import "animate.css";

export const Services: React.FC = () => {
  return (
    <div id={styles.title_services_info}>
      <h1>Serviços Online</h1>
      <p>
        Abaixo, há opções dos serviços que oferecemos e de acordo com a sua
        necessidade.
      </p>
      <div className={styles.service_options}>
        <ul>
          <li>
            <a href="/Multas">
              <div className={styles.icon_service}>
                <FontAwesomeIcon icon={faCar} />
              </div>
            </a>
            <span>multas</span>
          </li>
          <li>
            <a href="/Vagas-especiais">
              <div className={styles.icon_service}>
                <FontAwesomeIcon icon={faWheelchair} />
              </div>
            </a>
            <span>vagas especiais</span>
          </li>
          <li>
            <a href="/Sinalizacoes">
              <div className={styles.icon_service}>
                <FontAwesomeIcon icon={faBan} />
              </div>
            </a>
            <span>sinalizações</span>
          </li>
          <li>
            <a href="/Interdicoes">
              <div className={styles.icon_service}>
                <FontAwesomeIcon icon={faRoadBarrier} />
              </div>
            </a>
            <span>interdições</span>
          </li>
          <li>
            <a href="Semaforos">
              <div className={styles.icon_service}>
                <FontAwesomeIcon icon={faTrafficLight} />
              </div>
            </a>
            <span>semáforos</span>
          </li>
          <li>
            <a href="/Lombadas">
              <div className={styles.icon_service}>
                <img src={lombadaImg} alt="lombadas" />
              </div>
            </a>
            <span>lombadas</span>
          </li>
          <div className={styles.center_wrapper}>
            <li>
              <a href="/Zona-Azul">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faLocationDot} />
                </div>
              </a>
              <span>zona-azul</span>
            </li>
            <li>
              <a href="/Bicicletas">
                <div className={styles.icon_service}>
                  <FontAwesomeIcon icon={faBicycle} />
                </div>
              </a>
              <span>bicicletas</span>
            </li>
          </div>
        </ul>
      </div>
    </div>
  );
};
