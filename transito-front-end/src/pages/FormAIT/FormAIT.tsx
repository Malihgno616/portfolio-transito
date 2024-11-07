import styles from "./style.module.scss";

export const FormAIT: React.FC = () => {
  return (
    <div className={styles.container}>
      <h1>Formulário cópia de AIT</h1>
      <p>Para baixar o requerimento</p>
      <a href="/FormAIT">clique aqui</a>
      <p>
        Após o preenchimento encaminhar juntamente com os documentos
        digitalizados para o email ou para o nosso WhatsApp
      </p>
      <a href="#">email@email.com</a>
      <a href="#">WhatsApp Trânsito</a>
      <h2>Documentos Necessários</h2>
      <p>
        Requerimento – preenchido e assinado solicitando a microfilmagem de
        multas;
      </p>
      <p>
        Notificação da Multa – original ou cópia da notificação da multa do
        órgão municipal de trânsito de Leme/SP;
      </p>
      <p>
        Documento identificação – cópia de documento de identificação pessoal do
        proprietário do veículo ou condutor;
      </p>
      <p>CRLV – cópia do Certificado de Registro e Licenciamento de Veículo.</p>
    </div>
  );
};
