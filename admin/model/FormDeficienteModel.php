<?php 

namespace Model;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class FormDeficienteModel {

    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function getBeneficiarioById($id)
    {
        try {

            $query = "SELECT id, copia_rg_beneficiario, nome_arquiv_rg_benef, atestado_medico, nome_arquiv_atestado, copia_rg_representante, nome_arquiv_rg_rep, comprovante_representante, nome_arquiv_comp_rep FROM cartao_deficiente WHERE id = :id";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();

            return $stmt->fetch();

        } catch(PDOException $e) {

            error_log("Erro ao buscar o id: " . $e->getMessage());

            return null;
        }   

    }

    public function deleteBeneficiario($id)
    {
        try {

            $query = "DELETE FROM cartao_deficiente where id = :id";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                $this->pdo->rollBack();
                return "Nenhum registro encontrado para deletar.";
            }

            $this->pdo->commit();

            return true;

        } catch(PDOException $e) {
            if($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            error_log("Erro ao excluir o cartão" . $e->getMessage());
            return "Erro ao excluir o cartão" . $e->getMessage();
        }
    }

    public function paginatedDeficientes($page, $limit)
    {
        try {
            if($page < 1) $page = 1;
            $offset = ($page -1) * $limit; 

            // Primeiro obtemos o total
            $countStmt = $this->pdo->query("SELECT COUNT(*) as total FROM cartao_deficiente");
            $total = $countStmt->fetch()['total'];
            $totalPages = ceil($total / $limit);

            // Depois os dados paginados
            $stmt = $this->pdo->prepare("SELECT 
            id, 
            nome_beneficiario, 
            nasc_beneficiario, 
            genero_beneficiario, 
            endereco_beneficiario, 
            numero_beneficiario, 
            complemento_beneficiario,
            bairro_beneficiario,
            cep_beneficiario,
            cidade_beneficiario,  
            uf_beneficiario,      
            telefone_beneficiario,
            rg_beneficiario,
            expedicao_beneficiario,
            expedido_beneficiario,
            cnh_beneficiario,
            validade_cnh_beneficiario,
            email_beneficiario,
            copia_rg_beneficiario,
            nome_arquiv_rg_benef,  
            nome_medico,
            crm,
            telefone_medico,
            local_atendimento_medico,
            deficiencia_ambulatoria,
            periodo_restricao_medica,
            data_inicio,
            data_fim,
            cid,
            atestado_medico,
            nome_arquiv_atestado,
            nome_representante,
            email_representante,
            endereco_representante,
            num_representante,
            complemento_representante,
            bairro_representante,
            cep_representante,
            cidade_representante,
            uf_representante,
            telefone_representante,
            rg_representante,
            expedicao_representante,
            expedido_representante,
            copia_rg_representante,
            nome_arquiv_rg_rep,
            comprovante_representante,
            nome_arquiv_comp_rep
        FROM cartao_deficiente 
        ORDER BY id DESC 
        LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $deficientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return [
                'deficientes' => $deficientes,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => $totalPages
            ];
            
        } catch (PDOException $e) {
            // Log do erro ou tratamento adequado
            error_log("Erro ao buscar deficientes: " . $e->getMessage());
            return [
                'deficientes' => [],
                'total' => 0,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => 0
            ];
        }
    }

    public function registerBeneficiario($nome, $nasc, $sexo, $endereco, $numEndereco, $bairro, $cep, $cidade, $uf, $tel, $rg, $expedicao, $expedido, $copiaRg, $nomeAqvRg, $nomeMedico, $crm, $telMedico, $localAtendMedico, $deficiencias, $periodoRestricaoMedica, $dataInicio, $cid, $atestadoMedico, $nomeAqvAtestado, $complementoBeneficiario = "" , $cnhBeneficiario = "", $validadeCnhBenef = "", $emailBeneficiario = "", $dataFim = "", $nomeRep = "", $emailRep = "", $enderecoRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $rgRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "", $comprovanteRep = null, $nomeAqvCompRep = "") {
        try {

            $query = "INSERT INTO cartao_deficiente
            (
            nome_beneficiario, 
            nasc_beneficiario, 
            genero_beneficiario, 
            endereco_beneficiario, 
            numero_beneficiario, 
            complemento_beneficiario,
            bairro_beneficiario,
            cep_beneficiario,
            cidade_beneficiario,  
            uf_beneficiario,      
            telefone_beneficiario,
            rg_beneficiario,
            expedicao_beneficiario,
            expedido_beneficiario,
            cnh_beneficiario,
            validade_cnh_beneficiario,
            email_beneficiario,
            copia_rg_beneficiario,
            nome_arquiv_rg_benef,  
            nome_medico,
            crm,
            telefone_medico,
            local_atendimento_medico,
            deficiencia_ambulatoria,
            periodo_restricao_medica,
            data_inicio,
            data_fim,
            cid,
            atestado_medico,
            nome_arquiv_atestado,
            nome_representante,
            email_representante,
            endereco_representante,
            num_representante,
            complemento_representante,
            bairro_representante,
            cep_representante,
            cidade_representante,
            uf_representante,
            telefone_representante,
            rg_representante,
            expedicao_representante,
            expedido_representante,
            copia_rg_representante,
            nome_arquiv_rg_rep,
            comprovante_representante,
            nome_arquiv_comp_rep
            ) 
            VALUES (
            :nome_beneficiario, 
            :nasc_beneficiario, 
            :genero_beneficiario, 
            :endereco_beneficiario, 
            :numero_beneficiario, 
            :complemento_beneficiario,
            :bairro_beneficiario,
            :cep_beneficiario,
            :cidade_beneficiario,  
            :uf_beneficiario,      
            :telefone_beneficiario,
            :rg_beneficiario,
            :expedicao_beneficiario,
            :expedido_beneficiario,
            :cnh_beneficiario,
            :validade_cnh_beneficiario,
            :email_beneficiario,
            :copia_rg_beneficiario,
            :nome_arquiv_rg_benef,  
            :nome_medico,
            :crm,
            :telefone_medico,
            :local_atendimento_medico,
            :deficiencia_ambulatoria,
            :periodo_restricao_medica,
            :data_inicio,
            :data_fim,
            :cid,
            :atestado_medico,
            :nome_arquiv_atestado,
            :nome_representante,
            :email_representante,
            :endereco_representante,
            :num_representante,
            :complemento_representante,
            :bairro_representante,
            :cep_representante,
            :cidade_representante,
            :uf_representante,
            :telefone_representante,
            :rg_representante,
            :expedicao_representante,
            :expedido_representante,
            :copia_rg_representante,
            :nome_arquiv_rg_rep,
            :comprovante_representante,
            :nome_arquiv_comp_rep
            )";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(':nome_beneficiario', $nome);
            $stmt->bindValue(':nasc_beneficiario', $nasc);
            $stmt->bindValue(':genero_beneficiario', $sexo);
            $stmt->bindValue(':endereco_beneficiario', $endereco);
            $stmt->bindValue(':numero_beneficiario', $numEndereco);
            $stmt->bindValue(':complemento_beneficiario', $complementoBeneficiario);
            $stmt->bindValue(':bairro_beneficiario', $bairro);
            $stmt->bindValue(':cep_beneficiario', $cep);
            $stmt->bindValue(':cidade_beneficiario', $cidade);
            $stmt->bindValue(':uf_beneficiario', $uf);
            $stmt->bindValue(':telefone_beneficiario', $tel);
            $stmt->bindValue(':rg_beneficiario', $rg);
            $stmt->bindValue(':expedicao_beneficiario', $expedicao);
            $stmt->bindValue(':expedido_beneficiario', $expedido);
            $stmt->bindValue(':cnh_beneficiario', $cnhBeneficiario);
            $stmt->bindValue(':validade_cnh_beneficiario', $validadeCnhBenef);
            $stmt->bindValue(':email_beneficiario', $emailBeneficiario);
            $stmt->bindValue(':copia_rg_beneficiario', $copiaRg);
            $stmt->bindValue(':nome_arquiv_rg_benef', $nomeAqvRg);
            $stmt->bindValue(':nome_medico', $nomeMedico);
            $stmt->bindValue(':crm', $crm);
            $stmt->bindValue(':telefone_medico', $telMedico);
            $stmt->bindValue(':local_atendimento_medico', $localAtendMedico);
            $stmt->bindValue(':deficiencia_ambulatoria', $deficiencias);
            $stmt->bindValue(':periodo_restricao_medica', $periodoRestricaoMedica);
            $stmt->bindValue(':data_inicio', $dataInicio);
            $stmt->bindValue(':data_fim', $dataFim);
            $stmt->bindValue(':cid', $cid);
            $stmt->bindValue(':atestado_medico', $atestadoMedico);
            $stmt->bindValue(':nome_arquiv_atestado', $nomeAqvAtestado);
            $stmt->bindValue(':nome_representante', $nomeRep);
            $stmt->bindValue(':email_representante', $emailRep);
            $stmt->bindValue(':endereco_representante', $enderecoRep);
            $stmt->bindValue(':num_representante', $numRep);
            $stmt->bindValue(':complemento_representante', $compRep);
            $stmt->bindValue(':bairro_representante', $bairroRep);
            $stmt->bindValue(':cep_representante', $cepRep);
            $stmt->bindValue(':cidade_representante', $cidadeRep);
            $stmt->bindValue(':uf_representante', $ufRep);
            $stmt->bindValue(':telefone_representante', $telRep);
            $stmt->bindValue(':rg_representante', $rgRep);
            $stmt->bindValue(':expedicao_representante', $expedicaoRep);
            $stmt->bindValue(':expedido_representante', $expedidoRep);
            $stmt->bindValue(':copia_rg_representante', $copiaRgRep);
            $stmt->bindValue(':nome_arquiv_rg_rep', $nomeAqvRgRep);
            $stmt->bindValue(':comprovante_representante', $comprovanteRep);
            $stmt->bindValue(':nome_arquiv_comp_rep', $nomeAqvCompRep);

            $stmt->execute();

            return $this->pdo->lastInsertId();

        } catch(PDOException $e) {
            error_log("Erro ao registrar beneficiário: " . $e->getMessage());
            return null;
        }
    }

    public function updataBeneficiario() {
        return null;
    }

    public function deficienteCountTable()
    {
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM cartao_deficiente");
            $total = $stmt->fetch()['total'];
            return $total;
        } catch (PDOException $e) {
            // Log do erro ou tratamento adequado
            error_log("Erro ao contar deficientes: " . $e->getMessage());
            return 0;
        }
    }

}
