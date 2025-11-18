<?php

require_once 'models/Tracker.php';

// Registrar acceso del cliente
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Obtener información de geolocalización
$geoData = null;
try {
    $geoResponse = file_get_contents("http://ipwho.is/$ip");
    $geoData = json_decode($geoResponse, true);
} catch (Exception $e) {
    // Si falla la API, usar datos por defecto
    $geoData = [
        'latitude' => null,
        'longitude' => null,
        'country' => 'Desconocido'
    ];
}

$tracker = new Tracker();
$tracker->registrarAcceso(
    $ip,
    $geoData['latitude'] ?? null,
    $geoData['longitude'] ?? null,
    $geoData['country'] ?? 'Desconocido',
    $userAgent,
    $geoData['connection']['org'] ?? 'Desconocido'
);

/* Se instancia a la clase del motor de plantillas */
$tpl = new Enano("panel");

/*para asignar valor a las variables dentro la plantilla*/
$tpl->assignVar(["APP_SECTION" => "Panel de Estaciones"]);

/* Imprime la plantilla en la página */
$tpl->printToScreen();

?>