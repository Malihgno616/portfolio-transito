<?php 

namespace Models;

require_once __DIR__.'/../config/database/conn.php';

require_once __DIR__.'/../config/database/env.php';

use PDO;

use PDOException;

class TelaSite {
    private $conn;
    private $pdo;

    public function __construct()
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }  

    public function getContent($id)
    {
        try {
            $query = "SELECT * FROM conteudo_paginas where id_tela = :id";
    
            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            error_log("Error: ". $e->getMessage());
            return false;
        }
    }
}


/*
ID's das telas no banco de dados

1 	Bicicletas
2 	Cartão do Deficiente
3 	Cartão do Idoso
4 	Contato
5 	Formulário Copia AIT
6 	Formulário de Recurso
7 	Indicação de condutor
8 	Interdições
9 	Lombadas
10 	Multas
11 	Semáforos
12 	Sinalização
13 	Vagas Especiais
14 	Zona Azul
*/