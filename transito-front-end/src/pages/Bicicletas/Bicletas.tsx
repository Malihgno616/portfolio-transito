import * as styles from "./style";

export const Bicicletas: React.FC = () => {
  return (
    <styles.Container>
      <styles.Title>Bicicletas</styles.Title>
      <styles.Text>
        Para retirada de bicicleta apreendida encaminhe sua mensagem para este e-mail.
      </styles.Text>
        <styles.Email>
          email@email.com
        </styles.Email>
      <styles.Text>
        Será encaminhado por via e-mail todas as informações para a retirada da bicicleta.
      </styles.Text>
    </styles.Container>
  );
};
