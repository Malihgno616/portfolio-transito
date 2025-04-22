<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Idoso</title>
  <?php include_once('../layout/head.php');?>
</head>
<body>
  <?php 
    include_once('../layout/header.php');
    include('../layout/imgfundo.php');
    include_once('../layout/form-idoso-layout.php');
    include_once('../layout/footer.php');
  ?> 
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>