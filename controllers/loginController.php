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
    $contraseña = $_POST['contraseña'] ?? '';
    
    if($email && $contraseña) {
        $usuario = new Usuario();
        $user = $usuario->buscarPorEmail($email);
        
        if($user) {
            if($usuario->verificarContraseña($contraseña, $user['contraseña'])) {
                if($user['activo'] == 1 && $user['bloqueado'] == 0 && $user['recupero'] == 0) {
                    // Login exitoso
                    $_SESSION[APP_NAME]['user'] = $user;
                    
                    // Enviar email de notificación
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $userAgent = $_SERVER['HTTP_USER_AGENT'];
                    Mailer::emailInicioSesion($user['email'], $user['nombres'], $user['token'], $ip, $userAgent);
                    
                    // Redireccionar a detalle si viene de panel
                    $redirect = $_GET['redirect'] ?? 'panel';
                    header("Location: ?slug=$redirect");
                    exit;
                } elseif($user['activo'] == 0) {
                    $mensaje = "Su usuario aún no se ha validado, revise su casilla de correo";
                } else {
                    $mensaje = "Su usuario está bloqueado, revise su casilla de correo";
                }
            } else {
                // Contraseña incorrecta - enviar email de alerta
                $ip = $_SERVER['REMOTE_ADDR'];
                $userAgent = $_SERVER['HTTP_USER_AGENT'];
                Mailer::emailIntentoAcceso($user['email'], $user['nombres'], $user['token'], $ip, $userAgent);
                $mensaje = "Credenciales no válidas";
            }
        } else {
            $mensaje = "Credenciales no válidas";
        }
    }
}

$tpl = new Enano("login");
$tpl->assignVar([
    "APP_SECTION" => "Iniciar Sesión",
    "MENSAJE" => $mensaje
]);
$tpl->printToScreen();

?>