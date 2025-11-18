@extends(head)

<body>

    <header>
        <h1>{{ APP_NAME }}</h1>
        <p>{{ APP_DESCRIPTION }}</p>
    </header>

    <nav>
        <a href="#features">Características</a>
        <a href="#about">Acerca de</a>
        <a href="?slug=panel" class="btn-nav">Ver Panel</a>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h2>Monitoreo Meteorológico en Tiempo Real</h2>
            <p>Accede a datos actualizados de estaciones meteorológicas distribuidas. Visualiza temperatura, humedad, presión y más parámetros climáticos de forma sencilla y organizada.</p>
            <a href="?slug=panel" class="btn-primary">Acceder al Panel</a>
        </div>
    </section>

    <section class="features" id="features">
        <h3>Características de la Aplicación</h3>
        <div class="feature-grid">
            <div class="feature">
                <h4>🌡️ Datos en Tiempo Real</h4>
                <p>Información meteorológica actualizada constantemente desde múltiples estaciones.</p>
            </div>
            <div class="feature">
                <h4>📊 Visualización Clara</h4>
                <p>Interface intuitiva para consultar datos de cada estación de forma organizada.</p>
            </div>
            <div class="feature">
                <h4>📍 Ubicación Precisa</h4>
                <p>Cada estación incluye su ubicación exacta y datos de identificación únicos.</p>
            </div>
        </div>
    </section>

    @extends(footer)

</body>
</html>
