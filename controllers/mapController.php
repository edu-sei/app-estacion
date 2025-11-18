<?php

// Verificar si es admin
if(!isset($_SESSION[APP_NAME]['admin']) || $_SESSION[APP_NAME]['admin'] !== true) {
    header('Location: ?slug=panel');
    exit;
}

$tpl = new Enano("map");
$tpl->assignVar([
    "APP_SECTION" => "Mapa de Clientes"
]);
$tpl->printToScreen();

?>