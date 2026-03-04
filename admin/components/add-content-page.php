<form action="<?= $_SERVER['PHP_SELF'] . '?tela=' . $id ?>" method="post" class="border-2 border-gray-200 rounded-lg p-4 m-4">
  <div id="toolbar-container">
    <span class="ql-formats">
      <select class="ql-font"></select>
      <select class="ql-size"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-bold"></button>
      <button class="ql-italic"></button>
      <button class="ql-underline"></button>
      <button class="ql-strike"></button>
    </span>
    <span class="ql-formats">
      <select class="ql-color"></select>
      <select class="ql-background"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-header" value="1"></button>
      <button class="ql-header" value="2"></button>
      <button class="ql-header" value="3"></button>
      <button class="ql-header" value="4"></button>
      <button class="ql-header" value="5"></button>
      <button class="ql-header" value="6"></button>
    </span>
    <span class="ql-formats">
      <button class="ql-list" value="ordered"></button>
      <button class="ql-list" value="bullet"></button>
      <button class="ql-indent" value="-1"></button>
      <button class="ql-indent" value="+1"></button>
    </span>
    <span class="ql-formats">
      <button class="ql-direction" value="rtl"></button>
      <select class="ql-align"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-link"></button>
    </span>
  </div>
  <div id="editor" class="h-80">
      <p></p>
  </div>

  <input type="hidden" name="conteudo" id="conteudo">

  <button type="submit" class="mt-5 text-lg md:text-xl text-center px-6 py-3 rounded-lg bg-yellow-600 text-white hover:bg-yellow-500 w-42 transition">Enviar conteúdo</button>

</form>

<?php 

  $paginaTela = $telaSiteModel->getContentById($id) ?? null;

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $conteudo = $_POST['conteudo'] ?? null;

    $telaSiteModel->addContentPage($id, $conteudo);

    $paginaTela = $telaSiteModel->getContentById($id) ?? null;

  }
    
?>

<div class="ql-snow">
    <div class="ql-editor">
        <?= $paginaTela['conteudo'] ?? null; ?>
    </div>
</div>