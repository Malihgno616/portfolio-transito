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

    public function deleteDeficiente($rgBeneficiario)
    {
        try {
            $query = "DELETE FROM cartao_deficiente WHERE rg_beneficiario = :rg_beneficiario";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':rg_beneficiario', $rgBeneficiario, PDO::PARAM_STR);
            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Erro ao deletar: " . $e->getMessage());
            return false;
        }
    }

    public function updateDeficiente(array $infos, array $files)
    {
        try {
            $querySelect = "SELECT * FROM cartao_deficiente WHERE rg_beneficiario = ?";
            $stmtSelect = $this->pdo->prepare($querySelect);
            $stmtSelect->execute([$infos['rg-beneficiario']]);
            $currentData = $stmtSelect->fetch(PDO::FETCH_ASSOC);

            if (!$currentData) {
                throw new \Exception("RG não encontrado.");
            }

            $setClauses = [];
            $params = [];
            $types = [];

            $fields = [
                'nome_beneficiario' => $infos['nome-beneficiario'],
                'nasc_beneficiario' => $infos['nascimento-beneficiario'],
                'genero_beneficiario' => $infos['genero-beneficiario'],
                'endereco_beneficiario' => $infos['endereco-beneficiario'],
                'numero_beneficiario' => $infos['numero-beneficiario'],
                'complemento_beneficiario' => $infos['complemento-beneficiario'],
                'bairro_beneficiario' => $infos['bairro-beneficiario'],
                'cep_beneficiario' => $infos['cep-beneficiario'],
                'cidade_beneficiario' => $infos['cidade-beneficiario'],
                'uf_beneficiario' => $infos['uf-beneficiario'],
                'telefone_beneficiario' => $infos['telefone-beneficiario'],
                'rg_beneficiario' => $infos['rg-beneficiario'],
                'expedicao_beneficiario' => $infos['expedicao-beneficiario'],
                'expedido_beneficiario' => $infos['expedido-beneficiario'],
                'cnh_beneficiario' => $infos['cnh-beneficiario'],
                'validade_cnh_beneficiario' => $infos['validade-cnh-beneficiario'],
                'email_beneficiario' => $infos['email-beneficiario'],
                'nome_medico' => $infos['nome-medico'],
                'crm' => $infos['crm-medico'],
                'telefone_medico' => $infos['telefone-medico'],
                'local_atendimento_medico' => $infos['local-atendimento-medico'],
                'deficiencia_ambulatoria' => isset($infos['deficiencia-ambulatoria']) ? implode(',', $infos['deficiencia-ambulatoria']) : null,
                'periodo_restricao_medica' => $infos['restricao-medica'],
                'data_inicio' => $infos['data-inicio'],
                'data_fim' => $infos['data-fim'],
                'cid' => $infos['cid'],
                'nome_representante' => $infos['nome-representante'],
                'email_representante' => $infos['email-representante'],
                'endereco_representante' => $infos['endereco-representante'],
                'num_representante' => $infos['numero-representante'],
                'complemento_representante' => $infos['complemento-representante'],
                'bairro_representante' => $infos['bairro-representante'],
                'cep_representante' => $infos['cep-representante'],
                'cidade_representante' => $infos['cidade-representante'],
                'uf_representante' => $infos['uf-representante'],
                'telefone_representante' => $infos['telefone-representante'],
                'rg_representante' => $infos['rg-representante'],
                'expedicao_representante' => $infos['expedicao-representante'],
                'expedido_representante' => $infos['expedido-representante']
            ];

            $blobFields = [
                'copia_rg_beneficiario' => 'copia-rg-beneficiario',
                'atestado_medico' => 'atestado-medico',
                'copia_rg_representante' => 'copia-rg-representante',
                'comprovante_representante' => 'comprovante-representante'
            ];

            foreach ($blobFields as $dbField => $fileField) {
                if (!empty($files[$fileField]['name'])) {
                    $fileContent = file_get_contents($files[$fileField]['tmp_name']);
                    $fields[$dbField] = $fileContent;
                } else {
                    $fields[$dbField] = $currentData[$dbField];
                }
            }

            foreach ($fields as $field => $value) {
                if ($value !== null && $value !== 'Não possui') {
                    $setClauses[] = "$field = ?";
                    $params[] = $value;
                    $types[] = (in_array($field, array_keys($blobFields))) ? PDO::PARAM_LOB : PDO::PARAM_STR;
                }
            }

            $params[] = $infos['rg-beneficiario'];

            if (empty($setClauses)) {
                throw new \Exception("Nenhum campo válido para atualizar.");
            }

            $query = "UPDATE cartao_deficiente SET " . implode(', ', $setClauses) . " WHERE rg_beneficiario = ?";
            $stmt = $this->pdo->prepare($query);

            foreach ($params as $index => $value) {
                $type = isset($types[$index]) ? $types[$index] : PDO::PARAM_STR;
                $stmt->bindValue($index + 1, $value, $type);
            }

            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Erro ao atualizar: " . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            error_log("Erro ao atualizar: " . $e->getMessage());
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

    public function getDeficienteByRegNumber($regNumber)
    {
        try {
            $query = "SELECT * FROM cartao_deficiente WHERE rg_beneficiario = :rg_beneficiario";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':rg_beneficiario', $regNumber);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

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