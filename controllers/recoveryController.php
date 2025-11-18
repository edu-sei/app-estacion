<?php

require_once 'models/Usuario.php';
require_once 'librarys/Mailer.php';

// Verificar si ya está logueado
if(isset($_SESSION[APP_NAME]['user'])) {
    header('Location: ?slug=panel');
    exit;
}

$mensaje = "";

if($_POST) {
    $email = $_POST['email'] ?? '';
    
    if($email) {
        $usuario = new Usuario();
        $user = $usuario->buscarPorEmail($email);
        
        if($user) {
            $usuario->iniciarRecupero($user['id']);
            $userActualizado = $usuario->buscarPorEmail($email);
            Mailer::emailRecupero($user['email'], $user['nombres'], $userActualizado['token_action']);
            $mensaje = "Se ha enviado un email para restablecer la contraseña";
        } else {
            $mensaje = "El email no se encuentra registrado. <a href='?slug=register'>Registrarse</a>";
        }
    }
}

$tpl = new Enano("recovery");
$tpl->assignVar([
    "APP_SECTION" => "Recuperar Contraseña",
    "MENSAJE" => $mensaje
]);
$tpl->printToScreen();

?>