@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=landing">Inicio</a>
        </nav>
    </header>

    <main class="panel-container">
        <div class="loading" id="loading">
            <p>Cargando estaciones...</p>
        </div>
        
        <div class="estaciones-grid" id="estacionesGrid" style="display: none;">
            <!-- Las estaciones se cargarán aquí dinámicamente -->
        </div>
    </main>

    <!-- Template para las estaciones -->
    <template id="estacionTemplate">
        <div class="estacion-card" data-chipid="">
            <h3 class="estacion-apodo"></h3>
            <p class="estacion-ubicacion"></p>
            <span class="estacion-visitas">Visitas: <span class="visitas-count"></span></span>
        </div>
    </template>

    <script>
        async function cargarEstaciones() {
            try {
                // Simular datos ya que la API original no está disponible
                const estaciones = [
                    {
                        chipid: "ESP001",
                        apodo: "Estación Centro",
                        ubicacion: "Plaza Principal",
                        visitas: 125
                    },
                    {
                        chipid: "ESP002",
                        apodo: "Estación Norte",
                        ubicacion: "Barrio Residencial",
                        visitas: 89
                    },
                    {
                        chipid: "ESP003",
                        apodo: "Estación Sur",
                        ubicacion: "Zona Industrial",
                        visitas: 67
                    }
                ];
                
                mostrarEstaciones(estaciones);
            } catch (error) {
                console.error('Error al cargar estaciones:', error);
                document.getElementById('loading').innerHTML = '<p>Error al cargar las estaciones</p>';
            }
        }

        function mostrarEstaciones(estaciones) {
            const template = document.getElementById('estacionTemplate');
            const container = document.getElementById('estacionesGrid');
            const loading = document.getElementById('loading');
            
            container.innerHTML = '';
            
            estaciones.forEach(estacion => {
                const clone = template.content.cloneNode(true);
                
                clone.querySelector('.estacion-card').setAttribute('data-chipid', estacion.chipid);
                clone.querySelector('.estacion-apodo').textContent = estacion.apodo;
                clone.querySelector('.estacion-ubicacion').textContent = estacion.ubicacion;
                clone.querySelector('.visitas-count').textContent = estacion.visitas;
                
                // Agregar evento click
                clone.querySelector('.estacion-card').addEventListener('click', () => {
                    window.location.href = `?slug=detalle/${estacion.chipid}`;
                });
                
                container.appendChild(clone);
            });
            
            loading.style.display = 'none';
            container.style.display = 'grid';
        }

        // Cargar estaciones al cargar la página
        document.addEventListener('DOMContentLoaded', cargarEstaciones);
    </script>

    @extends(footer)

</body>
</html>
