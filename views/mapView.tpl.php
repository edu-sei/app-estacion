<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ APP_SECTION }} - {{ APP_NAME }}</title>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            overflow: hidden;
        }
        
        .map-header {
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem;
            border-radius: 0 0 0 10px;
        }
        
        .btn-back {
            background: #4a90e2;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .btn-back:hover {
            background: #2c5aa0;
        }
        
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="map-header">
        <a href="?slug=administrator" class="btn-back">Volver</a>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inicializar mapa
        const map = L.map('map').setView([-34.6037, -58.3816], 2); // Buenos Aires como centro inicial
        
        // Agregar capa de mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Cargar ubicaciones de clientes
        async function cargarUbicaciones() {
            try {
                const response = await fetch('api/locations.php?list-clients-location=1');
                const ubicaciones = await response.json();
                
                if(Array.isArray(ubicaciones)) {
                    ubicaciones.forEach(ubicacion => {
                        if(ubicacion.latitud && ubicacion.longitud) {
                            const marker = L.marker([ubicacion.latitud, ubicacion.longitud])
                                .addTo(map);
                            
                            marker.bindPopup(`
                                <b>IP:</b> ${ubicacion.ip}<br>
                                <b>Accesos:</b> ${ubicacion.accesos}
                            `);
                        }
                    });
                    
                    // Ajustar vista si hay marcadores
                    if(ubicaciones.length > 0) {
                        const group = new L.featureGroup(map._layers);
                        if(Object.keys(group._layers).length > 0) {
                            map.fitBounds(group.getBounds().pad(0.1));
                        }
                    }
                } else {
                    console.error('Error al cargar ubicaciones:', ubicaciones);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
        
        // Cargar ubicaciones al iniciar
        cargarUbicaciones();
    </script>

</body>
</html>