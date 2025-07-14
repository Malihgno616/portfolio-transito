<?php 

session_start(); 
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

include __DIR__.'/config/conn.php';
require __DIR__.'/config/env.php';

$conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$conn->connect();

//* $message = $conn->connect();
//* echo $message; Conectado com successo! ou Erro ao conectar!

$inputPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);


