<?php 

session_start();

require_once __DIR__.'/./model/ContactModel.php';
use Model\ContactModel\ContactModel;
 
$contactModel = new ContactModel();

$idMessage = $_GET['id'];

$contact = $contactModel->getDataById($idMessage);

$contactData = $contact[0] ?? null;

if (!$contactData) {
    echo "Contato não encontrado!";
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body class="min-h-screen flex flex-col">

<?php include __DIR__.'/layout/header.php';?>

<main class="flex-grow flex items-center justify-center p-10 bg-gray-50">

    <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-8 md:p-12 border border-gray-200">
        <h1 class="text-3xl md:text-4xl font-light text-center mb-6">
            Mensagem de <?= htmlspecialchars($contactData['nome']) ?>
        </h1>
        <p class="text-lg md:text-xl text-justify leading-relaxed">
            <?= htmlspecialchars($contactData['mensagem']) ?>
        </p>
        <div class="flex justify-center mt-8">
            <a href="contatos.php"
               class="px-6 py-3 text-lg font-medium rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 transition duration-200">
               Voltar
            </a>
        </div>
    </div>

</main>

<?php include __DIR__.'/layout/footer.php';?> 

