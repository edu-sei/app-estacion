<?php

require_once 'models/Usuario.php';
require_once 'librarys/Mailer.php';

// Verificar si ya está logueado
if(isset($_SESSION[APP_NAME]['user'])) {
    header('Location: ?slug=panel');
    exit;
}

$mensaje = "";
$token_action = $_GET['token_action'] ?? '';

if($token_action) {
    $usuario = new Usuario();
    $user = $usuario->buscarPorTokenAction($token_action);
    
    if($user && $user['activo'] == 0) {
        $usuario->activarUsuario($user['id']);
        Mailer::emailCuentaActiva($user['email'], $user['nombres']);
        header('Location: ?slug=login');
        exit;
    } else {
        $mensaje = "El token no corresponde a un usuario";
    }
} else {
    $mensaje = "Token no válido";
}

$tpl = new Enano("validate");
$tpl->assignVar([
    "APP_SECTION" => "Validar Cuenta",
    "MENSAJE" => $mensaje
]);
$tpl->printToScreen();

?>