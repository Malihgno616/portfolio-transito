<?php 

namespace Model;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class FormIdosoModel {
    
    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function paginatedIdosos($page, $limit)
    {
        try {
            if($page < 1) $page = 1;
            $offset = ($page -1) * $limit; 

            // Primeiro obtemos o total
            $countStmt = $this->pdo->query("SELECT COUNT(*) as total FROM cartao_idoso");
            $total = $countStmt->fetch()['total'];
            $totalPages = ceil($total / $limit);

            // Depois os dados paginados
            $stmt = $this->pdo->prepare("SELECT * FROM cartao_idoso ORDER BY id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $idosos = $stmt->fetchAll();
            
            return [
                'idosos' => $idosos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => $totalPages
            ];
            
        } catch (PDOException $e) {
            // Log do erro ou tratamento adequado
            error_log("Erro ao buscar idosos: " . $e->getMessage());
            return [
                'idosos' => [],
                'total' => 0,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => 0
            ];
        }
    }

    public function idosoCountTable()
    {
        try {
            $query = "SELECT COUNT(*) as total FROM cartao_idoso"; 
            $stmt = $this->pdo->query($query);
            $row = $stmt->fetch();
            return $row['total'];
        } catch (PDOException $e) {
            error_log("Erro ao contar idosos: " . $e->getMessage());
            return 0;
        }
    }

    public function getIdosoById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT id, copia_rg_idoso, nome_arquivo_rg_idoso, copia_rg_representante, nome_arquivo_rg_rep, comprovante_representante, nome_arquivo_comp_rep FROM cartao_idoso WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Erro ao buscar idoso por ID: " . $e->getMessage());
            return null;
        }
    }

    public function registerIdoso($nomeIdoso, $nascIdoso, $sexIdoso, $endIdoso, $numIdoso,  $bairroIdoso, $cepIdoso, $cidadeIdoso, $ufIdoso,  $telIdoso, $numRgIdoso, $expedicaoIdoso, $expedidoIdoso, $copiaRgIdoso, $nomeAqvRgIdoso,$compIdoso = "", $cnhIdoso = "", $validadeCnhIdoso = "", $emailIdoso = "",  $nomeRep = "", $emailRep = "", $endRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $numRgRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "",$comprovanteRep = null, $nomeAqvCompRep = "")
    {
        try {

            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("INSERT INTO 
            cartao_idoso 
            (
            nome_idoso,
            nascimento_idoso,
            genero_idoso,
            endereco_idoso,
            numero_endereco_idoso,
            complemento_idoso,
            bairro_idoso,
            cep_idoso,
            cidade_idoso,
            uf_idoso,
            telefone_idoso,
            rg_idoso,
            data_expedicao_idoso,
            expedido_idoso,
            cnh_idoso,
            validade_cnh_idoso,
            email_idoso,
            copia_rg_idoso,
            nome_arquivo_rg_idoso,
            nome_representante,
            email_representante,
            endereco_representante,
            numero_endereco_representante,
            complemento_representante,
            bairro_representante,
            cep_representante,
            cidade_representante,
            uf_representante,
            telefone_representante,
            rg_representante,
            data_expedicao_representante,
            expedido_representante,
            copia_rg_representante,
            nome_arquivo_rg_rep,
            comprovante_representante,
            nome_arquivo_comp_rep
            ) 
            VALUES 
            (
            :nome_idoso,
            :nascimento_idoso,
            :genero_idoso,
            :endereco_idoso,
            :numero_endereco_idoso,
            :complemento_idoso,
            :bairro_idoso,
            :cep_idoso,
            :cidade_idoso,
            :uf_idoso,
            :telefone_idoso,
            :rg_idoso,
            :data_expedicao_idoso,
            :expedido_idoso,
            :cnh_idoso,
            :validade_cnh_idoso,
            :email_idoso,
            :copia_rg_idoso,
            :nome_arquivo_rg_idoso,
            :nome_representante,
            :email_representante,
            :endereco_representante,
            :numero_endereco_representante,
            :complemento_representante,
            :bairro_representante,
            :cep_representante,
            :cidade_representante,
            :uf_representante,
            :telefone_representante,
            :rg_representante,
            :data_expedicao_representante,
            :expedido_representante,
            :copia_rg_representante,
            :nome_arquivo_rg_rep,
            :comprovante_representante,
            :nome_arquivo_comp_rep
            )
            ");
            
            $fieldsIdoso = [
            ':nome_idoso' => $nomeIdoso,
            ':nascimento_idoso' => $nascIdoso,
            ':genero_idoso' => $sexIdoso,
            ':endereco_idoso' => $endIdoso,
            ':numero_endereco_idoso' => $numIdoso,
            ':complemento_idoso' => $compIdoso,
            ':bairro_idoso' => $bairroIdoso,
            ':cep_idoso' => $cepIdoso,
            ':cidade_idoso' => $cidadeIdoso,
            ':uf_idoso' => $ufIdoso,
            ':telefone_idoso' => $telIdoso,
            ':rg_idoso' => $numRgIdoso,
            ':data_expedicao_idoso' => $expedicaoIdoso,
            ':expedido_idoso' => $expedidoIdoso,
            ':cnh_idoso' => $cnhIdoso,
            ':validade_cnh_idoso' => $validadeCnhIdoso,
            ':email_idoso' => $emailIdoso,
            ':copia_rg_idoso' => $copiaRgIdoso,
            ':nome_arquivo_rg_idoso' => $nomeAqvRgIdoso
            ];

            $fieldsRep = [
            ':nome_representante' => $nomeRep,
            ':email_representante' => $emailRep,
            ':endereco_representante' => $endRep,
            ':numero_endereco_representante' => $numRep,
            ':complemento_representante' => $compRep,
            ':bairro_representante' => $bairroRep,
            ':cep_representante' => $cepRep,
            ':cidade_representante' => $cidadeRep,
            ':uf_representante' => $ufRep,
            ':telefone_representante' => $telRep,
            ':rg_representante' => $numRgRep,
            ':data_expedicao_representante' => $expedicaoRep,
            ':expedido_representante' => $expedidoRep,
            ':copia_rg_representante' => $copiaRgRep,
            ':nome_arquivo_rg_rep' => $nomeAqvRgRep,
            ':comprovante_representante' => $comprovanteRep,
            ':nome_arquivo_comp_rep' => $nomeAqvCompRep
            ];

            $allFields = array_merge($fieldsIdoso, $fieldsRep);

            foreach ($allFields as $param => $value) {
                if ($value === null) {
                    $stmt->bindValue($param, null, PDO::PARAM_NULL);
                } else {
                    $stmt->bindValue($param, $value);
                }
            }
                                 
            $stmt->execute();

            $this->pdo->commit();

            return $this->pdo->lastInsertId();
            
        } catch(PDOException $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            error_log("Erro ao criar idoso: " . $e->getMessage());
            throw new \Exception("Erro ao criar idoso: " . $e->getMessage());
        }
    }
    
    public function updateIdoso($idIdoso, $nomeIdoso, $nascIdoso, $sexIdoso, $endIdoso, $numIdoso,  $bairroIdoso, $cepIdoso, $cidadeIdoso, $ufIdoso,  $telIdoso, $numRgIdoso, $expedicaoIdoso, $expedidoIdoso, $copiaRgIdoso, $nomeAqvRgIdoso, $compIdoso = "", $cnhIdoso = "", $validadeCnhIdoso = "", $emailIdoso = "",  $nomeRep = "", $emailRep = "", $endRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $numRgRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "",$comprovanteRep = null, $nomeAqvCompRep = "", $updateRgIdoso = false, $updateRgRep = false, $updateCompRep = false)
    {
        try {
            $this->pdo->beginTransaction();

            // Verificar se o idoso existe
            $queryCheck = "SELECT id FROM cartao_idoso WHERE id = :id";
            $checkStmt = $this->pdo->prepare($queryCheck);
            $checkStmt->bindValue(':id', $idIdoso, PDO::PARAM_INT);
            $checkStmt->execute();

            if ($checkStmt->rowCount() === 0) {
                $this->pdo->rollBack();
                return "Nenhum registro encontrado para atualizar.";
            }

            // Construir a query dinamicamente
            $queryParts = [];
            $params = [':id' => $idIdoso];
            
            // Campos obrigatórios do idoso
            $camposIdoso = [
                'nome_idoso' => $nomeIdoso,
                'nascimento_idoso' => $nascIdoso,
                'genero_idoso' => $sexIdoso,
                'endereco_idoso' => $endIdoso,
                'numero_endereco_idoso' => $numIdoso,
                'complemento_idoso' => $compIdoso,
                'bairro_idoso' => $bairroIdoso,
                'cep_idoso' => $cepIdoso,
                'cidade_idoso' => $cidadeIdoso,
                'uf_idoso' => $ufIdoso,
                'telefone_idoso' => $telIdoso,
                'rg_idoso' => $numRgIdoso,
                'data_expedicao_idoso' => $expedicaoIdoso,
                'expedido_idoso' => $expedidoIdoso,
                'cnh_idoso' => $cnhIdoso,
                'validade_cnh_idoso' => $validadeCnhIdoso,
                'email_idoso' => $emailIdoso
            ];
            
            foreach ($camposIdoso as $campo => $valor) {
                $queryParts[] = "$campo = :$campo";
                $params[":$campo"] = $valor;
            }
            
            // Campos do representante
            $camposRep = [
                'nome_representante' => $nomeRep,
                'email_representante' => $emailRep,
                'endereco_representante' => $endRep,
                'numero_endereco_representante' => $numRep,
                'complemento_representante' => $compRep,
                'bairro_representante' => $bairroRep,
                'cep_representante' => $cepRep,
                'cidade_representante' => $cidadeRep,
                'uf_representante' => $ufRep,
                'telefone_representante' => $telRep,
                'rg_representante' => $numRgRep,
                'data_expedicao_representante' => $expedicaoRep,
                'expedido_representante' => $expedidoRep
            ];
            
            foreach ($camposRep as $campo => $valor) {
                $queryParts[] = "$campo = :$campo";
                $params[":$campo"] = $valor;
            }
            
            // Campos de arquivos - só atualiza se a flag for true
            if ($updateRgIdoso) {
                $queryParts[] = "copia_rg_idoso = :copia_rg_idoso";
                $params[':copia_rg_idoso'] = $copiaRgIdoso;
                
                $queryParts[] = "nome_arquivo_rg_idoso = :nome_arquivo_rg_idoso";
                $params[':nome_arquivo_rg_idoso'] = $nomeAqvRgIdoso;
            }
            
            if ($updateRgRep) {
                $queryParts[] = "copia_rg_representante = :copia_rg_representante";
                $params[':copia_rg_representante'] = $copiaRgRep;
                
                $queryParts[] = "nome_arquivo_rg_rep = :nome_arquivo_rg_rep";
                $params[':nome_arquivo_rg_rep'] = $nomeAqvRgRep;
            }
            
            if ($updateCompRep) {
                $queryParts[] = "comprovante_representante = :comprovante_representante";
                $params[':comprovante_representante'] = $comprovanteRep;
                
                $queryParts[] = "nome_arquivo_comp_rep = :nome_arquivo_comp_rep";
                $params[':nome_arquivo_comp_rep'] = $nomeAqvCompRep;
            }
            
            // Montar a query final
            $updateQuery = "UPDATE cartao_idoso SET " . implode(", ", $queryParts) . " WHERE id = :id";
            
            $stmt = $this->pdo->prepare($updateQuery);
            
            // Bind dos parâmetros
            foreach ($params as $key => $value) {
                $paramType = PDO::PARAM_STR;
                
                if ($key === ':id') {
                    $paramType = PDO::PARAM_INT;
                } elseif (strpos($key, 'copia_') === 0 || strpos($key, 'comprovante_') === 0) {
                    $paramType = PDO::PARAM_LOB;
                } elseif ($value === null) {
                    $paramType = PDO::PARAM_NULL;
                }
                
                $stmt->bindValue($key, $value, $paramType);
            }
            
            $stmt->execute();
            
            if ($stmt->rowCount() === 0) {
                $this->pdo->rollBack();
                return "Nenhum registro encontrado para atualizar.";
            }

            $this->pdo->commit();
            return true;
            
        } catch(PDOException $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            error_log("Erro ao atualizar idoso: " . $e->getMessage());
            throw new \Exception("Erro ao atualizar idoso: " . $e->getMessage());
        }
    }

    public function deleteIdoso($id)
    {
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("DELETE FROM cartao_idoso WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                $this->pdo->rollBack();
                return "Nenhum registro encontrado para deletar.";
            }

            $this->pdo->commit();
            return true;

        } catch(PDOException $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            error_log("Erro ao deletar idoso: " . $e->getMessage());
            return "Erro ao deletar idoso: " . $e->getMessage();
        }
    }

}