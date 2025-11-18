<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ APP_SECTION }} - {{ APP_NAME }}</title>

    <meta property="og:description" content="{{ APP_DESCRIPTION }}">


	<!-- Primary Meta Tags -->
	<meta name="title" content="{{ APP_NAME }}">
	<meta name="description" content="{{ APP_DESCRIPTION }}">
	
	<meta name="author" content="{{ APP_AUTHOR }}">
	<!-- <meta name="reply-to" content="elmattprofe@gmail.com">
	<link rev="made" href="mailto:elmattprofe@gmail.com">
	<meta name="keywords" content="Matias Baez,matias baez,mattprofe,MattProfe,Matt Profe,matt profe,programación,programacion,robotica,robótica,informática,informatica,desarrollo,web"> -->
	<meta name="Resource-type" content="Document">
	<meta name="DateCreated" content="Thu, 22 September 2020 00:00:00 GMT+3">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="{{ APP_URL }}">
	<meta property="og:title" content="{{ APP_NAME }}">
	<meta property="og:description" content="{{ APP_DESCRIPTION }}">
	<meta property="og:image" content="{{ APP_URL }}/img/hero.jpeg">


    <style>
      :root {
    --fondo-pagina: {{ FONDO_PAGINA }};
    --texto-principal: {{ TEXTO_PRINCIPAL }};
    --fondo-header-gradiente-inicio: {{ FONDO_HEADER_GRADIENTE_INICIO }};
    --fondo-header-gradiente-fin: {{ FONDO_HEADER_GRADIENTE_FIN }};
    --texto-invertido: {{ TEXTO_INVERTIDO }};
    --texto-hover-nav: {{ TEXTO_HOVER_NAV }};
    --fondo-boton: {{ FONDO_BOTON }};
    --fondo-boton-hover: {{ FONDO_BOTON_HOVER }};
    --fondo-seccion-clara: {{ FONDO_SECCION_CLARA }};
    --fondo-tarjeta: {{ FONDO_TARJETA }};
    --titulo-tarjeta: {{ TITULO_TARJETA }};
    --fondo-footer: {{ FONDO_FOOTER }};
    --sombra-suave: {{ SOMBRA_SUAVE }};
    --sombra-muy-suave: {{ SOMBRA_MUY_SUAVE }};
}

/* ====== Reset ====== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background-color: var(--fondo-pagina);
    color: var(--texto-principal);
}

header {
    background: linear-gradient(135deg, var(--fondo-header-gradiente-inicio), var(--fondo-header-gradiente-fin));
    color: var(--texto-invertido);
    text-align: center;
    padding: 3rem 1rem;
}

header h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

header p {
    font-size: 1.2rem;
}

nav {
    background-color: var(--texto-principal);
    padding: 0.8rem;
    text-align: center;
}

nav a {
    color: var(--texto-invertido);
    text-decoration: none;
    margin: 0 1rem;
    font-weight: bold;
    transition: color 0.3s;
}

nav a:hover {
    color: var(--texto-hover-nav);
}

.hero {
    background: linear-gradient(135deg, var(--fondo-header-gradiente-inicio), var(--fondo-header-gradiente-fin));
    color: var(--texto-invertido);
    padding: 4rem 2rem;
    text-align: center;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero-content h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.hero-content p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.btn, .btn-primary, .btn-nav {
    display: inline-block;
    background-color: var(--fondo-boton);
    color: var(--texto-invertido);
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s;
    border: none;
    cursor: pointer;
}

.btn:hover, .btn-primary:hover, .btn-nav:hover {
    background-color: var(--fondo-boton-hover);
}

.btn-primary {
    font-size: 1.1rem;
    padding: 1rem 2rem;
}

/* Estilos para el panel de estaciones */
.panel-container {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.loading {
    text-align: center;
    padding: 3rem;
    font-size: 1.2rem;
}

.estaciones-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.estacion-card {
    background-color: var(--fondo-tarjeta);
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--sombra-suave);
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
    border: 2px solid transparent;
}

.estacion-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px var(--sombra-suave);
    border-color: var(--fondo-boton);
}

.estacion-apodo {
    color: var(--titulo-tarjeta);
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
}

.estacion-ubicacion {
    color: var(--texto-principal);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.estacion-visitas {
    background-color: var(--fondo-boton);
    color: var(--texto-invertido);
    padding: 0.3rem 0.8rem;
    border-radius: 15px;
    font-size: 0.9rem;
    font-weight: bold;
}

/* Estilos para el detalle de estación */
.detalle-container {
    padding: 2rem;
    max-width: 1400px;
    margin: 0 auto;
}

.estacion-detalle {
    background-color: var(--fondo-seccion-clara);
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 15px var(--sombra-suave);
}

.estacion-info {
    text-align: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid var(--fondo-tarjeta);
}

.estacion-info h2 {
    color: var(--titulo-tarjeta);
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.ubicacion {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.chipid {
    color: var(--texto-principal);
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.ultima-actualizacion {
    color: var(--texto-principal);
    font-size: 0.9rem;
    font-style: italic;
}

/* Estilos para los gráficos */
.graficos-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.grafico-card {
    background-color: var(--fondo-tarjeta);
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--sombra-suave);
    transition: transform 0.3s;
}

.grafico-card:hover {
    transform: translateY(-3px);
}

.grafico-card h3 {
    color: var(--titulo-tarjeta);
    margin-bottom: 1rem;
    text-align: center;
    font-size: 1.2rem;
}

.grafico-card canvas {
    height: 250px !important;
    margin-bottom: 1rem;
}

.valor-actual {
    text-align: center;
    font-weight: bold;
    color: var(--fondo-boton);
    font-size: 1.1rem;
    padding: 0.5rem;
    background-color: var(--fondo-seccion-clara);
    border-radius: 8px;
}

.riesgo-incendio {
    grid-column: span 1;
}

.riesgo-incendio canvas {
    height: 200px !important;
}

/* Estilos para autenticación */
.auth-container {
    padding: 2rem;
    max-width: 500px;
    margin: 0 auto;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-card {
    background-color: var(--fondo-seccion-clara);
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 15px var(--sombra-suave);
    width: 100%;
}

.auth-card h2 {
    color: var(--titulo-tarjeta);
    text-align: center;
    margin-bottom: 1.5rem;
}

.auth-form {
    margin: 1.5rem 0;
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--texto-principal);
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid var(--fondo-tarjeta);
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.form-group input:focus {
    outline: none;
    border-color: var(--fondo-boton);
}

.auth-links {
    text-align: center;
    margin-top: 1.5rem;
}

.auth-links a {
    display: block;
    margin: 0.5rem 0;
    color: var(--fondo-boton);
    text-decoration: none;
}

.auth-links a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .hero {
        flex-direction: column;
        text-align: center;
    }
    
    .estaciones-grid {
        grid-template-columns: 1fr;
    }
    
    .graficos-container {
        grid-template-columns: 1fr;
    }
    
    .detalle-container {
        padding: 1rem;
    }
    
    .grafico-card canvas {
        height: 200px !important;
    }
    
    .auth-container {
        padding: 1rem;
    }
}

.features {
    background-color: var(--fondo-seccion-clara);
    padding: 3rem 2rem;
    text-align: center;
}

.features h3 {
    font-size: 1.8rem;
    margin-bottom: 2rem;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.feature {
    background-color: var(--fondo-tarjeta);
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 2px 8px var(--sombra-muy-suave);
}

.feature h4 {
    margin-bottom: 0.8rem;
    color: var(--titulo-tarjeta);
}

footer {
    background-color: var(--fondo-footer);
    color: var(--texto-invertido);
    text-align: center;
    padding: 1rem;
    font-size: 0.9rem;
}

    </style>
</head>