<?php

// Cerrar sesión
if(isset($_SESSION[APP_NAME]['user'])) {
    unset($_SESSION[APP_NAME]['user']);
}

header('Location: ?slug=landing');
exit;

?>