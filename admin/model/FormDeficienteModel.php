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
