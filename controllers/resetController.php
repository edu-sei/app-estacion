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
$mostrarFormulario = false;

if($token_action) {
    $usuario = new Usuario();
    $user = $usuario->buscarPorTokenAction($token_action);
    
    if($user && ($user['bloqueado'] == 1 || $user['recupero'] == 1)) {
        $mostrarFormulario = true;
        
        if($_POST) {
            $contraseña = $_POST['contraseña'] ?? '';
            $repetir_contraseña = $_POST['repetir_contraseña'] ?? '';
            
            if($contraseña && $repetir_contraseña) {
                if($contraseña === $repetir_contraseña) {
                    $usuario->resetearContraseña($user['id'], $contraseña);
                    
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $userAgent = $_SERVER['HTTP_USER_AGENT'];
                    Mailer::emailContraseñaRestablecida($user['email'], $user['nombres'], $user['token'], $ip, $userAgent);
                    
                    header('Location: ?slug=login');
                    exit;
                } else {
                    $mensaje = "Las contraseñas no coinciden";
                }
            }
        }
    } else {
        $mensaje = "El token no es válido";
    }
} else {
    $mensaje = "Token no válido";
}

$tpl = new Enano("reset");
$tpl->assignVar([
    "APP_SECTION" => "Restablecer Contraseña",
    "MENSAJE" => $mensaje,
    "MOSTRAR_FORMULARIO" => $mostrarFormulario ? "true" : "false"
]);
$tpl->printToScreen();

?>