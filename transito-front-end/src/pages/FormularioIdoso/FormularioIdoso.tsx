import { useState } from "react";
import styles from "./style.module.scss";
import {
  Box,
  FormControl,
  FormControlLabel,
  Radio,
  RadioGroup,
} from "@mui/material";

export const FormularioIdoso: React.FC = () => {
  const [representanteLegal, setRepresentanteLegal] = useState<string | null>(
    null
  );

  function handleChange(event: React.ChangeEvent<HTMLInputElement>) {
    setRepresentanteLegal((event.target as HTMLInputElement).value);
  }

  return (
    <div id={styles.titleForm}>
      <h1>Formulário do Idoso</h1>
      <p>Preencha o formulário para adquirir o cartão do idoso.</p>
      <form className={styles.form_container}>
        <h2>Informações do Idoso</h2>
        <input type="text" placeholder="Nome" required />
        <label htmlFor="">Data de Nascimento</label>
        <input id={styles.date} type="date" />
        <label htmlFor="">Sexo</label>
        <select name="Sexo" id="Sexo" required>
          <option value="">Selecione...</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
        <input type="text" maxLength={9} placeholder="CEP" required />
        <input
          type="address"
          maxLength={70}
          placeholder="Endereço (Rua, AV)"
          required
        />
        <input type="text" maxLength={70} placeholder="Complemento" />
        <input type="text" placeholder="Bairro" required />
        <input type="text" placeholder="Número" required />
        <input type="text" placeholder="Cidade" required />
        <label htmlFor="">UF</label>
        <select name="Unidade Federal" id="Unidade Federal">
          <option value="Selecione">Selecione</option>
          <option value="Acre">Acre</option>
          <option value="Alagos">Alagoas</option>
          <option value="Amapá">Amapá</option>
          <option value="Amazonas">Amazonas</option>
          <option value="Bahia">Bahia</option>
          <option value="Ceará">Ceará</option>
          <option value="Distrito Federal">Distrito Federal</option>
          <option value="Espírito Santo">Espírito Santo</option>
          <option value="Goiás">Goiás</option>
          <option value="Maranhão">Maranhão</option>
          <option value="Mato Grosso">Mato Grosso</option>
          <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
          <option value="Minas Gerais">Minas Gerais</option>
          <option value="Pará">Pará</option>
          <option value="Paraíba">Paraíba</option>
          <option value="Paraná">Paraná</option>
          <option value="Pernambuco">Pernambuco</option>
          <option value="Piauí">Piauí</option>
          <option value="Rio de Janeiro">Rio de Janeiro</option>
          <option value="Rio Grande do Norte">Rio Grande do Norte</option>
          <option value="Rio Grande do Sul">Rio Grande do Sul</option>
          <option value="Rondônia">Rondônia</option>
          <option value="Roraima">Roraima</option>
          <option value="Santa Catarina">Santa Catarina</option>
          <option value="São Paulo">São Paulo</option>
          <option value="Sergipe">Sergipe</option>
          <option value="Tocantins">Tocantins</option>
        </select>
        <input type="phone" placeholder="Telefone" required />
        <input type="text" placeholder="RG" required />
        <label htmlFor="">Data de Expedição</label>
        <input id={styles.date} type="date" />
        <input type="text" placeholder="Expedido por..." />

        <h2>Documentos necessários do Idoso</h2>
        <p>
          Selecione a cópia digitalizada de identidade (ou de documento
          equivalente.)
        </p>
        <p>Cópia do RG(OBRIGATÓRIO)</p>
        <input id="file_input" type="file" name="Selecionar" required />

        <FormControl component="fieldset" margin="normal">
          <h2>Representante Legal</h2>
          <RadioGroup
            row
            name="Representante Legal"
            value={representanteLegal}
            onChange={handleChange}
          >
            <Box
              display="flex"
              justifyContent="center"
              alignItems="center"
              marginTop="1rem"
              width="100%"
            >
              <FormControlLabel value="Sim" control={<Radio />} label="Sim" />
              <FormControlLabel value="Não" control={<Radio />} label="Não" />
            </Box>
          </RadioGroup>

          {representanteLegal === "Sim" && (
            <>
              <div className={styles.representante_form}>
                <h2>Informações do representante</h2>
                <input type="text" placeholder="Nome" required />
                <input id={styles.date} type="date" />
                <label htmlFor="">Sexo</label>
                <select name="Sexo" id="Sexo" required>
                  <option value="">Selecione...</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
                <input type="text" maxLength={9} placeholder="CEP" required />
                <input
                  type="address"
                  maxLength={70}
                  placeholder="Endereço (Rua, AV)"
                  required
                />
                <input type="text" maxLength={70} placeholder="Complemento" />
                <input type="text" placeholder="Bairro" required />
                <input type="text" placeholder="Número" required />
                <input type="text" placeholder="Cidade" required />
                <label htmlFor="">UF</label>
                <select name="Unidade Federal" id="Unidade Federal">
                  <option value="Selecione">Selecione</option>
                  <option value="Acre">Acre</option>
                  <option value="Alagos">Alagoas</option>
                  <option value="Amapá">Amapá</option>
                  <option value="Amazonas">Amazonas</option>
                  <option value="Bahia">Bahia</option>
                  <option value="Distrito Federal">Distrito Federal</option>
                  <option value="Espírito Santo">Espírito Santo</option>
                  <option value="Goiás">Goiás</option>
                  <option value="Maranhão">Maranhão</option>
                  <option value="Mato Grosso">Mato Grosso</option>
                  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                  <option value="Minas Gerais">Minas Gerais</option>
                  <option value="Pará">Pará</option>
                  <option value="Paraíba">Paraíba</option>
                  <option value="Paraná">Paraná</option>
                  <option value="Pernambuco">Pernambuco</option>
                  <option value="Piauí">Piauí</option>
                  <option value="Rio de Janeiro">Rio de Janeiro</option>
                  <option value="Rio Grande do Norte">
                    Rio Grande do Norte
                  </option>
                  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                  <option value="Rondônia">Rondônia</option>
                  <option value="Roraima">Roraima</option>
                  <option value="Santa Catarina">Santa Catarina</option>
                  <option value="São Paulo">São Paulo</option>
                  <option value="Sergipe">Sergipe</option>
                  <option value="Tocantins">Tocantins</option>
                </select>
                <input type="phone" placeholder="Telefone" required />
                <input type="text" placeholder="RG" required />
                <label htmlFor="">Data de Expedição</label>
                <input id={styles.date} type="date" />
                <input type="text" placeholder="Expedido por..." />
                <div>
                  <h2>Documentos necessários do Representante</h2>
                  <p>
                    Selecione a cópia digitalizada de identidade (ou de
                    documento equivalente.)
                  </p>
                  <p>Cópia do RG(OBRIGATÓRIO)</p>
                  <input
                    id="file_input"
                    type="file"
                    name="Selecionar"
                    required
                  />
                </div>
                <hr />
                <div>
                  <p>
                    - No caso de representante legal, selecione a cópia
                    digitalizada do documento comprovando que o requerente é
                    representante da pessoa idosa.
                  </p>
                  <p>Documento de comprovante de representante legal</p>
                  <input
                    id="file_input"
                    type="file"
                    name="Selecionar"
                    required
                  />
                </div>
              </div>
            </>
          )}
        </FormControl>
        <button type="submit">Enviar</button>
      </form>
    </div>
  );
};
