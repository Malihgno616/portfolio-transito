<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 

include __DIR__.'/layout/header.php';

echo <<<HTML
  <main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Transito - Adminstrativo</h1>
    <div class="flex justify-center">
      <div class="p-10 w-full">
          <div class="flex items-center justify-center flex-col gap-5">
              <a href="" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/75 p-10 hover:shadow-xl duration-150">
                Serviços
              </a>
              <a href="" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/75 p-10 hover:shadow-xl duration-150">
                Serviços
              </a>
              <a href="" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/75 p-10 hover:shadow-xl duration-150">
                Serviços
              </a>
               <a href="" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/75 p-10 hover:shadow-xl duration-150">
                Serviços
              </a>

          </div>
      </div>
    </div>
  </main>
  HTML;
include __DIR__.'/layout/footer.php';



