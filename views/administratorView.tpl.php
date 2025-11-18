@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=admin-logout" class="btn-logout">Cerrar sesión</a>
        </nav>
    </header>

    <main class="admin-container">
        <div class="admin-panel">
            <div class="admin-actions">
                <a href="?slug=map" class="btn-primary admin-btn">Mapa de clientes</a>
            </div>
            
            <div class="admin-stats">
                <div class="stat-card">
                    <h3>Usuarios Registrados</h3>
                    <div class="stat-number">{{ TOTAL_USUARIOS }}</div>
                </div>
                
                <div class="stat-card">
                    <h3>Clientes Únicos</h3>
                    <div class="stat-number">{{ TOTAL_CLIENTES }}</div>
                </div>
            </div>
        </div>
    </main>

    @extends(footer)

</body>
</html>