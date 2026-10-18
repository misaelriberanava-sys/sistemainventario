<?php
$c = $_GET['c'] ?? 'proveedor';
$a = $_GET['a'] ?? 'index';

$controllerName = ucfirst($c) . 'Controller';
$controllerFile = __DIR__ . "/../controllers/$controllerName.php";

if (!file_exists($controllerFile)) {
    http_response_code(404);
    die("Controlador no encontrado");
}

require $controllerFile;
$controller = new $controllerName();

if (!method_exists($controller, $a)) {
    http_response_code(404);
    die("Acción no encontrada");
}

$controller->$a();
