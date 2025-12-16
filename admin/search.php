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
$phone = $_GET['phone'] ?? "";
$rg = $_GET['rg'] ?? "";
$regNumber = $_GET['reg-number'] ?? "";

// var_dump($_GET);
header('Content-Type: application/json; charset=utf-8');

switch($type) {
    case 'contact':
        $results = $contactModel->searchContact($name, $id, $date, $phone);
        
        if (!empty($results)) {
            $response = [
                'success' => true,
                'search_params' => [
                    'id' => $id,
                    'name' => $name,
                    'telefone' => $phone,
                    'date' => $date
                ],
                'data' => $results,
                'count' => count($results)
            ];
        } else {
            $response = [
                'success' => false,
                'search_params' => [
                    'id' => $id,
                    'name' => $name,
                    'telefone' => $phone,
                    'date' => $date
                ],
                'data' => [],
                'message' => 'Nenhum contato encontrado com os critérios fornecidos'
            ];
        }
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        break;      

    case 'form-idoso':
        $results = $formIdosoModel->searchIdoso($id, $name, $date, $rg, $regNumber);  

        if (!empty($results)) {
            $response = [
                'success' => true,
                'search_params' => [
                    'id' => $id,
                    'name' => $name,
                    'rg' => $rg,
                    'reg_number' => $regNumber,
                    'birth_date' => $date
                ],
                'data' => $results,
                'count' => count($results)
            ];
        } else {
            $response = [
                'success' => false,
                'search_params' => [
                    'id' => $id,
                    'name' => $name,
                    'rg' => $rg,
                    'reg_number' => $regNumber,
                    'birth_date' => $date
                ],
                'data' => [],
                'message' => 'Nenhum formulário de idoso encontrado com os critérios fornecidos'
            ];
        }
                
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        break;

    case 'form-deficiente':
        $results = $formDeficienteModel->searchBeneficiario($id, $name, $date, $rg, $regNumber);

        if (!empty($results)) {
            $response = [
                'success' => true,
                'search_params' => [
                    'id' => $id,
                    'name' => $name,
                    'rg' => $rg,
                    'reg_number' => $regNumber,
                    'birth_date' => $date
                ],
                'data' => $results,
                'count' => count($results)
            ];
        } else {
            $response = [
                'success' => false,
                'search_params' => [
                    'id' => $id,
                    'name' => $name,
                    'rg' => $rg,
                    'reg_number' => $regNumber,
                    'birth_date' => $date
                ],
                'data' => [],
                'message' => 'Nenhum formulário de deficiente encontrado com os critérios fornecidos'
            ];
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        break;

    default:
        echo json_encode([
            'success' => false,
            'message' => 'Tipo de busca inválido'
        ], JSON_UNESCAPED_UNICODE);
        break;   
        
}
