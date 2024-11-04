import styled from "styled-components";

export const Container = styled.div`
  padding: 5rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  max-width: 1050px;
  margin: 0 auto;
  width: 100%;
`;

export const Title = styled.h1`
  font-size: 2.5rem;
  font-weight: 400;
`;

export const SubTitle = styled.h2`
  font-weight: 400;
  font-size: 1.25rem;

`;

export const List = styled.ul`
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 1rem;
`;

export const ListItem = styled.li`
  font-weight: 400;
  font-size: 1rem;
`;

export const Text = styled.p`
  text-align: justify;
  font-weight: 300;
`;

export const Link = styled.a`
  text-decoration: none;
  background-color: #f0ae48;
  max-width: 300px;
  width: 100%;
  color: #f1f1fa;
  text-align: center;
  border-radius: 2rem;
  padding: 0.5rem;
  margin-bottom: 3rem;
  transition: all 0.5s ease;
  &:hover {
    filter: brightness(1.2);
  }
`;
