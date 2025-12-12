<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/model/ContactModel.php';
require_once __DIR__.'/model/FormIdosoModel.php';
require_once __DIR__.'/model/FormDeficienteModel.php';

use Model\ContactModel\ContactModel;
use Model\FormIdosoModel;
use Model\FormDeficienteModel;

$contactModel = new ContactModel();
$formIdosoModel = new FormIdosoModel();
$formDeficienteModel = new FormDeficienteModel();

$type = $_GET['type'] ?? "";
$id = $_GET['id'] ?? "";
$name = $_GET['name'] ?? ""; 
$date = $_GET['date'] ?? "";

// var_dump($_GET);

switch($type) {
    case 'contact':
        $nameContacts = $contactModel->searchContact($name, $id, $date);
        if(!empty($nameContacts)) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($nameContacts, JSON_UNESCAPED_UNICODE);
            if (empty($nameContacts)) {
                echo "Nenhum contato encontrado com o nome: " . htmlspecialchars($name);
            }
        }

        break;

}








