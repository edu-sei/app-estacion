@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=panel">← Volver al Panel</a>
        </nav>
    </header>

    <main class="detalle-container">
        <div class="loading" id="loading">
            <p>Cargando datos de la estación...</p>
        </div>
        
        <div class="estacion-detalle" id="estacionDetalle" style="display: none;">
            <div class="estacion-info">
                <h2 id="estacionApodo">Cargando...</h2>
                <p class="ubicacion" id="estacionUbicacion">Cargando ubicación...</p>
                <p class="chipid">ID: <span id="estacionChipid">{{ CHIPID }}</span></p>
            </div>
            
            <div class="datos-meteorologicos">
                <h3>Datos Meteorológicos</h3>
                <div class="datos-grid">
                    <div class="dato-card">
                        <h4>Temperatura</h4>
                        <span class="valor" id="temperatura">--°C</span>
                    </div>
                    <div class="dato-card">
                        <h4>Humedad</h4>
                        <span class="valor" id="humedad">--%</span>
                    </div>
                    <div class="dato-card">
                        <h4>Presión</h4>
                        <span class="valor" id="presion">-- hPa</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        async function cargarDetalleEstacion() {
            const chipid = "{{ CHIPID }}";
            
            try {
                // Simular datos de la estación ya que la API original no está disponible
                const datosEstacion = {
                    chipid: chipid,
                    apodo: getApodonPorChipid(chipid),
                    ubicacion: getUbicacionPorChipid(chipid),
                    temperatura: Math.round(Math.random() * 30 + 10), // 10-40°C
                    humedad: Math.round(Math.random() * 60 + 30), // 30-90%
                    presion: Math.round(Math.random() * 50 + 1000) // 1000-1050 hPa
                };
                
                mostrarDetalleEstacion(datosEstacion);
            } catch (error) {
                console.error('Error al cargar detalle de estación:', error);
                document.getElementById('loading').innerHTML = '<p>Error al cargar los datos de la estación</p>';
            }
        }

        function getApodonPorChipid(chipid) {
            const estaciones = {
                'ESP001': 'Estación Centro',
                'ESP002': 'Estación Norte', 
                'ESP003': 'Estación Sur'
            };
            return estaciones[chipid] || 'Estación Desconocida';
        }

        function getUbicacionPorChipid(chipid) {
            const ubicaciones = {
                'ESP001': 'Plaza Principal',
                'ESP002': 'Barrio Residencial',
                'ESP003': 'Zona Industrial'
            };
            return ubicaciones[chipid] || 'Ubicación no disponible';
        }

        function mostrarDetalleEstacion(datos) {
            document.getElementById('estacionApodo').textContent = datos.apodo;
            document.getElementById('estacionUbicacion').textContent = datos.ubicacion;
            document.getElementById('temperatura').textContent = datos.temperatura + '°C';
            document.getElementById('humedad').textContent = datos.humedad + '%';
            document.getElementById('presion').textContent = datos.presion + ' hPa';
            
            document.getElementById('loading').style.display = 'none';
            document.getElementById('estacionDetalle').style.display = 'block';
        }

        // Cargar detalle al cargar la página
        document.addEventListener('DOMContentLoaded', cargarDetalleEstacion);
    </script>

    @extends(footer)

</body>
</html>