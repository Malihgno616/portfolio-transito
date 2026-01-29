<?php 
session_start();

header('Content-Type: text/plain; charset=utf-8');

$fileName = $_GET['file'] ?? '';
$type = $_GET['type'] ?? '';

$outputDir = [
    "idoso" => __DIR__ . "/pdf-idoso",
    "deficiente" => __DIR__ . "/pdf-deficiente",
];

$patterns = [
    "idoso" => '/^cartao-idoso-id=\d+\.pdf$/',
    "deficiente" => '/^cartao-deficiente-id=\d+\.pdf$/'
];

switch($type) {
    case 'idoso':
    case 'deficiente':
        if ($fileName && preg_match($patterns[$type], $fileName)) {
            $filePath = $outputDir[$type] . '/' . $fileName; 
            if (file_exists($filePath)) {
                if (unlink($filePath)) { 
                    if (isset($_SESSION['arquivos_temp_pdf'])) {
                        $_SESSION['arquivos_temp_pdf'] = array_filter($_SESSION['arquivos_temp_pdf'], 
                            function($path) use ($filePath) {
                                return $path !== $filePath;
                            });
                    }
                } 
            }
        }
    break;
}