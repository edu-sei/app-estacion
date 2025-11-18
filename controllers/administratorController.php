<?php

require_once 'models/Usuario.php';
require_once 'models/Tracker.php';

// Verificar si es admin
if(!isset($_SESSION[APP_NAME]['admin']) || $_SESSION[APP_NAME]['admin'] !== true) {
    header('Location: ?slug=admin-login');
    exit;
}

$usuario = new Usuario();
$tracker = new Tracker();

// Contar usuarios registrados
$sql = "SELECT COUNT(*) as total FROM usuarios";
$result = $usuario->executeQuery($sql);
$totalUsuarios = $result ? $result[0]['total'] : 0;

// Contar clientes únicos
$totalClientes = $tracker->contarClientes();

$tpl = new Enano("administrator");
$tpl->assignVar([
    "APP_SECTION" => "Panel Administrador",
    "TOTAL_USUARIOS" => $totalUsuarios,
    "TOTAL_CLIENTES" => $totalClientes
]);
$tpl->printToScreen();

?>