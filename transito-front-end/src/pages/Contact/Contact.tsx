import styles from "./style.module.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faEraser,
  faMailBulk,
  faSpinner,
} from "@fortawesome/free-solid-svg-icons";
import { useState } from "react";
import axios from "axios";

interface TextFormFields {
  name: string;
  email: string;
  phone: string;
  message: string;
}

export const Contact: React.FC = () => {
  const [formFields, setFormFields] = useState<TextFormFields>({
    name: "",
    email: "",
    phone: "",
    message: "",
  });

  const [isLoading, setIsLoading] = useState(false);

  const handleChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
  ) => {
    const { name, value } = e.target;
    setFormFields((prevFields) => ({
      ...prevFields,
      [name]: value,
    }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    setIsLoading(true);

    try {
      const response = await axios.post(
        "http://localhost:8000/api/contact/submit/",
        formFields,
        {
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      if (response.status === 201) {
        alert("Mensagem enviada com sucesso!");
        setFormFields({
          name: "",
          email: "",
          phone: "",
          message: "",
        });
      } else {
        alert("Erro ao enviar mensagem.");
      }
    } catch (error) {
      if (error instanceof Error) {
        alert("Erro ao enviar a mensagem: " + error.message);
      } else if (axios.isAxiosError(error)) {
        alert(
          "Erro ao enviar a mensagem: " +
            (error.response?.data || "Erro desconhecido")
        );
      } else {
        alert("Erro desconhecido.");
      }
    } finally {
      setIsLoading(false);
    }
  };

  const handleClear = (e: React.MouseEvent<HTMLButtonElement>) => {
    e.preventDefault();
    setFormFields({
      name: "",
      email: "",
      phone: "",
      message: "",
    });
  };

  return (
    <div className={styles.contact_form}>
      <h2>Entre em contato conosco preenchendo este formulário.</h2>
      <form onSubmit={handleSubmit}>
        <div className={styles.input_container}>
          <input
            type="text"
            name="name"
            placeholder="Digite seu nome..."
            value={formFields.name}
            onChange={handleChange}
            required
          />
          <input
            type="email"
            name="email"
            placeholder="Digite seu e-mail..."
            value={formFields.email}
            onChange={handleChange}
            required
          />
          <input
            type="tel"
            name="phone"
            placeholder="Número do telefone..."
            value={formFields.phone}
            onChange={handleChange}
            required
          />
        </div>
        <textarea
          name="message"
          placeholder="Mensagem..."
          value={formFields.message}
          onChange={handleChange}
          required
        ></textarea>
        <button id={styles.clear_messages} onClick={handleClear}>
          Limpar <FontAwesomeIcon icon={faEraser} />
        </button>
        <button type="submit" disabled={isLoading}>
          {isLoading ? (
            <FontAwesomeIcon icon={faSpinner} spin />
          ) : (
            <>
              Enviar <FontAwesomeIcon icon={faMailBulk} />
            </>
          )}
        </button>
      </form>
    </div>
  );
};
