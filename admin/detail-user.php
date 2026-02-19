<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require_once __DIR__.'/./model/UsersModel.php';

use UsersModel\UsersModel\UsersModel;

$userModel = new UsersModel();

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body class="min-h-screen flex flex-col">

<?php include __DIR__.'/layout/header.php'; ?>

<main class="w-full p-10 flex-grow">
    <h1 class="text-5xl font-light text-center mb-5">
        Detalhes do seu Perfil
    </h1>

    <div class="m-10 h-20">
        <div class="flex-col flex justify-center items-center">
            <img class="lg:w-40 lg:h-40 w-36 h-36 rounded-full"
                    src="display-user-image.php?id=<?=$_SESSION['user-id'];?>&type=user"
                    alt="Imagem Usuário">
        
            <h1 class="text-4xl"><?= $_SESSION['user-login'] ?></h1>
            <a href="home.php"
                class="text-center text-xl w-28 p-2 m-8 rounded-md bg-yellow-600 text-white hover:bg-yellow-500 duration-75">
                Voltar
            </a>
        </div>
    </div>

</main>

<?php include __DIR__.'/layout/footer.php'; ?>