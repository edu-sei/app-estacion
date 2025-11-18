<?php

class Tracker extends DBAbstract {
    
    public function registrarAcceso($ip, $latitud, $longitud, $pais, $navegador, $sistema) {
        $token = bin2hex(random_bytes(16));
        $sql = "INSERT INTO tracker (token, ip, latitud, longitud, pais, navegador, sistema) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->executeQuery($sql, [$token, $ip, $latitud, $longitud, $pais, $navegador, $sistema]);
    }
    
    public function obtenerClientesUbicacion() {
        $sql = "SELECT ip, latitud, longitud, COUNT(*) as accesos 
                FROM tracker 
                WHERE latitud IS NOT NULL AND longitud IS NOT NULL 
                GROUP BY ip, latitud, longitud";
        return $this->executeQuery($sql);
    }
    
    public function contarClientes() {
        $sql = "SELECT COUNT(DISTINCT ip) as total FROM tracker";
        $result = $this->executeQuery($sql);
        return $result ? $result[0]['total'] : 0;
    }
}

?>