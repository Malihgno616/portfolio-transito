<?php
session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

if(isset($_SESSION['user-login'])) {
    header("Location: home.php");
    exit();
}

$errLogin = $_SESSION['err-login'] ?? "";
unset($_SESSION['err-login']);

$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$current_page = basename($request_path);
$allowed_pages = ['login.php', 'login-submit.php']; 

if(preg_match('/\.(php|html|htm)$/i', $request_path) && 
   basename($request_path) !== 'login.php') {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}


if(!in_array($current_page, $allowed_pages)) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php'; ?>
<body>
  <div class="bg-gray-500 bg-[url(assets/img/697.jpg)] h-screen bg-center bg-no-repeat bg-cover bg-blend-multiply">
    <?php require __DIR__.'/components/form-login.php';?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script src="assets/js/spinnerOn.js"></script>
</body>
</html>
