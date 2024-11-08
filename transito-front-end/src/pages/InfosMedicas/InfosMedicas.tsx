import React from "react";
import styles from "./style.module.scss";

export const InfosMedicas: React.FC = () => {
  return (
    <div className={styles.container}>
      <form>
        <h1>Informações do médico</h1>
        <div className={styles.med_infos}>
          <input type="text" placeholder="Nome do médico" required />
          <input
            type="text"
            placeholder="Registro Profissiona (CRM)"
            required
          />
          <input type="tel" placeholder="Telefone" required />
          <input
            type="text"
            placeholder="Local de atendimento(Rua,AV) "
            required
          />
        </div>
        <h2>Informações Médicas</h2>
        <p>
          O requerente possui deficiência<strong> AMBULATÓRIA</strong> causada
          por:
        </p>
        <div className={styles.def_infos}>
          <label>
            Dificiência Física
            <input type="checkbox" />
          </label>
          <label>
            Membro(s) Superior(es)
            <input type="checkbox" />
          </label>
          <label>
            Membro(s) Inferior(es)
            <input type="checkbox" />
          </label>
          <br />
          <label>
            Utiliza cadeira de rodas
            <input type="checkbox" />
          </label>
          <label>
            Aparelhagem ortopédica
            <input type="checkbox" />
          </label>
          <label>
            Prótese
            <input type="checkbox" />
          </label>
          <br />
          <label>
            DEFICIÊNCIA AMBULATÓRIA AUTONOMA DECORRENTE DE INCAPACIDADE MENTAL
            <input type="checkbox" />
          </label>
          <label>
            DIFICULDADE DE LOCOMOÇÃO COM ALTO GRAU DE COMPROMENTIMENTO
            AMBULATÓRIO
            <input type="checkbox" />
          </label>
        </div>
        <p>
          Assinale o tempo. Em sentido <strong> temporário</strong>, informar o
          período previsto de restrição médica. No mínimo 2 meses e no máximo 1
          ano.
        </p>
        <p>
          Em sentido <strong> permanente</strong>, informar o período de início
          da validade do cartão, com prazo de (5) cinco anos.
        </p>
        <label>
          TEMPORÁRIA
          <input type="radio" />
        </label>
        <label>
          PERMANENTE
          <input type="radio" />
        </label>
        <p>
          Descrição e CID da lesão que justifique a incapacidade ou dificuldade
          ambular;
        </p>
        <textarea name="" id=""></textarea>
        <p>
          Selecione a cópia digitalizada do atestado médico da pessoa portadora
          de deficiência física permanente por período de validade de (05) cinco
          anos ou para pessoa com dificudade de locomoção temporária, por
          oeríodo de no mínimo (02) dois meses e no máximo (01) um ano.
        </p>
        <label htmlFor="">
          Cópia digitalizada do atestado médico(ORIGATÓRIO)
          <input type="file" />
        </label>
        <button type="submit">Enviar</button>
      </form>
    </div>
  );
};
