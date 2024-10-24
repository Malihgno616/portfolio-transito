import React from "react";
import styles from "./style.module.scss";

import artigo from "../../assets/image/imgtransito01.png";

interface Article {
  title: string;
  provider: string;
  description: string;
  url: string;
  image: string;
}

const articles: Article[] = [
  {
    title: "Artigo 1",
    provider: "Fornecedor A",
    description: "Descrição do artigo 1",
    url: "https://example.com/artigo1",
    image: artigo,
  },
  {
    title: "Artigo 1",
    provider: "Fornecedor A",
    description: "Descrição do artigo 1",
    url: "https://example.com/artigo1",
    image: artigo,
  },
  {
    title: "Artigo 1",
    provider: "Fornecedor A",
    description: "Descrição do artigo 1",
    url: "https://example.com/artigo1",
    image: artigo,
  },
  {
    title: "Artigo 1",
    provider: "Fornecedor A",
    description: "Descrição do artigo 1",
    url: "https://example.com/artigo1",
    image: artigo,
  },
];

export const Articles: React.FC = () => {
  return (
    <article className={styles.news}>
      {articles.map((article, index) => (
        <div key={index} className={styles.articles}>
          <h2>{article.title}</h2>
          <p>{article.description}</p>
          <img src={article.image} alt={article.title} />
          <a href={article.url} target="_blank" rel="noopener noreferrer">
            Leia Mais
          </a>
        </div>
      ))}
    </article>
  );
};
