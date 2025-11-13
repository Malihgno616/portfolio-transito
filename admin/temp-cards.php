<?php 
session_start();

header('Content-Type: text/plain; charset=utf-8');

$fileName = $_GET['file'] ?? '';
$type = $_GET['type'] ?? '';

$outputDir = [
    "idoso-frente" => __DIR__ . "/pdf-idoso-frente",
    "idoso-verso" => __DIR__ . "/pdf-idoso-verso",
    "deficiente-frente" => __DIR__ . "/pdf-deficiente-frente",
    "deficiente-verso" => __DIR__ . "/pdf-deficiente-verso"
];

$patterns = [
    "idoso-frente" => '/^cartao-idoso-id\d+-frente\.pdf$/',
    "idoso-verso" => '/^cartao-idoso-id\d+-verso\.pdf$/',
    "deficiente-frente" => '/^cartao-deficiente-id\d+-frente\.pdf$/',
    "deficiente-verso" => '/^cartao-deficiente-id\d+-verso\.pdf$/'
];

switch($type) {
    case 'idoso-frente':
    case 'idoso-verso':
    case 'deficiente-frente':
    case 'deficiente-verso':
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