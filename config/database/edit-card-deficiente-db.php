<?php 

session_start();

require('conn.php');

$infos = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$files = $_FILES;

$conn = new Conn();
$pdo = $conn->connect();

try {
    $querySelect = "SELECT * FROM cartao_deficiente WHERE rg_beneficiario = ?";
    $stmtSelect = $pdo->prepare($querySelect);
    $stmtSelect->execute([$infos['rg-beneficiario']]);
    $currentData = $stmtSelect->fetch(PDO::FETCH_ASSOC);

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
        throw new Exception("Nenhum campo válido para atualizar.");
    }

    $query = "UPDATE cartao_deficiente SET " . implode(', ', $setClauses) . " WHERE rg_beneficiario = ?";
    $stmt = $pdo->prepare($query);

    foreach ($params as $index => $value) {
        $type = isset($types[$index]) ? $types[$index] : PDO::PARAM_STR;
        $stmt->bindValue($index + 1, $value, $type);
    }

    $executed = $stmt->execute();

    if ($executed) {
        $_SESSION['success-renova-card-def'] = "Informações alteradas com sucesso";
    } else {
        $_SESSION['err-renova-card-def'] = "Erro ao alterar os dados";
    }
    
    header("Location: ../../renovar-cartao.php");
    exit();
  
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
} catch (Exception $e) {
    $_SESSION['err-renova-card-def'] = $e->getMessage();
    header("Location: ../../renovar-cartao.php");
    exit();
}