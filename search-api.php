<?php 

session_start(); 
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . "/models/News.php";

use Models\News;

$newsModels = new News();

$term = trim(filter_input(INPUT_GET, 'term', FILTER_DEFAULT) ?? "");

$searchResults = $newsModels->searchNews($term);

if (!empty($searchResults)) {
    echo json_encode([
        'success' => true,
        'search_param' => $term,
        'data' => $searchResults,
        'count' => count($searchResults)
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'success' => false,
        'search_param' => $term,
        'data' => [],
        'message' => 'Nenhuma notícia encontrada'
    ], JSON_UNESCAPED_UNICODE);
}

exit;