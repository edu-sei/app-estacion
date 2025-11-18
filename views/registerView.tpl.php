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
            <h2>Crear nueva cuenta</h2>
            
            {{ MENSAJE }}
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" id="contraseña" name="contraseña" required>
                </div>
                
                <div class="form-group">
                    <label for="repetir_contraseña">Repetir contraseña:</label>
                    <input type="password" id="repetir_contraseña" name="repetir_contraseña" required>
                </div>
                
                <button type="submit" class="btn-primary">Registrarse</button>
            </form>
            
            <div class="auth-links">
                <a href="?slug=login">¿Ya tienes cuenta? Iniciar sesión</a>
            </div>
        </div>
    </main>

    @extends(footer)

</body>
</html>