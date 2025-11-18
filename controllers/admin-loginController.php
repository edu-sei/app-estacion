<?php

$mensaje = "";

if($_POST) {
    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    
    if($usuario === 'admin-estacion' && $contraseña === 'admin1234') {
        $_SESSION[APP_NAME]['admin'] = true;
        header('Location: ?slug=administrator');
        exit;
    } else {
        $mensaje = "Credenciales de administrador incorrectas";
    }
}

$tpl = new Enano("admin-login");
$tpl->assignVar([
    "APP_SECTION" => "Login Administrador",
    "MENSAJE" => $mensaje
]);
$tpl->printToScreen();

?>