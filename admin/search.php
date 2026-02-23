<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json; charset=utf-8');

require __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/model/ContactModel.php';
require_once __DIR__.'/model/FormIdosoModel.php';
require_once __DIR__.'/model/FormDeficienteModel.php';
require_once __DIR__.'/model/NewsModel.php';

use Model\ContactModel\ContactModel;
use Model\FormIdosoModel;
use Model\FormDeficienteModel;
use Model\NewsModel\NewsModel;

$contactModel = new ContactModel();
$formIdosoModel = new FormIdosoModel();
$formDeficienteModel = new FormDeficienteModel();
$newsModel = new NewsModel();

$type = $_GET['type'] ?? "";
$term = $_GET['term'];

switch($type) {
    case 'contact':
        $results = $contactModel->searchContactByTerm($term);
        
        if (!empty($results)) {
            $response = [
                'success' => true,
                'search_param' => $term,
                'data' => $results,
                'count' => count($results)
            ];
        } else {
            $response = [
                'success' => false,
                'search_param' => $term,
                'data' => [],
                'message' => 'Nenhum contato encontrado com os critérios fornecidos'
            ];
        }
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        break;      

    case 'form-idoso':
        $results = $formIdosoModel->searchIdosoByTerm($term);  

        if (!empty($results)) {
            $response = [
                'success' => true,
                'search_param' => $term,
                'data' => $results,
                'count' => count($results)
            ];
        } else {
            $response = [
                'success' => false,
                'search_param' => $term,
                'data' => [],
                'message' => 'Nenhum formulário de idoso encontrado com os critérios fornecidos'
            ];
        }
                
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        break;

    case 'form-deficiente':
        $results = $formDeficienteModel->searchBeneficiarioByTerm($term);

        if (!empty($results)) {
            $response = [
                'success' => true,
                'search_param' => $term,
                'data' => $results,
                'count' => count($results)
            ];
        } else {
            $response = [
                'success' => false,
                'search_param' => $term,
                'data' => [],
                'message' => 'Nenhum formulário de deficiente encontrado com os critérios fornecidos'
            ];
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        break;

    case 'news':

        $results = $newsModel->searchNews($id, $mainTitle, $mainSubtitle, $contentTitle, $contentSubtitle, $textContent);   

        if(!empty($results)) {
            $response = [
                'success' => true,
                'search_params' => [
                    'id' => $id,
                    'main_title' => $mainTitle,
                    'main_subtitle' => $mainSubtitle,
                    'content_title' => $contentTitle,
                    'content_subtitle' => $contentSubtitle,
                    'text_content' => $textContent
                ],
                'data' => $results,
                'count' => count($results),
            ];
        } else {
            $response = [
                'success' => false,
                'search_params' => [
                    'id' => $id,
                    'main_title' => $mainTitle,
                    'main_subtitle' => $mainSubtitle,
                    'content_title' => $contentTitle,
                    'content_subtitle' => $contentSubtitle,
                    'text_content' => $textContent
                ],
                'data' => [],
                'message' => 'Nenhuma notícia encontrada com os critérios fornecidos'
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