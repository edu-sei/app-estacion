<?php

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
		"CHIPID" => $chipid
	]);

	/* Imprime la plantilla en la página */
	$tpl->printToScreen();

?>