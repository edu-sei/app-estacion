<?php

require_once 'models/Usuario.php';
require_once 'librarys/Mailer.php';

$mensaje = "";
$token = $_GET['token'] ?? '';

if($token) {
    $usuario = new Usuario();
    $user = $usuario->buscarPorToken($token);
    
    if($user) {
        $usuario->bloquearUsuario($user['id']);
        $userActualizado = $usuario->buscarPorToken($token);
        Mailer::emailCuentaBloqueada($user['email'], $user['nombres'], $userActualizado['token_action']);
        $mensaje = "Usuario bloqueado, revise su correo electrónico";
    } else {
        $mensaje = "El token no corresponde a un usuario";
    }
} else {
    $mensaje = "Token no válido";
}

$tpl = new Enano("blocked");
$tpl->assignVar([
    "APP_SECTION" => "Cuenta Bloqueada",
    "MENSAJE" => $mensaje
]);
$tpl->printToScreen();

?>