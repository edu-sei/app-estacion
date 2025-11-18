<?php

// Cerrar sesión de admin
if(isset($_SESSION[APP_NAME]['admin'])) {
    unset($_SESSION[APP_NAME]['admin']);
}

header('Location: ?slug=landing');
exit;

?>