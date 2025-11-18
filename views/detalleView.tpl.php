@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=panel">← Volver al Panel</a>
            <span>Bienvenido, {{ USER_NAME }}</span>
            <a href="?slug=logout">Cerrar sesión</a>
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
                <p class="ultima-actualizacion">Última actualización: <span id="ultimaActualizacion">--</span></p>
            </div>
            
            <div class="graficos-container">
                <div class="grafico-card">
                    <h3>Temperatura (°C)</h3>
                    <canvas id="temperaturaChart"></canvas>
                    <div class="valor-actual">Actual: <span id="tempActual">--°C</span></div>
                </div>
                
                <div class="grafico-card">
                    <h3>Humedad (%)</h3>
                    <canvas id="humedadChart"></canvas>
                    <div class="valor-actual">Actual: <span id="humActual">--%</span></div>
                </div>
                
                <div class="grafico-card">
                    <h3>Viento (km/h)</h3>
                    <canvas id="vientoChart"></canvas>
                    <div class="valor-actual">Actual: <span id="vientoActual">-- km/h</span></div>
                </div>
                
                <div class="grafico-card">
                    <h3>Presión Atmosférica (hPa)</h3>
                    <canvas id="presionChart"></canvas>
                    <div class="valor-actual">Actual: <span id="presionActual">-- hPa</span></div>
                </div>
                
                <div class="grafico-card riesgo-incendio">
                    <h3>Riesgo de Incendio</h3>
                    <canvas id="riesgoChart"></canvas>
                    <div class="valor-actual">Nivel: <span id="riesgoActual">--</span></div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let charts = {};
        let datosHistoricos = {
            temperatura: [],
            humedad: [],
            viento: [],
            presion: [],
            riesgo: [],
            labels: []
        };
        
        const chipid = "{{ CHIPID }}";

        function generarDatos() {
            return {
                chipid: chipid,
                apodo: getApodonPorChipid(chipid),
                ubicacion: getUbicacionPorChipid(chipid),
                temperatura: Math.round(Math.random() * 30 + 10),
                humedad: Math.round(Math.random() * 60 + 30),
                viento: Math.round(Math.random() * 25 + 5),
                presion: Math.round(Math.random() * 50 + 1000),
                riesgo: Math.round(Math.random() * 4 + 1)
            };
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

        function inicializarGraficos() {
            const configBase = {
                type: 'line',
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: false }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            };

            charts.temperatura = new Chart(document.getElementById('temperaturaChart'), {
                ...configBase,
                data: {
                    labels: datosHistoricos.labels,
                    datasets: [{
                        data: datosHistoricos.temperatura,
                        borderColor: '#ff6b6b',
                        backgroundColor: 'rgba(255, 107, 107, 0.1)',
                        fill: true
                    }]
                }
            });

            charts.humedad = new Chart(document.getElementById('humedadChart'), {
                ...configBase,
                data: {
                    labels: datosHistoricos.labels,
                    datasets: [{
                        data: datosHistoricos.humedad,
                        borderColor: '#4ecdc4',
                        backgroundColor: 'rgba(78, 205, 196, 0.1)',
                        fill: true
                    }]
                }
            });

            charts.viento = new Chart(document.getElementById('vientoChart'), {
                ...configBase,
                data: {
                    labels: datosHistoricos.labels,
                    datasets: [{
                        data: datosHistoricos.viento,
                        borderColor: '#45b7d1',
                        backgroundColor: 'rgba(69, 183, 209, 0.1)',
                        fill: true
                    }]
                }
            });

            charts.presion = new Chart(document.getElementById('presionChart'), {
                ...configBase,
                data: {
                    labels: datosHistoricos.labels,
                    datasets: [{
                        data: datosHistoricos.presion,
                        borderColor: '#f7b731',
                        backgroundColor: 'rgba(247, 183, 49, 0.1)',
                        fill: true
                    }]
                }
            });

            charts.riesgo = new Chart(document.getElementById('riesgoChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Bajo', 'Medio', 'Alto', 'Extremo'],
                    datasets: [{
                        data: [0, 0, 0, 0],
                        backgroundColor: ['#2ecc71', '#f39c12', '#e74c3c', '#8e44ad']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        }

        function actualizarDatos() {
            const datos = generarDatos();
            const ahora = new Date().toLocaleTimeString();
            
            // Actualizar información básica
            document.getElementById('estacionApodo').textContent = datos.apodo;
            document.getElementById('estacionUbicacion').textContent = datos.ubicacion;
            document.getElementById('ultimaActualizacion').textContent = ahora;
            
            // Actualizar valores actuales
            document.getElementById('tempActual').textContent = datos.temperatura + '°C';
            document.getElementById('humActual').textContent = datos.humedad + '%';
            document.getElementById('vientoActual').textContent = datos.viento + ' km/h';
            document.getElementById('presionActual').textContent = datos.presion + ' hPa';
            
            const nivelesRiesgo = ['Bajo', 'Medio', 'Alto', 'Extremo'];
            document.getElementById('riesgoActual').textContent = nivelesRiesgo[datos.riesgo - 1];
            
            // Agregar datos a históricos
            datosHistoricos.labels.push(ahora);
            datosHistoricos.temperatura.push(datos.temperatura);
            datosHistoricos.humedad.push(datos.humedad);
            datosHistoricos.viento.push(datos.viento);
            datosHistoricos.presion.push(datos.presion);
            
            // Mantener solo los últimos 10 puntos
            if (datosHistoricos.labels.length > 10) {
                Object.keys(datosHistoricos).forEach(key => {
                    datosHistoricos[key].shift();
                });
            }
            
            // Actualizar gráficos
            ['temperatura', 'humedad', 'viento', 'presion'].forEach(tipo => {
                charts[tipo].data.labels = datosHistoricos.labels;
                charts[tipo].data.datasets[0].data = datosHistoricos[tipo];
                charts[tipo].update('none');
            });
            
            // Actualizar gráfico de riesgo
            const riesgoData = [0, 0, 0, 0];
            riesgoData[datos.riesgo - 1] = 100;
            charts.riesgo.data.datasets[0].data = riesgoData;
            charts.riesgo.update('none');
        }

        async function inicializar() {
            try {
                document.getElementById('loading').style.display = 'none';
                document.getElementById('estacionDetalle').style.display = 'block';
                
                inicializarGraficos();
                actualizarDatos();
                
                // Actualizar cada 60 segundos
                setInterval(actualizarDatos, 60000);
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('loading').innerHTML = '<p>Error al cargar los datos</p>';
            }
        }

        document.addEventListener('DOMContentLoaded', inicializar);
    </script>

    @extends(footer)

</body>
</html>