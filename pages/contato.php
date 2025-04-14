<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../layout/head.php');?>
  <title>Contato</title>
</head>
<body>
  <?php 
    include('../layout/header.php');
    include_once('../layout/imgfundo.php');
    include('../layout/form-contato-layout.php');
    include('../layout/footer.php'); 
  ?>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>