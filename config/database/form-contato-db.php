<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../../models/FormContact.php';

use Models\FormContact;

function setAlert($message, $type = 'success') {
    $colorClass = $type === 'success' 
        ? 'text-green-800 bg-green-50' 
        : 'text-red-800 bg-red-50';
    
    return <<<HTML
    <div id="alert-3" class="flex items-center p-4 mb-4 rounded-lg $colorClass w-15" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-lg font-medium">
            $message 
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 hover:bg-opacity-80 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    HTML;  
}

$_SESSION['old-contact'] = [
  'nome' => $_POST['nome'] ?? '',
  'email' => $_POST['email'] ?? '',
  'telefone' => $_POST['telefone'] ?? '',
  'mensagem' => $_POST['mensagem'] ?? ''
];

$inputPost = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

$nome = htmlspecialchars(trim($inputPost["nome"]));
$email = htmlspecialchars(trim($inputPost["email"]));
$telefone = htmlspecialchars(trim($inputPost["telefone"]));
$mensagem = htmlspecialchars(trim($inputPost["mensagem"]));

$campos_obrigatorios = ["nome", "email", "telefone", "mensagem"];
$array_erro = [];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $array_erro['email'] = setAlert("Formato de e-mail inválido", 'error');
}

foreach ($campos_obrigatorios as $campo) {
  if (empty($_POST[$campo])) {
      if ($campo === 'mensagem') {
          $array_erro[$campo] = "Por favor, digite sua mensagem";
      } else {
          $array_erro[$campo] = "Por favor, preencha o seu {$campo}!";
      }
  }
}

if (!empty($array_erro)){
  $_SESSION['erro-campos'] = $array_erro;
  $_SESSION['contact-alert'] = setAlert("Por favor, preencha todos os campos.", 'error');
  header("Location: ../../contato");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $formContact = new FormContact();
  
    $success = $formContact->sendContact($nome, $email, $telefone, $mensagem);
    
    if ($success) {
        $_SESSION['contact-alert'] = setAlert("Mensagem enviada com sucesso!", 'success');
        $formContact->sendNotification("NOVO CONTATO POR ". $nome, "CONTATO");
        unset($_SESSION['old-contact']);
    } else {
        $_SESSION['contact-alert'] = setAlert("Erro ao enviar a mensagem. Por favor, tente novamente.", 'error');
    }
    
    header("Location: ../../contato");
    exit();
}