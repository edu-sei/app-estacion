@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=landing">← Inicio</a>
        </nav>
    </header>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Acceso Administrador</h2>
            
            {{ MENSAJE }}
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                
                <div class="form-group">
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" id="contraseña" name="contraseña" required>
                </div>
                
                <button type="submit" class="btn-primary">Acceder</button>
            </form>
        </div>
    </main>

    @extends(footer)

</body>
</html>