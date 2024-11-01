import styled from "styled-components";

export const Container = styled.div`
  padding: 3rem;
  max-width: 750px;

  display: flex;
  flex-direction: column;
  margin: 0 auto;

  align-items: center;

  @media (max-width: 768px) {
    padding: 2rem;
  }
`;

export const Title = styled.h1`
  font-weight: 700;
  margin-bottom: 2rem;
`;

export const Text = styled.p`
  text-align: justify;
  margin-bottom: 1rem;
`;

export const Email = styled.a`
  text-decoration: none;
  background-color: #ffae11;
  padding: 0.5rem;
  border-radius: 0.5rem;
  margin-bottom: 1rem;
`;
