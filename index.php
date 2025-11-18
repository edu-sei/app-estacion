<?php 


	/***
	 * 
	 * Doxygen
	 * 
	 * index.php trabaja como un ROUTER - FIREWALL
	 * 
	 * */
	

	require ".env.php"; /*Variables de entorno*/
	require "models/DBAbstract.php"; /*Modelo de conexión a la db*/
	
	require "librarys/Enano.php"; /*Motor de plantillas*/

	session_start();

	$section = "landing"; /*por defecto section es landing*/

	if(isset($_GET['slug'])){ /* en caso de que se especifique una sección*/
		$url_parts = explode('/', $_GET['slug']);
		$section = $url_parts[0];
		
		// Si es la sección detalle, extraer el chipid
		if($section == "detalle" && isset($url_parts[1])){
			$_GET['chipid'] = $url_parts[1];
		}
		
		// Para validate, blocked y reset, extraer el token
		if(($section == "validate" || $section == "blocked" || $section == "reset") && isset($url_parts[1])){
			$_GET['token_action'] = $url_parts[1];
			if($section == "blocked") {
				$_GET['token'] = $url_parts[1];
			}
		}
	}

	/* Se especifico una sección pero esta no existe */
	if(!file_exists("controllers/".$section."Controller.php")){
		$section = "error404"; /*lo llevamos a la seccion de error*/
	}

	/*Se carga el controlador*/
	include "controllers/".$section."Controller.php";

 ?>