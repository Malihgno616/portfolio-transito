<?php 

session_start(); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

  <main class="w-full h-full p-10">
    <?php include __DIR__.'/components/edit-slider-input.php';?>
  </main>
  <script src="assets/js/change-slider.js"></script>
<?php include __DIR__.'/layout/footer.php'; ?>