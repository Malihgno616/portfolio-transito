<?php 
  ini_set("default_charset", "utf8mb4");
  include_once "connect.php"; 

  $rg_solicitante = $_POST['rg-solicitante'];
  
  $query_verify = "SELECT rg_beneficiario from cartao_deficiente";

  if (isset($_FILES['boletim-ocorrencia']) && $_FILES['boletim-ocorrencia']['error'] == 0) {
      $boletim_ocorrencia = $_FILES['boletim-ocorrencia']['tmp_name'];
      $tipos_permitidos = ['image/jpeg', 'image/png', 'application/pdf']; // 
      if (in_array(mime_content_type($boletim_ocorrencia), $tipos_permitidos)) {
          $imagem_boletim_ocorrencia = file_get_contents($boletim_ocorrencia);
      } else {
          echo "Arquivo não permitido. Somente imagens JPEG, PNG e PDF são aceitas.";
          exit;
      }
    } elseif (empty($_FILES['boletim-ocorrencia']['name'])) {
        $imagem_boletim_ocorrencia = null;
    } else {
        echo "Erro no envio do arquivo da cópia do RG do idoso: " . $_FILES['boletim-ocorrencia']['error'];
        exit;
    }   

  
   

?>