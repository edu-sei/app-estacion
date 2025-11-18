<?php

// Verificar si está logueado
if(!isset($_SESSION[APP_NAME]['user'])) {
    $redirect = urlencode($_SERVER['REQUEST_URI']);
    header("Location: ?slug=login&redirect=$redirect");
    exit;
}

/* Se instancia a la clase del motor de plantillas */
$tpl = new Enano("detalle");

// Obtener el chipid de la URL
$chipid = "";
if(isset($_GET['chipid'])){
    $chipid = $_GET['chipid'];
}

/*para asignar valor a las variables dentro la plantilla*/
$tpl->assignVar([
    "APP_SECTION" => "Detalle de Estación",
    "CHIPID" => $chipid,
    "USER_NAME" => $_SESSION[APP_NAME]['user']['nombres']
]);

/* Imprime la plantilla en la página */
$tpl->printToScreen();

?>