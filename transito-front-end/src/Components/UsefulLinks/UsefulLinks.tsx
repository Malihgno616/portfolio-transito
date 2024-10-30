import styles from "./style.module.scss";

export const UsefulLinks: React.FC = () => {
  return (
    <div className={styles.links_container}>
      <h2>Links Úteis</h2>
      <p>
        Caso necessite de consultar informações externas, consulte
        abaixo links que são muito úteis.
      </p>
      <ul>
        <li>
          <a href="#">Prefeitura de Leme</a>
        </li>
        <li>
          <a href="#">Câmara Municipal de Leme</a>
        </li>
        <li>
          <a href="#">Detran SP</a>
        </li>
        <li>
          <a href="#">Denatran</a>
        </li>
        <li>
          <a href="#">IPVA-SP</a>
        </li>
        <li>
          <a href="#">E-CNH</a>
        </li>
        <li>
          <a href="#">DER-SP</a>
        </li>
      </ul>
    </div>
  );
};
