import styles from "./style.module.scss";

export const Interdicoes: React.FC = () => {
  return (
    <div className={styles.container}>
      <h1>Interdições</h1>
      <p>
        Para solicitar a interdição de via, deverá ser preenchido o
        <strong> Requerimento para Interdição de Via Pública.</strong>
      </p>
      <p>
        Para baixar requerimento <a href="#">clique aqui</a>
      </p>
      <a href="#">email@email.com</a>
      <p>Preencher todos os campos do requerimento;</p>
      <p>
        O protocolo não caracteriza que o requerimento foi DEFERIDO, somente
        terá efeito com a expedição da AUTORIZAÇÃO ao requerente, que deverá ser
        retirado no Núcleo de Trânsito, de segunda à sexta-feira das 08h às 16h.
      </p>
      <p>
        A interdição e a liberação da via será realizada no horário deste
        requerimento pelos funcionários do setor, NÃO PODENDO SER ESTENDIDO.
      </p>
    </div>
  );
};
