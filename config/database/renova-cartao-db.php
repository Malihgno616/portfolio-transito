<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require('conn.php');

$rg_beneficiario = $_POST['rg-beneficiario'];

$conn = new Conn();
$pdo = $conn->connect();

try {
  $query = "SELECT * FROM cartao_deficiente where rg_beneficiario = :rg_beneficiario";
  
  $stmt = $pdo->prepare($query);

  $stmt->bindValue(":rg_beneficiario", $rg_beneficiario, PDO::PARAM_STR);

  $result = $stmt->execute();
  
  $column_names = [
    'nome_beneficiario',
    'nasc_beneficiario',
    'genero_beneficiario',
    'endereco_beneficiario',
    'numero_beneficiario',
    'complemento_beneficiario',
    'bairro_beneficiario',
    'cep_beneficiario',
    'cidade_beneficiario',
    'uf_beneficiario',
    'telefone_beneficiario',
    'rg_beneficiario',
    'expedicao_beneficiario',
    'expedido_beneficiario',
    'cnh_beneficiario',
    'validade_cnh_beneficiario',
    'email_beneficiario',
    'copia_rg_beneficiario',
    'nome_medico',
    'crm',
    'telefone_medico',
    'local_atendimento_medico',
    'deficiencia_ambulatoria',
    'periodo_restricao_medica',
    'data_inicio',
    'data_fim',
    'cid',
    'atestado_medico',
    'nome_representante',
    'email_representante',
    'endereco_representante',
    'num_representante',
    'complemento_representante',
    'bairro_representante',
    'cep_representante',
    'cidade_representante',
    'uf_representante',
    'telefone_representante',
    'rg_representante',
    'expedicao_representante',
    'expedido_representante',
    'copia_rg_representante',
    'comprovante_representante'   
  ];

  if ($result) {

    echo var_dump($rg_beneficiario) . "<br>";
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    foreach ($column_names as $index) {
      echo "<br>". $index . ": " . $data[$index] . "<br>";
    }
    
  } else {
    echo "Não foi possível encontrar o beneficiário.";
  }
  
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}