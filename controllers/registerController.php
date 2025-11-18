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
    $nombres = $_POST['nombres'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $repetir_contraseña = $_POST['repetir_contraseña'] ?? '';
    
    if($email && $nombres && $contraseña && $repetir_contraseña) {
        if($contraseña === $repetir_contraseña) {
            $usuario = new Usuario();
            $existeUsuario = $usuario->buscarPorEmail($email);
            
            if(!$existeUsuario) {
                $resultado = $usuario->crearUsuario($email, $nombres, $contraseña);
                if($resultado) {
                    $nuevoUsuario = $usuario->buscarPorEmail($email);
                    Mailer::emailBienvenida($email, $nombres, $nuevoUsuario['token_action']);
                    $mensaje = "Usuario registrado. Revisa tu email para activar la cuenta.";
                }
            } else {
                $mensaje = "El email ya corresponde a un usuario. <a href='?slug=login'>Iniciar sesión</a>";
            }
        } else {
            $mensaje = "Las contraseñas no coinciden";
        }
    }
}

$tpl = new Enano("register");
$tpl->assignVar([
    "APP_SECTION" => "Registrarse",
    "MENSAJE" => $mensaje
]);
$tpl->printToScreen();

?>