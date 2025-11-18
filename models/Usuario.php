<?php

class Usuario extends DBAbstract {
    
    public function crearUsuario($email, $nombres, $contraseña) {
        $token = bin2hex(random_bytes(32));
        $token_action = bin2hex(random_bytes(32));
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuarios (token, email, nombres, contraseña, token_action) VALUES (?, ?, ?, ?, ?)";
        return $this->executeQuery($sql, [$token, $email, $nombres, $contraseña_hash, $token_action]);
    }
    
    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $result = $this->executeQuery($sql, [$email]);
        return $result ? $result[0] : null;
    }
    
    public function buscarPorToken($token) {
        $sql = "SELECT * FROM usuarios WHERE token = ?";
        $result = $this->executeQuery($sql, [$token]);
        return $result ? $result[0] : null;
    }
    
    public function buscarPorTokenAction($token_action) {
        $sql = "SELECT * FROM usuarios WHERE token_action = ?";
        $result = $this->executeQuery($sql, [$token_action]);
        return $result ? $result[0] : null;
    }
    
    public function activarUsuario($id) {
        $sql = "UPDATE usuarios SET activo = 1, token_action = NULL, active_date = NOW() WHERE id = ?";
        return $this->executeQuery($sql, [$id]);
    }
    
    public function bloquearUsuario($id) {
        $token_action = bin2hex(random_bytes(32));
        $sql = "UPDATE usuarios SET bloqueado = 1, token_action = ?, blocked_date = NOW() WHERE id = ?";
        return $this->executeQuery($sql, [$token_action, $id]);
    }
    
    public function iniciarRecupero($id) {
        $token_action = bin2hex(random_bytes(32));
        $sql = "UPDATE usuarios SET recupero = 1, token_action = ?, recover_date = NOW() WHERE id = ?";
        return $this->executeQuery($sql, [$token_action, $id]);
    }
    
    public function resetearContraseña($id, $nueva_contraseña) {
        $contraseña_hash = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET contraseña = ?, token_action = NULL, bloqueado = 0, recupero = 0 WHERE id = ?";
        return $this->executeQuery($sql, [$contraseña_hash, $id]);
    }
    
    public function verificarContraseña($contraseña, $hash) {
        return password_verify($contraseña, $hash);
    }
}

?>