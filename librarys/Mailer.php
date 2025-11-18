<?php

class Mailer {
    
    public static function enviarEmail($destinatario, $asunto, $cuerpo) {
        // Configuración básica para envío de emails
        // En producción usar PHPMailer con configuración SMTP
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: App Estación <noreply@app-estacion.com>' . "\r\n";
        
        return mail($destinatario, $asunto, $cuerpo, $headers);
    }
    
    public static function emailBienvenida($email, $nombres, $token_action) {
        $asunto = "Bienvenido a App Estación";
        $cuerpo = "
        <h2>¡Bienvenido $nombres!</h2>
        <p>Gracias por registrarte en App Estación.</p>
        <p>Para activar tu cuenta, haz clic en el siguiente botón:</p>
        <a href='" . APP_URL . "?slug=validate/$token_action' style='background: #4a90e2; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Click aquí para activar tu usuario</a>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
    
    public static function emailInicioSesion($email, $nombres, $token, $ip, $userAgent) {
        $asunto = "Inicio de sesión en App Estación";
        $cuerpo = "
        <h2>Hola $nombres</h2>
        <p>Se ha iniciado sesión en tu cuenta desde:</p>
        <p><strong>IP:</strong> $ip</p>
        <p><strong>Navegador:</strong> $userAgent</p>
        <p>Si no fuiste tú, bloquea tu cuenta:</p>
        <a href='" . APP_URL . "?slug=blocked/$token' style='background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>No fui yo, bloquear cuenta</a>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
    
    public static function emailIntentoAcceso($email, $nombres, $token, $ip, $userAgent) {
        $asunto = "Intento de acceso con contraseña inválida";
        $cuerpo = "
        <h2>Hola $nombres</h2>
        <p>Se intentó acceder a tu cuenta con contraseña incorrecta desde:</p>
        <p><strong>IP:</strong> $ip</p>
        <p><strong>Navegador:</strong> $userAgent</p>
        <p>Si no fuiste tú, bloquea tu cuenta:</p>
        <a href='" . APP_URL . "?slug=blocked/$token' style='background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>No fui yo, bloquear cuenta</a>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
    
    public static function emailCuentaActiva($email, $nombres) {
        $asunto = "Cuenta activada - App Estación";
        $cuerpo = "
        <h2>¡Cuenta activada!</h2>
        <p>Hola $nombres, tu cuenta ya está activa.</p>
        <p>Ya puedes iniciar sesión en App Estación.</p>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
    
    public static function emailCuentaBloqueada($email, $nombres, $token_action) {
        $asunto = "Cuenta bloqueada - App Estación";
        $cuerpo = "
        <h2>Cuenta bloqueada</h2>
        <p>Hola $nombres, tu cuenta ha sido bloqueada por seguridad.</p>
        <p>Para cambiar tu contraseña:</p>
        <a href='" . APP_URL . "?slug=reset/$token_action' style='background: #f39c12; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Click aquí para cambiar contraseña</a>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
    
    public static function emailRecupero($email, $nombres, $token_action) {
        $asunto = "Recuperar contraseña - App Estación";
        $cuerpo = "
        <h2>Recuperar contraseña</h2>
        <p>Hola $nombres, has solicitado restablecer tu contraseña.</p>
        <a href='" . APP_URL . "?slug=reset/$token_action' style='background: #4a90e2; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Click aquí para restablecer contraseña</a>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
    
    public static function emailContraseñaRestablecida($email, $nombres, $token, $ip, $userAgent) {
        $asunto = "Contraseña restablecida - App Estación";
        $cuerpo = "
        <h2>Contraseña restablecida</h2>
        <p>Hola $nombres, tu contraseña ha sido restablecida desde:</p>
        <p><strong>IP:</strong> $ip</p>
        <p><strong>Navegador:</strong> $userAgent</p>
        <p>Si no fuiste tú:</p>
        <a href='" . APP_URL . "?slug=blocked/$token' style='background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>No fui yo, bloquear cuenta</a>
        ";
        
        return self::enviarEmail($email, $asunto, $cuerpo);
    }
}

?>