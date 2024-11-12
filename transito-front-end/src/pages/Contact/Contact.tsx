import styles from "./style.module.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEraser, faMailBulk } from "@fortawesome/free-solid-svg-icons";
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
    try {
      const response = await axios.post(
        "127.0.0.1:8000/api/contact/submit",
        formFields
      );
      alert("Mensagem enviada com sucesso!");
      setFormFields({
        name: "",
        email: "",
        phone: "",
        message: "",
      });
    } catch (error) {
      console.error(error);
      alert("Houve um erro ao enviar a mensagem.");
    }
  };

  const handleClear = (e: React.MouseEvent<HTMLButtonElement>) => {
    e.preventDefault(); // Previne o comportamento padrão do botão
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
          />
          <input
            type="email"
            name="email"
            placeholder="Digite seu e-mail..."
            value={formFields.email}
            onChange={handleChange}
          />
          <input
            type="tel"
            name="phone"
            placeholder="Número do telefone..."
            value={formFields.phone}
            onChange={handleChange}
          />
        </div>
        <textarea
          name="message"
          placeholder="Mensagem..."
          value={formFields.message}
          onChange={handleChange}
        ></textarea>
        <button id={styles.clear_messages} onClick={handleClear}>
          Limpar <FontAwesomeIcon icon={faEraser} />
        </button>
        <button type="submit">
          Enviar <FontAwesomeIcon icon={faMailBulk} />
        </button>
      </form>
    </div>
  );
};
