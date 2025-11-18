@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=login">← Volver al login</a>
        </nav>
    </header>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Recuperar contraseña</h2>
            
            {{ MENSAJE }}
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <button type="submit" class="btn-primary">Enviar enlace de recuperación</button>
            </form>
            
            <div class="auth-links">
                <a href="?slug=login">Volver al login</a>
                <a href="?slug=register">¿No tienes cuenta? Registrarse</a>
            </div>
        </div>
    </main>

    @extends(footer)

</body>
</html>