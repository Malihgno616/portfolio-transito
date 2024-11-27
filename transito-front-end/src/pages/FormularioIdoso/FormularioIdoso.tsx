import { useState } from "react";
import styles from "./style.module.scss";
import {
  Box,
  FormControl,
  FormControlLabel,
  Radio,
  RadioGroup,
} from "@mui/material";
import { faSpinner } from "@fortawesome/free-solid-svg-icons";
import axios from "axios";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export const FormularioIdoso: React.FC = () => {
  const [representanteLegal, setRepresentanteLegal] = useState<string | null>(
    null
  );

  const [isLoading, setIsLoading] = useState(false);

  function handleChange(event: React.ChangeEvent<HTMLInputElement>) {
    setRepresentanteLegal(event.target.value);
  }

  const handleSubmit = async (event: React.FormEvent) => {
    event.preventDefault();

    setIsLoading(true);

    const form = event.target as HTMLFormElement;
    const newFormData = new FormData(form);

    alert("Os dados foram enviados com sucesso!!!");
    console.log("FormData enviado:", newFormData); // Adicionar log

    try {
      const response = await axios.post(
        "http://127.0.0.1:8000/form_idoso/submit",
        newFormData,
        {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        }
      );
      form.reset();
    } catch (error) {
      if (axios.isAxiosError(error)) {
        console.error("Erro na requisição:", error.response?.data); // Imprimir resposta do erro
        alert(`Erro na requisição: ${error.response?.data}`);
      } else {
        console.error("Erro desconhecido:", error);
        alert("Erro desconhecido");
      }
    } finally {
      setIsLoading(false);
    }
  };

  return (
    <div id={styles.titleForm}>
      <h1>Formulário do Idoso</h1>
      <p>Preencha o formulário para adquirir o cartão do idoso.</p>
      <form className={styles.form_container} onSubmit={handleSubmit}>
        <h2>Informações do Idoso</h2>
        <input type="text" placeholder="Nome" name="name" required />
        <label htmlFor="">Data de Nascimento</label>
        <input id={styles.date} type="date" name="birthday" />
        <label htmlFor="">Sexo</label>
        <select name="gender" id="Sexo" required>
          <option value="">Selecione...</option>
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
        </select>

        <input
          type="text"
          maxLength={9}
          placeholder="CEP"
          name="zip_code"
          required
        />
        <input
          type="text"
          maxLength={70}
          name="address"
          placeholder="Endereço (Rua, AV)"
          required
        />
        <input
          type="text"
          maxLength={70}
          placeholder="Complemento"
          name="complement"
        />
        <input type="text" placeholder="Bairro" required name="neighborhood" />
        <input type="text" placeholder="Número" required name="number" />
        <input type="text" placeholder="Cidade" required name="city" />
        <label htmlFor="">UF</label>
        <select name="state" id="Unidade Federal" required>
          <option value="">Selecione...</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
        <input type="tel" name="phone" placeholder="Telefone" required />
        <input type="text" name="rg" placeholder="RG" required />
        <label htmlFor="">Data de Expedição</label>
        <input id={styles.date} type="date" name="issuance_date" />
        <input type="text" placeholder="Expedido por..." name="issued_by" />

        <h2>Documentos necessários do Idoso</h2>
        <p>
          Selecione a cópia digitalizada de identidade (ou de documento
          equivalente.)
        </p>
        <p>Cópia do RG(OBRIGATÓRIO)</p>
        <input id="file_input" type="file" name="rg_copy_doc" required />

        <FormControl component="fieldset" margin="normal">
          <h2>Representante Legal</h2>
          <RadioGroup
            row
            name="representante_legal"
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
                <input type="text" placeholder="Nome" name="name" required />
                <label htmlFor="">Data de Nascimento</label>
                <input id={styles.date} type="date" name="birthday" />
                <label htmlFor="">Sexo</label>
                <select name="gender" id="Sexo" required>
                  <option value="">Selecione...</option>
                  <option value="M">Masculino</option>
                  <option value="F">Feminino</option>
                </select>
                <input
                  type="text"
                  maxLength={9}
                  placeholder="CEP"
                  name="zip_code"
                  required
                />
                <input
                  type="text"
                  maxLength={70}
                  name="address"
                  placeholder="Endereço (Rua, AV)"
                  required
                />
                <input
                  type="text"
                  maxLength={70}
                  placeholder="Complemento"
                  name="complement"
                />
                <input
                  type="text"
                  placeholder="Bairro"
                  required
                  name="neighborhood"
                />
                <input
                  type="text"
                  placeholder="Número"
                  required
                  name="number"
                />
                <input type="text" placeholder="Cidade" required name="city" />
                <label htmlFor="">UF</label>
                <select name="state" id="Unidade Federal" required>
                  <option value="">Selecione...</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espírito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
                </select>
                <input
                  type="tel"
                  name="phone"
                  placeholder="Telefone"
                  required
                />
                <input type="text" name="rg" placeholder="RG" required />
                <label htmlFor="">Data de Expedição</label>
                <input id={styles.date} type="date" name="issuance_date" />
                <input
                  type="text"
                  placeholder="Expedido por..."
                  name="issued_by"
                />

                <h2>Documentos necessários do Representante</h2>
                <p>
                  Selecione a cópia digitalizada de identidade (ou de documento
                  equivalente.)
                </p>
                <p>Cópia do RG(OBRIGATÓRIO)</p>
                <input
                  id="file_input"
                  type="file"
                  name="rg_copy_doc"
                  required
                />
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
                    name="representative_doc"
                    required
                  />
                </div>
              </div>
            </>
          )}
        </FormControl>
        <button type="submit" disabled={isLoading}>
          {isLoading ? <FontAwesomeIcon icon={faSpinner} spin /> : <>Enviar</>}
        </button>
      </form>
    </div>
  );
};
