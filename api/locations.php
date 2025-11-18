<?php

require_once '../.env.php';
require_once '../models/DBAbstract.php';
require_once '../models/Tracker.php';

header('Content-Type: application/json');

if(isset($_GET['list-clients-location'])) {
    $tracker = new Tracker();
    $ubicaciones = $tracker->obtenerClientesUbicacion();
    
    $response = [];
    foreach($ubicaciones as $ubicacion) {
        $response[] = [
            'ip' => $ubicacion['ip'],
            'latitud' => $ubicacion['latitud'],
            'longitud' => $ubicacion['longitud'],
            'accesos' => (int)$ubicacion['accesos']
        ];
    }
    
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Parámetro no válido']);
}

?>