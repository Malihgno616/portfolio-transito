<?php 

namespace Models;

require __DIR__.'/../config/database/conn.php';
require __DIR__.'/../config/database/env.php';

use PDO, PDOException;

class FormDeficiente {
    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function sendDeficiente($nome, $nasc, $sexo, $endereco, $numEndereco, $bairro, $cep, $cidade, $uf, $tel, $rg, $expedicao, $expedido, $copiaRg, $nomeAqvRg, $nomeMedico, $crm, $telMedico, $localAtendMedico, $deficiencias, $periodoRestricaoMedica, $dataInicio, $cid, $atestadoMedico, $nomeAqvAtestado, $complementoBeneficiario = "" , $cnhBeneficiario = "", $validadeCnhBenef = "", $emailBeneficiario = "", $dataFim = "", $nomeRep = "", $emailRep = "", $enderecoRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $rgRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "", $comprovanteRep = null, $nomeAqvCompRep = "")
    {
        try {

            $this->pdo->beginTransaction(); 

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
            $stmt->bindValue(':data_fim', $dataFim ?? "");
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
            
            $this->pdo->commit();

            return true;

        } catch(PDOException $e) {
            error_log("Erro ao enviar: " . $e->getMessage());
            return false;
        }
    }

    public function lastInsertId()
    {
        try {
            $query = "SELECT id FROM cartao_deficiente ORDER BY id DESC LIMIT 1;";
            $stmt = $this->pdo->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['id'] : null;

        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    public function sendNotification($descricao = "", $categoria = "", $linkNotificacao = "")
    {

        try {

            $query = "INSERT INTO notificacoes (descricao, categoria, link_notificacao) VALUES (:desc, :cat, :link_notificacao)";

            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(':desc', $descricao);
            
            $stmt->bindValue(':cat', $categoria);

            $stmt->bindValue(':link_notificacao', $linkNotificacao);
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
                
        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }

    }

}