<?php

	/* Se instancia a la clase del motor de plantillas */
	$tpl = new Enano("panel");

	/*para asignar valor a las variables dentro la plantilla*/
	$tpl->assignVar(["APP_SECTION" => "Panel de Estaciones"]);

	/* Imprime la plantilla en la página */
	$tpl->printToScreen();

?>